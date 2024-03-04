<?php

require_once 'src/Entities/User.php';

class UserModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function registerUser($username, $email, $hashedPassword)
    {
        $pdo = $this->db;
       // Prepare SQL statement
        $query = $pdo->prepare('INSERT INTO `users` (`username`, `email`, `password`) VALUES(:username, :email, :hashedPassword)');

        // Execute the query
        $query->execute([
            ':username' => $username,
            ':email' => $email,
            ':hashedPassword' => $hashedPassword,
        ]);
    }
}