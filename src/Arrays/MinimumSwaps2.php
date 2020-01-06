<?php

namespace App\Arrays;

use App\Tools\Arr;

/**
 * @see https://www.hackerrank.com/challenges/minimum-swaps-2
 */
class MinimumSwaps2
{
    /**
     * O(n) = n.log(n)
     */
    public function firstSolution($q)
    {
        $n = count($q);
        $counter = 0;

        for ($i = 0; $i < $n - 1; $i++) {
            $expectedValue = $i + 1;

            if ($q[$i] == $expectedValue) { //is in the correct position
                continue;
            }

            for ($j = $i + 1; $j < $n; $j++) {
                if ($q[$j] == $expectedValue) {
                    Arr::swap($q, $i, $j);
                    $counter++;
                }
            }
        }

        return $counter;
    }

    /**
     * O(n) = n
     */
    public function finalSolution($q)
    {
        $n = count($q);
        $counter = 0;

        for ($i = 0; $i < $n - 1; $i++) {
            $expectedValue = $i + 1;
            $currentValue = $q[$i];
            if ($currentValue == $expectedValue) { //is in the correct position
                continue;
            }

            Arr::swap($q, $i, $currentValue - 1);
            $i--;
            $counter++;
        }
        return $counter;
    }
}
