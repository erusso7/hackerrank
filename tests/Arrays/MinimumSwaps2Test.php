<?php

namespace Tests\Arrays;

use App\Arrays\MinimumSwaps2;
use PHPUnit\Framework\TestCase;

class MinimumSwaps2Test extends TestCase
{
    public function testFirstSolution()
    {
        $sut = new MinimumSwaps2;
        $actual = $sut->firstSolution([1, 3, 5, 2, 4, 6, 7]);

        $this->assertEquals(3, $actual);
    }

    public function testFinalSolution()
    {
        $sut = new MinimumSwaps2;
        $actual = $sut->firstSolution([2, 3, 4, 1, 5]);

        $this->assertEquals(3, $actual);
    }
}
