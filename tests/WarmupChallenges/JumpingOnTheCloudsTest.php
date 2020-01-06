<?php

namespace Tests\WarmupChallenges;

use App\WarmupChallenges\JumpingOnTheClouds;
use PHPUnit\Framework\TestCase;

class JumpingOnTheCloudsTest extends TestCase
{
    public function testSolution()
    {
        $actual = (new JumpingOnTheClouds)->solution(6, '0 0 0 0 1 0');
        $this->assertEquals(3, $actual);
    }
}
