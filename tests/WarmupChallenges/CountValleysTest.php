<?php

namespace Tests\WarmupChallenges;

use App\WarmupChallenges\CountValleys;
use PHPUnit\Framework\TestCase;

class CountValleysTest extends TestCase
{
    public function testSolution()
    {
        $expected = 2;
        $sut = new CountValleys;
        $actual = $sut->solution(0, 'DDUUDDUDUUUD');

        $this->assertEquals($expected, $actual);
    }
}
