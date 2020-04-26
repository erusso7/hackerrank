<?php declare(strict_types = 1);

namespace App\Arrays;

class IntervalIntersections
{
    function intervalIntersection(array $a, array $b): array
    {
        $intervals = [];
        $hasMoreSegments = count($a) > 0 || count($b) > 0;
        $previousA = [];
        $previousB = [];
        while ($hasMoreSegments) {
            $segA = array_shift($a) ?? []; //warning O(n)
            $segB = array_shift($b) ?? []; //warning O(n)

            $this->addIntervals($intervals, $segA, $previousB);
            $this->addIntervals($intervals, $previousA, $segB);
            $this->addIntervals($intervals, $segA, $segB);

            $hasMoreSegments = count($a) > 0 || count($b) > 0;
            $previousA = empty($segA) && !empty($segB)
                ? $previousA
                : $segA;

            $previousB = empty($segB) && !empty($segA)
                ? $previousB
                : $segB;
        }

        return $intervals;
    }

    private function addIntervals(
        array &$intervals,
        array $segA,
        array $segB
    ) {
        $interval = $this->getInterval($segA, $segB);
        if ($interval != []) {
            $intervals[] = $interval;
        }
    }

    private function getInterval(array $segA, array $segB)
    {
        if (count($segA) === 0 || count($segB) === 0) {
            return [];
        }
        /*
         * A ---      ||     ---
         * B      --- || ---
        */
        if (!$this->areOverlapped($segA, $segB)) {
            return [];
        }

        [$startA, $endA] = $segA;
        [$startB, $endB] = $segB;

        return [
            $startA <= $startB ? $startB : $startA,
            $endB <= $endA ? $endB : $endA,
        ];
    }

    private function areOverlapped(array $segA, array $segB): bool
    {
        if (count($segA) === 0 || count($segB) === 0) {
            return false;
        }

        [$startA, $endA] = $segA;
        [$startB, $endB] = $segB;

        return !($endA < $startB || $endB < $startA);
    }
}