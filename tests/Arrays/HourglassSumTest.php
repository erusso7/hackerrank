<?php

namespace Tests\Arrays;

use App\Arrays\TwoDArrayDS;
use PHPUnit\Framework\TestCase;

class HourglassSumTest extends TestCase
{
    public function testExec()
    {
        $sut = new TwoDArrayDS;
        $actual = $sut->solution([
            [1, 1, 1, 0, 0, 0],
            [0, 1, 0, 0, 0, 0],
            [1, 1, 1, 0, 0, 0],
            [0, 0, 2, 4, 4, 0],
            [0, 0, 0, 2, 0, 0],
            [0, 0, 1, 2, 4, 0],
        ]);

        $this->assertEquals(19, $actual);
    }
}
