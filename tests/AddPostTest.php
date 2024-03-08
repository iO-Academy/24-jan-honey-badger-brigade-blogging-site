<?php

use PHPUnit\Framework\TestCase;


require_once 'src/cleanInput.php';

class AddPostTest extends TestCase
{
    public function test_cleanUpInput_trim()
    {
        $expected = "Heloo jffsjflsjefjseflsj isdskfeksfksefksvcxfvdxvx";
        $data = " Heloo jffsjflsjefjseflsj isdskfeksfksefksvcxfvdxvx";
        $actual = cleanUpInput($data);

        $this->assertEquals($expected, $actual);
    }
    public function test_cleanUpInput_specialChars()
    {
        $expected = "&amp;!@##";
        $data = "&!@##";
        $actual = cleanUpInput($data);

        $this->assertEquals($expected, $actual);
    }
}
