<?php
require_once 'src/Entities/Like.php';

class LikeModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function checkUserPostLikes(int $userid, int $blogid): Like|false
    {
        $query = $this->db->prepare('SELECT `id`,`value` FROM `likes` WHERE `userid`=:userid AND `blogid` = :blogid');
        $query->execute([
            ':userid' => $userid,
            ':blogid' => $blogid
        ]);
        $data = $query->fetch();
        return $this->hydrateSingleLike($data, $userid, $blogid);
    }

    private function hydrateSingleLike(array|false $data, int $userid, int $blogid): Like|false
    {
        if ($data != false) {
            return new Like($data['id'], $userid, $blogid, $data['value']);
        } else {
            return false;
        }
    }

    public function updateUserPostLike(Like $like, bool $value): bool
    {
        $query = $this->db->prepare('UPDATE `likes` SET `value` = :value WHERE `id` = :id');
        return $query->execute(array(
            ':value' => $value,
            ':id' =>$like->id
        ));
    }

    public function addLike(int $userid, int $blogid, bool $value): bool
    {
        $query = $this->db->prepare('INSERT INTO `likes` (`userid`, `blogid`, `value`) 
        VALUES (:userid, :blogid, :value)');
        return $query->execute([
            ':userid' => $userid,
            ':blogid' => $blogid,
            ':value' => $value
        ]);
    }
}