<?php

require_once 'src/Entities/Comment.php';
class CommentModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addComment(int $authorid, int $blogid , string $content, string $timeStamp): void
    {

        $query = $this->db->prepare("INSERT INTO `comments` (`authorid`, `blogid`, `content`,`timestamp`) 
        VALUES (:authorid, :blogid, :content, :timestamp);");

        $query->execute([
            'authorid'=> $authorid,
            'blogid'=> $blogid,
            'content'=> $content,
            'timestamp'=> $timeStamp
        ]);
    }
}