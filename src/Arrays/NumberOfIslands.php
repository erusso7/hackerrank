<?php declare(strict_types = 1);

namespace App\Arrays;

class NumberOfIslands
{
    public function numIslands($grid): int
    {
        $islands = 0;
        $usedLands = [];
        for ($row = 0; $row < count($grid); $row++) {
            for ($col = 0; $col < count($grid[$row]); $col++) {
                if ($usedLands[$row][$col] ?? false) {
                    continue;
                }

                if ($this->isLand($grid, $row, $col)) {
                    $islands++;
                }

                $this->useAdjacentLand($usedLands, $grid, $row, $col);
            }
        }

        return $islands;
    }

    public function useAdjacentLand(&$usedLands, $grid, $row, $col): void
    {
        if (!$this->isLand($grid, $row, $col) || ($usedLands[$row][$col] ?? false)) {
            return;
        }

        $usedLands[$row][$col] = true;
        $this->useAdjacentLand($usedLands, $grid, $row - 1, $col);
        $this->useAdjacentLand($usedLands, $grid, $row, $col + 1);
        $this->useAdjacentLand($usedLands, $grid, $row + 1, $col);
        $this->useAdjacentLand($usedLands, $grid, $row, $col - 1);
    }

    public function isLand($grid, $row, $col): bool
    {
        return ($grid[$row][$col] ?? '0') === '1';
    }
}