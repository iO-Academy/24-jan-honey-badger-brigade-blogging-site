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
    /**
     * @return Comment[];
     */
    public function getAllComments(int $id): array | false
    {
        $query = $this->db->prepare('SELECT `comments`.`id`, `comments`.`authorid`, `comments`.`blogid`, 
       `comments`.`content`, `comments`.`timestamp`  FROM `comments` INNER JOIN `users` 
        ON `comments` . `authorid` = `users` . `id` WHERE `comments` . `blogid` = :id ORDER BY `timestamp` DESC;');
        $query ->execute([':id'=>$id]);
        $data = $query->fetchAll();
        return $this->hydrateComments($data);
    }
    /**
     * @return Comment[];
     */
    public function hydrateComments(array $data): array | false
    {
        $comments = [];
        foreach ($data as $comment)
        {
        $comments[] =  new Comment($comment['id'], $comment['authorid'],
        $comment['blogid'], $comment['content'], $comment['timestamp']);
        }
        return $comments;
    }
}