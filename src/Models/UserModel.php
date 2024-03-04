<?php

require_once 'src/Entities/User.php';

class UserModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getUserByUsername(string $username): User | false
    {
      $query = $this->db->prepare('SELECT * FROM `users` WHERE `username`= :username');
      $query->execute([
          ':username' => $username
      ]);

      $data = $query->fetch();

      return $this->hydrateSingleUser($data);
    }

    private function hydrateSingleUser($data): User|false
    {
        if ($data != false) {

            return new User ($data['id'], $data['username'], $data['password'], $data['email']);
        } else {
            return false;
        }

    }
}