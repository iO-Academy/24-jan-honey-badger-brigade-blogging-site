<?php

class LikeModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

}