<?php

readonly class Blog {
    public int $id;
    public string $title;
    public string $content;
    public int $authorId;
    public int $postTime;

    public function __construct(int $id, string $title, string $content, int $authorId, int $postTime)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->authorId = $authorId;
        $this->postTime = $postTime;
    }

}