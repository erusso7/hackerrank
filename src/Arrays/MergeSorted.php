<?php declare(strict_types = 1);

namespace App\Arrays;

class MergeSorted
{

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        if ($n === 0) {
            return null;
        }
        $result = [];
        $lastChecked = 0;
        for ($i = 0; $i < ($n + $m); $i++) {
            $candidate = $nums2[$i] ?? PHP_INT_MAX;
            $merged = false;

            for ($j = $lastChecked; $j < $m; $j++) {
                $target = $nums1[$j];

                if ($target > $candidate) {
                    $result[] = $candidate;
                    $merged = true;
                    break;
                }
                $result[] = $target;
            }

            if (!$merged && $candidate !== PHP_INT_MAX) {
                $result[] = $candidate;
            }

            $lastChecked = $j;
        }
        $nums1 = $result;

        return null;
    }
}