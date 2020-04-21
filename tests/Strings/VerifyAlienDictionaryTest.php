<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\VerifyAlienDictionary;
use PHPUnit\Framework\TestCase;

class VerifyAlienDictionaryTest extends TestCase
{
    /** @dataProvider alienDictionaryTestCases */
    public function testItShouldVerifyTheAlienDictionary($words, $order, $expected)
    {
        $sut = new VerifyAlienDictionary;
        $verification = $sut->isAlienSorted($words, $order);

        $this->assertEquals($expected, $verification);
    }

    public function alienDictionaryTestCases()
    {
        return [
            [
                [],
                '',
                true,
            ],
            [
                ['one-word'],
                '',
                true,
            ],
            [
                ['hello', 'leetcode'],
                'hlabcdefgijkmnopqrstuvwxyz',
                true,
            ],
            [
                ['apple','app'],
                'abcdefghijklmnopqrstuvwxyz',
                false,
            ],
            [
                ['word','world','row'],
                'worldabcefghijkmnpqstuvxyz',
                false,
            ],
        ];
    }
}
