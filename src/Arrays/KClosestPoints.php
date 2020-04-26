<?php declare(strict_types = 1);

namespace App\Arrays;

use SplMinHeap;

class KClosestPoints
{
    public function kClosest($points, $k)
    {
        $minHeap = $this->buildHeapSortedByDistance();

        foreach ($points as $point) {
            [$x, $y] = $point;
            $minHeap->insert([
                'x' => $x,
                'y' => $y,
                'd' => $this->distance($x, $y),
            ]);
        }

        $closestPoints = [];
        do {
            $point = $minHeap->current();
            if ($point === null) {
                break;
            }

            $closestPoints[] = [$point['x'], $point['y']];
            if (count($closestPoints) === $k) {
                return $closestPoints;
            }

            $minHeap->next();
        } while ($minHeap->valid());

        return $closestPoints;
    }

    private function distance($x, $y): float
    {
        return sqrt($x * $x + $y * $y);
    }

    private function buildHeapSortedByDistance(): SplMinHeap
    {
        return new class extends SplMinHeap {
            protected function compare($value1, $value2)
            {
                return $value2['d'] <=> $value1['d'];
            }
        };
    }
}