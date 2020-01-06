<?php

namespace App\WarmupChallenges;

/**
 * @see https://www.hackerrank.com/challenges/repeated-string
 */
class RepeatedString
{
    /**
     * O(n)= 1
     */
    public function solution($s, $n): int
    {
        $patternLength = strlen($s);

        $numberOfPatters = floor($n / $patternLength);

        $lastPatternLength = $n % $patternLength;

        return substr_count($s, 'a') * $numberOfPatters + substr_count($s, 'a', 0, $lastPatternLength);
    }
}
