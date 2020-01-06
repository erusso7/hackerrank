<?php

namespace App\Arrays;

/**
 * @see https://www.hackerrank.com/challenges/ctci-array-left-rotation
 */
class ArrayLeftRotation
{
    /**
     * O(n)= n
     */
    public function solution($a, $d)
    {
        $n = count($a);
        $result = array_pad([], $n, 0);
        foreach ($a as $i => $item) {
            $newPos = $i >= $d
                ? $i - $d
                : $n - $d + $i;
            $result[$newPos] = $item;
        }

        return $result;
    }
}