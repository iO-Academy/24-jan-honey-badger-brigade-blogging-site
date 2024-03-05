<?php

readonly class Comment
{
    public int $id;
    public int $authorid;
    public int $blogid;
    public string $content;
    public string $timeStamp;

    public function __construct(int $id, int $authorid, int $blogid, string $content, string $timeStamp)
    {
        $this->id = $id;
        $this->authorid = $authorid;
        $this->blogid = $blogid;
        $this->content = $content;
        $this->timeStamp = gmdate("d/m/y", strtotime($timeStamp));
    }
}




