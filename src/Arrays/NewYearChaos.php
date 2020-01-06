<?php

namespace App\Arrays;

use App\Tools\Arr;

/**
 * @see https://www.hackerrank.com/challenges/new-year-chaos
 */
class NewYearChaos
{
    /**
     * O(n)= n.log(n)
     */
    public function solution($q)
    {
        $limit = count($q) - 1;
        $bribes = [];
        $totalBribes = 0;

        do {
            $bribeDetected = false;
            $i = 0;
            while ($i < $limit) {
                if ($q[$i] > $q[$i + 1]) {
                    if ($bribes[$q[$i]] >= 2) {
                        return 'Too chaotic';
                    }

                    $bribeDetected = true;
                    $totalBribes++;

                    //Increment the bribes of the specific position
                    $bribes[$q[$i]] = (int)$bribes[$q[$i]] + 1;

                    Arr::swap($q, $i, $i + 1);
                }
                $i++;
            }
        } while ($bribeDetected);

        return $totalBribes;
    }
}
