<?php

namespace App\DictionariesAndHashmaps;

class TwoString
{
    public function solution($s1, $s2)
    {
        $s1Array = array_flip(str_split($s1));

        for ($i = 0; $i < strlen($s2); $i++) {
            if (array_key_exists($s2[$i], $s1Array)) {
                return 'YES';
            }
        }

        return 'NO';
    }
}
