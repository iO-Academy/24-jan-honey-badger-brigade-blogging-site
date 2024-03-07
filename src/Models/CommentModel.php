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

    public function getAllComments(): Comment
    {
        $query = $this->db->prepare('SELECT `comments`.`id`, `comments`.`authorid`, `comments`.`blogid`, 
       `comments`.`content`, `comments`.`timestamp`  FROM `comments` INNER JOIN `users` 
        ON `comments` . `authorid` = `users` . `id` ORDER BY `timestamp` DESC;');
        $query ->execute();
        $data = $query->fetchAll();
        return $this->hydrateComments($data);
    }

    public function hydrateComments(array $data): Comment
    {
        return new Comment($data['id'], $data['authorid'],
        $data['blogid'], $data['content'], $data['timestamp']);
    }
}