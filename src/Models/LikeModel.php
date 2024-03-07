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
        $intValue = $value ? 1 : 0;
        $query = $this->db->prepare('UPDATE `likes` SET `value` = :value
        WHERE `id` = :id');
        return $query->execute([
            ':value' => $intValue,
            ':id' =>$like->id
        ]);
    }

    public function addLike(int $userid, int $blogid, bool $value): bool
    {
        $intValue = $value ? 1 : 0;
        $query = $this->db->prepare('INSERT INTO `likes` (`userid`, `blogid`, `value`) 
        VALUES (:userid, :blogid, :value)');
        return $query->execute([
            ':userid' => $userid,
            ':blogid' => $blogid,
            ':value' => $intValue,
        ]);
    }

    public function countAllLikes(): array
    {
        $query = $this->db->prepare('SELECT COUNT(`id`) AS "total", `blogid`, SUM(`value`) AS "likes" FROM `likes`  GROUP BY `blogid`');
        $query->execute([]);
        $data = $query->fetchAll();
        return $this->formatAllLikes($data);
    }

    public function countPostLikes(int $blogid): array
    {
        $query = $this->db->prepare('SELECT COUNT(`id`), `value` FROM `likes` WHERE `blogid`= :blogid GROUP BY `value`');
        $query->execute([
            ':blogid' => $blogid
        ]);
        $data = $query->fetchAll();
        return $this->formatLikes($data);
    }
    /**
     * @return Like[];
     */
    private function hydrateLikes(array $data): array
    {
        $likes = [];
        foreach ($data as $like) {
            $likes[] = new Like($like['userid'], $like['blogid'], $like['value']);
        }
        return $likes;
    }
    /**
     * @return PostLike[];
     */
    private function formatAllLikes(array $data): array
    {
        $allLikes = [];
        foreach ($data as $post) {
            $allLikes[] = new PostLike($post['total'], $post['blogid'], $post['likes']);
        }
        return $allLikes;
    }
}