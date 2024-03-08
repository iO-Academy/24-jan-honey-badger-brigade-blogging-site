<?php

use PHPUnit\Framework\TestCase;
require_once 'src/Entities/Blog.php';

class ControversialTest extends TestCase
{
    public function test_noControversyCalc()
    {
        $expected = false;
        $subject = new Blog (1, 'title', 'content', 1, 'name', '2024-03-04 10:11:03', 100, 149);
        $actual = $subject->controversial;
        $this->assertEquals($expected, $actual);
    }

    public function test_controversyCalc()
    {
        $expected = true;
        $subject = new Blog (1, 'title', 'content', 1, 'name', '2024-03-04 10:11:03', 50, 76);
        $actual = $subject->controversial;
        $this->assertEquals($expected, $actual);
    }
}

