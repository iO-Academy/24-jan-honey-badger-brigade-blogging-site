<?php

require_once 'src/Entities/Blog.php';
require_once 'src/connectToDb.php';

class BlogModel {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPosts()
    {
        $query = $this->db->prepare('SELECT * FROM `blogposts` ORDER BY `posttime` DESC;');
        $query ->execute();
        $blog = $query->fetchAll();

        $blogposts = [];
        foreach ($blog as $blogposts)
        {
            $blogposts = new Blog($blogposts['id'], $blogposts['title'], $blogposts['content'], $blogposts['authorid'], $blogposts['posttime']);
        }

        return $blogposts;


    }

}
