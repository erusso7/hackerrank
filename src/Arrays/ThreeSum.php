<?php declare(strict_types = 1);

namespace App\Arrays;

class ThreeSum
{
    private $triplets = [];

    public function threeSum($nums)
    {
        sort($nums);

        $prev = null;
        for ($i = 0; $i < count($nums); $i++) {
            $cur = $nums[$i];
            if ($cur > 0) break;
            if (isset($prev) && $nums[$i] === $nums[$prev]) continue;

            $lo = $i + 1;
            $hi = count($nums) - 1;
            $this->twoSum($nums, $lo, $hi, $i);
            $prev = $i;
        }

        return $this->triplets;
    }

    private function twoSum($nums, $lo, $hi, $cur)
    {
        $prevLo = false;
        $prevHi = false;
        while ($lo < $hi) {
            if ($nums[$cur] + $nums[$lo] + $nums[$hi] < 0 || $nums[$lo] === $prevLo) {
                $prevLo = $nums[$lo];
                $lo++;
            } else if ($nums[$cur] + $nums[$lo] + $nums[$hi] > 0 || $nums[$hi] === $prevHi) {
                $prevHi = $nums[$hi];
                $hi--;
            } else {
                $this->triplets[] = [$nums[$cur], $nums[$lo], $nums[$hi]];
                $prevLo = $nums[$lo];
                $prevHi = $nums[$hi];
                $lo++;
                $hi--;
            }
        }
    }
}