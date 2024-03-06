<?php

use PHPUnit\Framework\TestCase;

require_once 'addPost.php';

class AddPostTest extends TestCase
{

    public function test_cleanUpInput()
    {
        $expected = "Heloo jffsjflsjefjseflsj isdskfeksfksefksvcxfvdxvx";
        $data = " Heloo jffsjflsjefjseflsj isdskfeksfksefksvcxfvdxvx";
        $actual = cleanUpInput($data);

        $this->assertEquals($expected, $actual);
    }

}
