<?php

namespace App\Arrays;

/**
 * @see https://www.hackerrank.com/challenges/crush/problem
 */
class ArrayManipulation
{
    /**
     * This implementation will fail because it will try to use a lot of memory
     * when using a big amount of queries.
     * O(n)= n.m = n^2
     */
    public function firstSolution($n, $queries)
    {
        $results = [];
        $max = PHP_INT_MIN;
        foreach ($queries as $query) {

            [$start, $end, $sum] = $query;

            for ($i = $start - 1; $i < $end; $i++) {
                $results[$i] = ($results[$i] ?? 0) + $sum;
                if ($results[$i] > $max) {
                    $max = $results[$i];
                }
            }
        }

        return $max;
    }

    /**
     * This was the final solution, but... I couldn't achieve it by my self,
     * and I needed to read few comments. The solution is simple brilliant.
     * O(n)= 2n = n
     */
    public function finalSolution($n, $queries)
    {
        $results = [];

        foreach ($queries as $query) {
            [$start, $end, $sum] = $query;

            $results[$start - 1] = ($results[$start - 1] ?? 0) + $sum;
            $results[$end] = ($results[$end] ?? 0) - $sum;
        }
        $max = 0;
        $tmp = 0;
        ksort($results);
        foreach ($results as $result) {

            $tmp = $tmp + $result;
            if ($tmp > $max) {
                $max = $tmp;
            }
        }

        return $max;
    }
}
