<?php

namespace App\WarmupChallenges;

/**
 * @see https://www.hackerrank.com/challenges/counting-valleys
 */
class CountValleys
{
    /**
     * O(n) = n
     */
    public function solution($n, $s): int
    {
        $level = 0;
        $valleys = 0;

        $stepsAsArray = str_split($s);

        foreach ($stepsAsArray as $step) {

            $uphill = ($step === 'U');
            $downhill = !$uphill;

            if ($downhill && $level === 0) {
                $valleys++;
            }

            $level = $uphill ? $level + 1 : $level - 1;
        }

        return $valleys;
    }
}
