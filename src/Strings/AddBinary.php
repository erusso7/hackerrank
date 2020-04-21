<?php declare(strict_types = 1);

namespace App\Strings;

class AddBinary
{

    public function addBinary(string $a, string $b): string
    {
        $aLength = strlen($a);
        $bLength = strlen($b);

        $maxLength = $aLength > $bLength ? $aLength : $bLength;

        $a = str_pad($a, $maxLength, '0', STR_PAD_LEFT);
        $b = str_pad($b, $maxLength, '0', STR_PAD_LEFT);

        $result = '';
        $carry = '0';
        for ($i = ($maxLength - 1); $i >= 0; $i--) {
            $ones = [
                $a[$i] === '1',
                $b[$i] === '1',
                $carry === '1',
            ];
            $numOnes = count(array_filter($ones));
            $newBit = $numOnes === 1 || $numOnes === 3 ? '1' : '0';

            $result = $newBit . $result;

            $carry = $numOnes === 2 || $numOnes === 3 ? '1' : '0';
        }

        return $carry === '1'
            ? $carry . $result
            : $result;
    }
}