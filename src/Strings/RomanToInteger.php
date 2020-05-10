<?php declare(strict_types = 1);

namespace App\Strings;

class RomanToInteger
{
    private const SYMBOLS = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    public function romanToInt($s): int
    {
        $result = 0;
        if (strlen($s) === 0) {
            return $result;
        }

        for ($i = 0; $i < strlen($s); $i++) {
            $current = $s[$i];
            $currentValue = self::SYMBOLS[$current];
            $next = $s[$i + 1] ?? '';
            $nextValue = self::SYMBOLS[$next] ?? 0;

            if ($currentValue < $nextValue) {
                $result += $nextValue - $currentValue;
                $i++;
            } else {
                $result += $currentValue;
            }

        }

        return $result;
    }
}