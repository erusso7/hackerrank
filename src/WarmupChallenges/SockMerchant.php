<?php

namespace App\WarmupChallenges;

/**
 * @see https://www.hackerrank.com/challenges/sock-merchant
 */
class SockMerchant
{
    /**
     * O(n)= 2n = n
     */
    public function solution($n, $ar)
    {
        $pairs = [];
        foreach ($ar as $pairNumber) {
            $pairs[$pairNumber] = ($pairs[$pairNumber] ?? 0) + 1;
        }

        $result = 0;
        foreach ($pairs as $pair => $count) {
            $result += floor($count / 2);
        }

        return $result;
    }
}