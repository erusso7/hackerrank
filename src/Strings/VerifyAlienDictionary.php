<?php declare(strict_types = 1);

namespace App\Strings;

class VerifyAlienDictionary
{

    public function isAlienSorted(array $words, $order): bool
    {
        if (count($words) <= 1) {
            return true;
        }

        for ($i = 1; $i < count($words); $i++) {
            $previuous = $words[$i - 1];
            $current = $words[$i];

            if (!$this->areWordsAlienSorted($previuous, $current, $order)) {
                return false;
            }
        }

        return true;
    }

    private function areWordsAlienSorted($a, $b, $order): bool
    {
        $orderWeight = array_flip(
            array_reverse(
                str_split($order)
            )
        );

        $aLen = strlen($a);
        $bLen = strlen($b);
        $minLength = $aLen < $bLen ? $aLen : $bLen;

        for ($i = 0; $i < $minLength; $i++) {

            $aWeight = $orderWeight[$a[$i]];
            $bWeight = $orderWeight[$b[$i]];
            if ($aWeight > $bWeight) {
                return true;
            }
            if ($bWeight > $aWeight) {
                return false;
            }
        }

        return $aLen < $bLen;
    }
}