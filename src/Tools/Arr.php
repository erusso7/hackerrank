<?php

namespace App\Tools;

class Arr
{
    public static function swap(
        array &$array,
        int $initialPos,
        int $finalPos
    ): void {
        $tmp = $array[$initialPos];
        $array[$initialPos] = $array[$finalPos];
        $array[$finalPos] = $tmp;
    }
}