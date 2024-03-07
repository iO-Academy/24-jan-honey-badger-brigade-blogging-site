<?php

readonly class Like {
    public int $id;
    public int $userid;
    public int $blogid;
    public bool $like;

    public function __construct(int $id, int $userid, int $blogid, bool $like)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->blogid = $blogid;
        $this->like = $like;
    }

}