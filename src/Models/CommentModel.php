<?php

require_once 'src/Entities/Comment.php';
class CommentModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}