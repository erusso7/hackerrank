<?php declare(strict_types = 1);

namespace App\Arrays;

class BinarySearch
{
    public function search(array $numbers, int $target): int
    {
        return $this->searchInRage($numbers, 0, count($numbers) - 1, $target);
    }

    private function searchInRage(array $numbers, int $i, int $f, int $target): int
    {
        while ($i <= $f) {
            $c = intval(($i + $f) / 2);

            $current = $numbers[$c];
            if ($current === $target) return $c;
            if ($target < $current) $f = $c - 1;
            if ($current < $target) $i = $c + 1;
        }

        return -1;
    }
}