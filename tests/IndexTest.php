<?php

require_once 'index.php';

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{

    public function test_sortByOldest()
    {
        $expected = [1,2,3,4,5];
        $actual = array_reverse([5,4,3,2,1]);

        $this->assertEquals($expected, $actual);
    }

    public function test_sortByNewest()
    {
        $expected = [5,4,3,2,1];
        $actual = array_reverse([1,2,3,4,5]);

        $this->assertEquals($expected, $actual);
    }

}


