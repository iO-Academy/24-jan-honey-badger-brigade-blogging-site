<?php

require_once 'src/Entities/Blog.php';
class BlogModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

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
        $query = $this->db->prepare('SELECT `blogposts`.`id`,
       `blogposts`.`title`, 
       `blogposts`.`content`, 
       `blogposts`.`authorid`, 
       `blogposts`.`posttime`, 
       `users`.`username` 
        FROM `blogposts` 
        LEFT JOIN `users`
        ON `blogposts`.`authorid` = `users`.`id` 
        ORDER BY `posttime` DESC;');
        $query->execute();
        $blog = $query->fetchAll();
        return $this->hydrateAllBlogs($blog);
    }

    public function getBlogById(int $id): Blog
    {
        $query = $this->db->prepare('SELECT `blogposts`.`id`,
       `blogposts`.`title`, 
       `blogposts`.`content`, 
       `blogposts`.`authorid`, 
       `blogposts`.`posttime`, 
       `users`.`username` 
        FROM `blogposts` 
        LEFT JOIN `users`
        ON `blogposts`.`authorid` = `users`.`id` 
        WHERE `blogposts`.`id` = :id');
        $query->execute([
            ':id' => $id
        ]);
        $data = $query->fetch();
        return $this->hydrateSingleBlog($data);
    }

    public function hydrateSingleBlog(array $data): Blog
    {
        $username = $data['username'] ?: 'Anonymous';
        return new Blog($data['id'], $data['title'], $data['content'], $data['authorid'], $username, $data['posttime']);
    }
    public function hydrateAllBlogs(array $data): array
    {
        $blogs = [];
        foreach ($data as $blog) {
            $blogs[] = $this->hydrateSingleBlog($blog);
        } return $blogs;
    }
}


