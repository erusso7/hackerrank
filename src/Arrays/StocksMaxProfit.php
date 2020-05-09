<?php declare(strict_types = 1);

namespace App\Arrays;

class StocksMaxProfit
{
    function maxProfit($prices): int
    {
        $diff = 0;
        $tmpNewMin = PHP_INT_MAX;
        $tmpNewMax = PHP_INT_MIN;
        $canUpdateDiff = true;
        $canUpdateMax = true;

        foreach ($prices as $price) {
            if ($price <= $tmpNewMin) {
                $tmpNewMin = $price;
                $canUpdateMax = true;
            }
            if ($price >= $tmpNewMax || $canUpdateMax) {
                $tmpNewMax = $price;
                $canUpdateDiff = true;
            }

            $tmpNewDiff = $tmpNewMax - $tmpNewMin;
            if ($tmpNewDiff > $diff && $canUpdateDiff) {
                $diff = $tmpNewDiff;
                $canUpdateDiff = false;
                $canUpdateMax = false;
            }
        }

        return $diff;
    }
}