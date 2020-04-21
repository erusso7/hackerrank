<?php declare(strict_types = 1);

namespace App\Strings;

class AddStrings
{

    public function addStrings(string $num1, string $num2)
    {
        $len1 = strlen($num1);
        $len2 = strlen($num2);

        $maxLen = $len1 > $len2 ? $len1 : $len2;

        $num1 = str_pad($num1, $maxLen, '0', STR_PAD_LEFT);
        $num2 = str_pad($num2, $maxLen, '0', STR_PAD_LEFT);

        $result = '';
        $carry = 0;
        for ($i = ($maxLen - 1); $i >= 0; $i--) {
            $digit1 = (int)$num1[$i];
            $digit2 = (int)$num2[$i];

            $sum = $digit1 + $digit2 + $carry;
            $newDigit = $sum % 10;
            $carry = floor($sum / 10);

            $result = (string)$newDigit . $result;
        }

        if ($carry > 0) {
            $result = (string)$carry . $result;
        }

        return $result;
    }
}