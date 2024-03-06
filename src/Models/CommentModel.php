<?php

require_once 'src/Entities/Comment.php';
class CommentModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @throws Exception
     */
    public function addComment(int $id, int $authorid, int $blogid, string $content, string $timeStamp)
    {
        $query = $this->db->prepare("INSERT INTO `comments` (`id`, `authorid`, `blogid`, `content`,`timestamp`) 
        VALUES (:id, :authorid, :blogid, :content, :timestamp);");

        $comments = $query->execute([
            `id`=> $id,
            `authorid`=> $authorid,
            `blogid`=> $blogid,
            `content`=> $content,
            `timestamp`=> $timeStamp
        ]);
    }
}