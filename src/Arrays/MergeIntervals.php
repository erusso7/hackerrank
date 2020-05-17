<?php declare(strict_types = 1);

namespace App\Arrays;

class MergeIntervals
{
    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    public function merge($intervals)
    {
        if (count($intervals) == 0) {
            return [];
        }

        // O(n.log n)
        usort($intervals, function ($a, $b) {
            return $a[0] > $b[0];
        });

        $result = null;
        do {
            [$result, $merged] = $this->mergeOnce($result ?? $intervals);
        } while ($merged);

        return $result;
    }

    private function mergeOnce($intervals)
    {
        if (count($intervals) == 1) {
            return [$intervals, false];
        }

        $merged = false;
        $result = [];

        for ($i = 0; $i < count($intervals) - 1; $i++) {
            $current = $intervals[$i];
            $next = $intervals[$i + 1];

            if ($this->isOverlapping($current, $next)) {
                $result[] = [$current[0], max($current[1], $next[1])];
                $merged = true;
                $i++;
                continue;
            }

            $result[] = $current;
        }

        $lastAdded = $result[count($result) - 1];
        $last = $intervals[count($intervals) - 1];

        if ($this->isOverlapping($lastAdded, $last)) {
            $result[count($result) - 1][1] = max($lastAdded[1], $last[1]);
        } else {
            $result[] = $last;
        }

        return [$result, $merged];
    }

    private function isOverlapping($a, $b)
    {
        return $a[1] >= $b[0];
    }
}