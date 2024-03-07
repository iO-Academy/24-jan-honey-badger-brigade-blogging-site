<?php

require_once 'src/passwordHint.php';

use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    public function test_passwordHintError()
    {
        $expected = 'Password must be at least 8 characters long.';
        $actual = passwordHint('test');
        $this->assertEquals($actual, $expected);
    }

    public function test_passwordHintSuccess()
    {
        $expected = '';
        $actual = passwordHint('testtest');
        $this->assertEquals($actual, $expected);
    }
}
