<?php

readonly class Blog {
    public int $id;
    public string $title;
    public string $content;
    public int $authorId;
    //changed postTime to string as gmdate in BlogModel returns a string.
    public string $postTime;

    public function __construct(int $id, string $title, string $content, int $authorId, string $postTime)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->authorId = $authorId;
        $this->postTime = $postTime;
    }

}