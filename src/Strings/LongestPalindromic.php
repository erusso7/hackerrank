<?php declare(strict_types = 1);

namespace App\Strings;

class LongestPalindromic
{
    private $palindrome;

    public function longestPalindrome($s)
    {
        if ($this->isPalindromic($s)) {
            return $s;
        }

        $this->palindrome = $s[0] ?? '';

        $this->palindromeFromHead($s);
        $this->palindromeFromMiddle($s);
        $this->palindromeFromTail($s);

        return $this->palindrome;
    }

    private function isPalindromic($s): bool
    {
        $len = strlen($s);
        $middle = (int)($len / 2);
        $head = substr($s, 0, $middle);
        $tail = substr($s, $middle + ($len % 2));

        return $head === strrev($tail);
    }

    private function palindromeFromHead($s)
    {
        $head = substr($s, 0, -1);
        while (strlen($head) > 1) {
            if ($this->isPalindromic($head)) {
                $this->saveFoundPalindrome($head);

                return;
            }
            $head = substr($head, 0, -1);
        }
    }

    private function palindromeFromTail($s)
    {
        $tail = substr($s, 1);
        while (strlen($tail) > 1) {
            if ($this->isPalindromic($tail)) {
                $this->saveFoundPalindrome($tail);

                return;
            }
            $tail = substr($tail, 1);
        }
    }

    private function palindromeFromMiddle($s)
    {
        $middle = substr($s, 1, -1);
        while (strlen($middle) > 1) {
            if ($this->isPalindromic($middle)) {
                $this->saveFoundPalindrome($middle);

                return;
            }

            $this->palindromeFromHead($middle);
            $this->palindromeFromTail($middle);

            $middle = substr($middle, 1, -1);
        }
    }

    private function saveFoundPalindrome($palindrome)
    {
        if (strlen($palindrome) > strlen($this->palindrome)) {
            $this->palindrome = $palindrome;
        }
    }
}