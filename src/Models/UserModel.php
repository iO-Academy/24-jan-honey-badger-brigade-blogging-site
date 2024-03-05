<?php

require_once 'src/Entities/User.php';

class UserModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function registerUser($username, $email, $password)
    {
        $pdo = $this->db;

        //hash the password that was provided
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = $pdo->prepare('INSERT INTO `users` (`username`, `email`, `password`) VALUES(:username, :email, :hashedPassword)');

        // Execute the query
        $query->execute([
            ':username' => $username,
            ':email' => $email,
            ':hashedPassword' => $hashedPassword,
        ]);
    }

    public function usernameExists($username): bool
    {
        $pdo = $this->db;
        // Prepare SQL statement we are going to need
        $queryUsername = $pdo->prepare('SELECT `username` FROM `users` WHERE `username` = :username');
        //check if username already exists in the db
        $queryUsername->execute([':username' => $username]);
        $user = $queryUsername->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            return false;
        } else {
            return true;
        }
    }


}