<?php
namespace App\DictionariesAndHashmaps;

/**
 * @see https://www.hackerrank.com/challenges/ctci-ransom-note
 */
class RamsonNote
{
    /**
     * O(n)= 2.n = n
     */
    public function solution($magazine, $note)
    {
        $magazineByWords = [];
        foreach ($magazine as $magazineWord) {
            $magazineByWords[$magazineWord] = ($magazineByWords[$magazineWord] ?? 0) + 1;
        }

        foreach ($note as $word) {
            if (($magazineByWords[$word] ?? 0) === 0) {
                return 'No';
            }
            $magazineByWords[$word]--;
        }

        return 'Yes';
    }
}
