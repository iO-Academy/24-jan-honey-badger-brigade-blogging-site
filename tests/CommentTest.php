<?php

require_once 'src/Entities/Comment.php';
use PHPUnit\Framework\TestCase;
class CommentTest extends TestCase
{
    public function test_formatDate()
    {
        $expected = '04/03/24';
        $subject = new Comment(1, 2, 1, 'blah blah blah', '2024-03-04 10:11:03', 'username');
        $actual = $subject->timeStamp;
        $this->assertEquals($actual, $expected);
    }
}
