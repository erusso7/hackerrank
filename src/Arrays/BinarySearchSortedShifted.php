<?php declare(strict_types = 1);

namespace App\Arrays;

class BinarySearchSortedShifted
{
    public function search($nums, $target)
    {
        $len = count($nums);
        if (count($nums) === 0) {
            return -1;
        }

        if (!$this->isRotated($nums)) {
            return $this->searchInSortedArray($nums, 0, $len - 1, $target);
        }

        $posSmallest = $this->findPositionOfSmallest($nums);

        $pos = $this->searchInSortedArray($nums, $posSmallest, $len - 1, $target);

        if ($pos != -1) return $pos;

        return $this->searchInSortedArray($nums, 0, $posSmallest, $target);
    }

    private function findPositionOfSmallest(array $nums)
    {

        $posOfMin = count($nums) - 1;
        $iniPos = intval($posOfMin / 2);

        while ($iniPos <= $posOfMin) {
            $ini = $nums[$iniPos];
            $min = $nums[$posOfMin];

            if ($min === $ini) break;

            if ($min > $ini) {
                $posOfMin = $iniPos;
                $iniPos = 0;
                continue;
            }

            if ($min < $ini) {
                $iniPos = intval(($iniPos + $posOfMin + 1) / 2);
                continue;
            }
        }

        return $posOfMin;
    }

    private function searchInSortedArray(
        array $numbers,
        int $i,
        int $f,
        int $target
    ): int {
        while ($i <= $f) {
            $c = intval(($i + $f) / 2);

            $current = $numbers[$c];
            if ($current === $target) return $c;
            if ($target < $current) $f = $c - 1;
            if ($current < $target) $i = $c + 1;
        }

        return -1;
    }

    private function isRotated($nums)
    {
        $first = $nums[0];
        $last = $nums[count($nums) - 1];

        return $first > $last;
    }
}