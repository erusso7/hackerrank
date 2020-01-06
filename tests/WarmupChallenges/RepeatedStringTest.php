<?php

namespace Tests\WarmupChallenges;

use App\WarmupChallenges\RepeatedString;
use PHPUnit\Framework\TestCase;

class RepeatedStringTest extends TestCase
{

    public function testSolution()
    {
        $actual = (new RepeatedString)->solution('aba', 10);
        $this->assertEquals(7, $actual);
    }
}
