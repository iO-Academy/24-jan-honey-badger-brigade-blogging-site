<?php
require_once 'src/Entities/Blog.php';
require_once 'src/Entities/Like.php';
require_once 'src/Models/LikeModel.php';

class BlogModel
{
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
        $query = $this->db->prepare('SELECT 
        `blogposts`.`id` AS "id", 
        `blogposts`.`title` AS "title", 
        `blogposts`.`content` AS "content",
        `blogposts`.`authorid` AS "authorid", 
        `blogposts`.`posttime` AS "posttime",
        `users`.`username` AS "username",
        COUNT(`likes`.`id`) AS "total",
        SUM(`likes`.`value`) AS "likes" 
        FROM `blogposts`
        LEFT JOIN `users`
        ON `blogposts`.`authorid` = `users`.`id` 
        LEFT JOIN `likes` 
        ON `blogposts`.`id`=`likes`.`blogid`
        GROUP BY `blogposts`.`id`
        ORDER BY `posttime` DESC;');
        $query->execute();
        $blog = $query->fetchAll();
        return $this->hydrateAllBlogs($blog);
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
    public function getBlogById(int $id): Blog|false
    {
        $query = $this->db->prepare('SELECT `blogposts`.`id` AS "id",
       `blogposts`.`title` AS "title",
       `blogposts`.`content` AS "content", 
       `blogposts`.`authorid` AS "authorid", 
       `blogposts`.`posttime` AS "posttime", 
       COUNT(`likes`.`id`) AS "total", 
       SUM(`likes`.`value`) AS "likes", 
       `users`.`username` 
        FROM `blogposts` 
        LEFT JOIN `users`
        ON `blogposts`.`authorid` = `users`.`id`
        LEFT JOIN `likes` 
        ON `blogposts`.`id`=`likes`.`blogid`
        WHERE `blogposts`.`id` = :id');
        $query->execute([
            ':id' => $id
        ]);
        $data = $query->fetch();
        return $this->hydrateSingleBlog($data);
    }
    public function hydrateSingleBlog(array $data): Blog|false
    {
        $username = $data['username'] ?: 'Anonymous';
        $dislikes = $data['total']-$data['likes'];
        return new Blog($data['id'], $data['title'], $data['content'], $data['authorid'], $username, $data['posttime'], $data['likes'], $dislikes);
    }
    public function hydrateAllBlogs(array $data): array
    {
        $blogs = [];
        foreach ($data as $blog) {
            $blogs[] = $this->hydrateSingleBlog($blog);
        }
        return $blogs;
    }
}
