<?php

require_once 'src/Entities/Blog.php';
class BlogModel {
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
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

    public function getBlogById(int $id): Blog
    {
        $query = $this->db->prepare('SELECT `id`, `title`, `content`, `authorid`, `posttime` FROM `blogposts` WHERE `id` = :id');
        $query->execute([
            ':id' => $id
        ]);
        $data = $query->fetch();
        return $this->hydrateSingleBlog($data);
    }

    public function hydrateSingleBlog(array $data): Blog
    {
        return new Blog($data['id'], $data['title'], $data['content'], $data['authorid'], $data['posttime']);
    }
}