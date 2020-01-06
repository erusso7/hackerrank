<?php

namespace App\WarmupChallenges;

/**
 * @see https://www.hackerrank.com/challenges/jumping-on-the-clouds
 */
class JumpingOnTheClouds
{
    /**
     * O(n)= 2n = n
     */
    public function solution(int $n, $c): int
    {
        $clouds = array_map('intval', explode(' ', $c));

        $jumps = 0;
        $i = 0;
        while ($i < ($n - 1)) {

            if (($i + 2) < $n && $clouds[$i + 2] === 0) {
                $jumps++;
                $i = $i + 2;
                continue;
            }

            if ($clouds[$i + 1] === 0) {
                $jumps++;
            }

            $i = $i + 1;
        }

        return $jumps;
    }
}
