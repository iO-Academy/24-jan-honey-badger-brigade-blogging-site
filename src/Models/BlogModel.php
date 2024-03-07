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
        $query = $this->db->prepare('SELECT `blogposts`.`id` AS "id", `blogposts`.`title` AS "title",`blogposts`.`content` AS "content", `blogposts`.`authorid` AS "authorid", `blogposts`.`posttime` AS "posttime", COUNT(`likes`.`id`) AS "total", SUM(`likes`.`value`) AS "likes" FROM `blogposts` LEFT JOIN `likes` ON `blogposts`.`id`=`likes`.`blogid` GROUP BY `blogposts`.`id` ORDER BY `posttime` DESC;');
        $query->execute();
        $blog = $query->fetchAll();
        $blogposts = [];
        foreach ($blog as $post) {
            $dislikes = $post['total']-$post['likes'];
            $blogposts[] = new Blog($post['id'], $post['title'], $post['content'], $post['authorid'], $post['posttime'], $post['likes'], $dislikes);
        }
        return $blogposts;
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