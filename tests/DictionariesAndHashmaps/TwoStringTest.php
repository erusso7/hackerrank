<?php

namespace Tests\DictionariesAndHashmaps;

use App\DictionariesAndHashmaps\TwoString;
use PHPUnit\Framework\TestCase;

class TwoStringTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testSolution($expected, $s1, $s2)
    {
        $sut = new TwoString;
        $actual = $sut->solution($s1, $s2);

        $this->assertEquals($expected, $actual);
    }

    public function dataProvider()
    {
        return [
            [
                'YES',
                'hello',
                'world',
            ],
            [
                'NO',
                'hi',
                'world',
            ],
        ];
    }
}
