<?php

readonly class Like {
    public int $id;
    public int $userid;
    public int $blogid;
    public int $value;

    public function __construct(int $id, int $userid, int $blogid, int $value)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->blogid = $blogid;
        $this->value = $value;
    }

}