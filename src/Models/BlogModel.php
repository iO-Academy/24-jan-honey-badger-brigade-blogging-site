<?php

require_once 'src/Entities/Blog.php';
class BlogModel {
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
<<<<<<< HEAD

    public function addBlogPost(int $authorid, string $title, string $content): bool
    {
        $query = $this->db->prepare
        ('INSERT INTO `blogposts` (`authorid`, `title`, `content`, `posttime`)
        VALUES (:authorid, :title, :content, :posttime)');
        return $query->execute([
            ':authorid' => $authorid,
            ':title' => $title,
            ':content' => $content,
            ':posttime' => date("y-m-d h:i:s")
        ]);
    }

    /**
     * @return Blog[];
     */
    public function getAllPosts(): array
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `content`, `authorid`, `posttime`  FROM `blogposts` ORDER BY `posttime` DESC;');
        $query ->execute();
        $blog = $query->fetchAll();
        $blogposts = [];
        foreach ($blog as $post)
        {
            $blogposts[] = new Blog($post['id'], $post['title'], $post['content'], $post['authorid'], $post['posttime']);
        }
        return $blogposts;
    }
}
