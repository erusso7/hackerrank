<?php declare(strict_types = 1);

namespace App\Strings;

const VOWELS = ['a', 'e', 'i', 'o', 'u'];

class GoatLatin
{
    public function toGoatLatin(string $sentence)
    {
        $words = explode(' ', $sentence);

        $newWords = [];
        foreach ($words as $i => $word) {
            if (empty(trim($word))) {
                continue;
            }

            $word = $this->itStartsWithVowel($word)
                ? $word . 'ma'
                : substr($word, 1) . substr($word, 0, 1) . 'ma';

            $newWords[] = $word . str_pad('', $i + 1, 'a');
        }

        return implode(' ', $newWords);
    }

    private function itStartsWithVowel($word): bool
    {
        $firstLetter = strtolower(substr($word, 0, 1));

        return in_array($firstLetter, ['a', 'e', 'i', 'o', 'u']);
    }
}