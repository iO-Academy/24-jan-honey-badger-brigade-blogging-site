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
