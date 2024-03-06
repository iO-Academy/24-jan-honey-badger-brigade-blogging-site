<?php

readonly class PostLike {
    public int $total;
    public int $blogid;
    public bool $likes;
    public bool $dislikes;

    public function __construct(int $total, int $blogid, bool $likes)
    {
        $this->total = $total;
        $this->blogid = $blogid;
        $this->likes = $likes;
        $this->dislikes = $total-$likes;
    }

}