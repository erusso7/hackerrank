<?php declare(strict_types = 1);

namespace App\Strings;

class MinimumParentheses
{

    public function minRemoveToMakeValid(string $s): string
    {
        $brackets = ['open' => [], 'close' => []];
        $balance = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            $c = $s[$i];

            if ($c === '(') {
                $brackets['open'][] = [
                    'pos' => $i,
                    'paired' => false,
                ];
                $balance++;
            }
            if ($c === ')') {
                $paired = $balance > 0;
                $brackets['close'][] = [
                    'pos' => $i,
                    'paired' => $paired,
                ];
                if ($paired) {
                    for ($j = count($brackets['open']) - 1; $j >= 0; $j--) {
                        if (!$brackets['open'][$j]['paired']) {
                            $brackets['open'][$j]['paired'] = true;
                            break;
                        }
                    }
                    $balance--;
                }
            }
        }

        foreach ($brackets as $bracketGroup) {
            foreach ($bracketGroup as $bracket) {
                if ($bracket['paired'] === false) {
                    $s[$bracket['pos']] = '_';
                }
            }
        }

        $s = str_replace('_', '', $s);

        return $s;
    }

}