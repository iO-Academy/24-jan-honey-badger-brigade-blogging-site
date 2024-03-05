<?php

readonly class Blog {
    public int $id;
    public string $title;
    public string $content;
    public string $extract;
    public int $authorId;
    public string $postTime;

    public function __construct(int $id, string $title, string $content, int $authorId, string $postTime)
    {
        $this->id = $id;
        $this->title = $title;
        $this->extract = substr($content, 0, 100) . '...';
        $this->content = $content;
        $this->authorId = $authorId;
        $this->postTime = $postTime;
    }
}