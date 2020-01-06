<?php

namespace Tests\Arrays;

use App\Arrays\NewYearChaos;
use PHPUnit\Framework\TestCase;

class NewYearChaosTest extends TestCase
{
    public function testItShouldReturnASpecificNumberOfBribes()
    {
        $sut = new NewYearChaos;
        $actual = $sut->solution([1, 2, 5, 3, 7, 8, 6, 4,]);
        $this->assertEquals(7, $actual);
    }

    public function testItShouldReturnTooChaotic()
    {
        $sut = new NewYearChaos;
        $actual = $sut->solution([2, 5, 1, 3, 4]);
        $this->assertEquals('Too chaotic', $actual);
    }
}
