<?php declare(strict_types = 1);

namespace App\DictionariesAndHashmaps;

/**
 * @see https://www.hackerrank.com/challenges/count-triplets-1/problem
 */
class CountTriplets
{
    public function solution(int $r, array $arr): int
    {
        sort($arr);

        $map = [];
        $maxNum = 0;
        foreach ($arr as $pos => $num) {
            if ($num > $maxNum) {
                $maxNum = $num;
            }
            $map[$num] = ($map[$num] ?? 0) + 1;
        }

        $maxPositionToCheck = intval(($maxNum / $r) / $r);
        $triplets = 0;
        foreach ($map as $num => $count) {
            if ($num > $maxPositionToCheck) {
                break;
            }

            $second = $num * $r;
            if (!isset($second)) {
                continue;
            }

            $third = $second * $r;
            if (!isset($third)) {
                continue;
            }

            if ($r === 1) {

                $m = $this->factorial($count);
                $divisor = $this->factorial($count - 3) * $this->factorial(3);

                return intval($m / $divisor);
            }
            $triplets += $count * $map[$second] * $map[$third];
        }

        return $triplets;
    }

    private function factorial($number)
    {
        $m = $number;
        for ($i = $number - 1; $i > 0; $i--) {
            $m *= $i;
        }

        return $m;
    }
}