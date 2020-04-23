<?php declare(strict_types = 1);

namespace App\Strings;

class PalindromesFixer
{
    public function validPalindrome(string $sentence): bool
    {
        $palindromeFails = $this->isPalindrome($sentence);
        if ($palindromeFails === -1) {
            return true;
        }

        $len = strlen($sentence);
        $headCorrection = substr($sentence, 0, $palindromeFails)
            . substr($sentence, $palindromeFails + 1, $len - 1);
        if ($this->isPalindrome($headCorrection) === -1) {
            return true;
        }

        $tailCorrection = substr($sentence, 0, $len - $palindromeFails - 1)
            . substr($sentence, $len - $palindromeFails, $len - 1);
        if ($this->isPalindrome($tailCorrection) === -1) {
            return true;
        }

        return false;
    }

    private function isPalindrome(string $sentence): int
    {
        $len = strlen($sentence);
        $middle = intval($len / 2);
        $head = substr($sentence, 0, $middle);
        $headLen = strlen($head);
        $tail = substr($sentence, $middle + ($len % 2), $len);
        $tailLen = strlen($tail);

        for ($i = 0; $i < $headLen; $i++) {
            if ($head[$i] !== $tail[$tailLen - 1 - $i]) {
                break;
            }
        }

        return $i >= $headLen ? -1 : $i;
    }
}