<?php

require_once 'src/Entities/Blog.php';

class BlogModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

}
