<?php

require_once 'src/Entities/Blog.php';

class BlogModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addBlogPost(int $authorid, string $title, string $content, int $timestamp): bool
    {
        $query = $this->db->prepare
        ('INSERT INTO `blogposts` (`authorid`, `title`, `content`, `posttime`)
        VALUES (:authorid, :title, :content, :posttime)');
        return $query->execute([
            ':authorid' => $authorid,
            ':title' => $title,
            ':content' => $content,
            ':posttime' => $timestamp,
        ]);
    }
}
