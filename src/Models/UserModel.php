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
       // Prepare SQL statement we are going to need
        $queryUsername = $pdo->prepare('SELECT * FROM `users` WHERE `username` = :username');

        //check if username already exists in the db
        $queryUsername->execute([':username' => $username]);
        $resultUsername = $queryUsername->fetch(PDO::FETCH_ASSOC);
        if ($resultUsername['count'] > 0) {
            // Username already exists
            return 'Username already exists';
        }

        //check the format of the email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Invalid email format';
        }
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
}