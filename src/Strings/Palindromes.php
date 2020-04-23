<?php declare(strict_types = 1);

namespace App\Strings;

class Palindromes
{
    public function isPalindrome(string $sentence): bool
    {
        $len = strlen($sentence);
        if ($len === 0) {
            return true;
        }

        $pattern = '/(?![[:alnum:]])./';
        $sentence = strtolower(preg_replace($pattern, '', $sentence));
        $len = strlen($sentence);

        for ($i = 0; $i < ($len / 2); $i++) {
            $frontLetter = $sentence[$i];
            $backLetter = $sentence[$len - 1 - $i];
            if ($frontLetter !== $backLetter) {
                return false;
            }
        }

        return true;
    }
}