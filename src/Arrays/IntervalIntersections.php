<?php declare(strict_types = 1);

namespace App\Arrays;

class IntervalIntersections
{
    function intervalIntersection(array $a, array $b): array
    {
        $intervals = [];

        foreach ($a as $segA) {
            foreach ($b as $segB) {
                $this->addIntervals($intervals, $segA, $segB);
            }
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