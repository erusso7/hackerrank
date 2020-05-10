<?php declare(strict_types = 1);

namespace App\Arrays\Arrays;

class MoveZeroes
{
    public function moveZeroes(&$nums): void
    {
        $lastNonZeroFoundAt = 0;
        for ($cur = 0; $cur < count($nums); $cur++) {
            if ($nums[$cur] != 0) {
                $tmp = $nums[$lastNonZeroFoundAt];
                $nums[$lastNonZeroFoundAt] = $nums[$cur];
                $nums[$cur] = $tmp;
                $lastNonZeroFoundAt++;
            }
        }
    }

    public function moveZeroesInitial(&$nums): void
    {
        $limit = count($nums) - 1;
        for ($i = 0; $i < $limit; $i++) {
            if ($nums[$i] === 0) {
                $nums[] = 0;
                unset($nums[$i]);
            }
        }

        $nums = array_values($nums);
    }
}