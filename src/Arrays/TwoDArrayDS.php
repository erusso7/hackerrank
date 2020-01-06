<?php

namespace App\Arrays;

/**
 * @see https://www.hackerrank.com/challenges/2d-array
 */
class TwoDArrayDS
{
    /**
     * O(n)= n^2
     */
    public function solution(array $arr): int
    {
        $maxSum = PHP_INT_MIN;

        $bounds = count($arr) - 1;

        for ($i = 1; $i < $bounds; $i++) {
            for ($j = 1; $j < $bounds; $j++) {
                $hourglass = $arr[$i - 1][$j - 1]
                    + $arr[$i - 1][$j]
                    + $arr[$i - 1][$j + 1]
                    + $arr[$i][$j]
                    + $arr[$i + 1][$j - 1]
                    + $arr[$i + 1][$j]
                    + $arr[$i + 1][$j + 1];

                if ($hourglass > $maxSum) {
                    $maxSum = $hourglass;
                }
            }
        }
        return $maxSum;
    }
}
