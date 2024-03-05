<?php

require_once 'src/Entities/User.php';

class UserModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}