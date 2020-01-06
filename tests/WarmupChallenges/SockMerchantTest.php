<?php

namespace Tests\WarmupChallenges;

use App\WarmupChallenges\SockMerchant;
use PHPUnit\Framework\TestCase;

class SockMerchantTest extends TestCase
{
    public function testSolution()
    {
        $actual = (new SockMerchant)->solution(null, [10, 20, 20, 10, 10, 30, 50, 10, 20]);
        $this->assertEquals(3, $actual);
    }
}
