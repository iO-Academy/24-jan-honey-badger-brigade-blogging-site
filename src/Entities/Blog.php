<?php
readonly class Blog
{
    public int $id;
    public string $title;
    public string $content;
    public string $extract;
    public ?int $authorId;
    public string $username;
    public string $postTime;
    public ?string $category;
    public int $likes;
    public int $dislikes;
    public bool $controversial;
    public function __construct(int $id, string $title, string $content, ?int $authorId, string $username, string $postTime, ?string $category, int|null $likes, int|null $dislikes)
    {
        $this->id = $id;
        $this->title = $title;
        $this->extract = substr($content, 0, 100) . '...';
        $this->content = $content;
        $this->authorId = $authorId;
        $this->username = $username;
        $this->postTime = gmdate("d/m/y", strtotime($postTime));
        $this->category = $category ?: '';
        $this->likes = $likes ?: 0;
        $this->dislikes = $dislikes ?: 0;
        $this->controversial = ($this->likes*1.5)<$this->dislikes ? true : false;
    }
}


