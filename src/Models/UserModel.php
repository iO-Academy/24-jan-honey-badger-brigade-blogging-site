<?php

require_once 'src/Entities/User.php';
require_once 'src/Email.php';
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
     public function getUserByEmail(string $email): User | false
    {
      $query = $this->db->prepare('SELECT `id`, `username`, `email`, `password` FROM `users` WHERE `email`= :email');
      $query->execute([
          ':email' => $email
      ]);
      $data = $query->fetch();
      return $this->hydrateSingleUser($data);
    }
    private function hydrateSingleUser(array | false $data): User|false
    {
        if ($data != false) {
            $email = new Email($data['email']);
            return new User ($data['id'], $data['username'], $data['password'], $email);
        } else {
            return false;
        }
    }

}


