<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\PalindromesFixer;
use PHPUnit\Framework\TestCase;

class PalindromesFixerTest extends TestCase
{
    /** @dataProvider palindromesFixerTestCases */
    public function testItShouldFixThePalindromes(string $sentence, $expected)
    {
        $this->assertEquals(
            $expected,
            (new PalindromesFixer)->validPalindrome($sentence)
        );
    }

    public function palindromesFixerTestCases()
    {
        return [
            ['aba', true],
            ['abca', true],
            ['acbca', true],
            ['deeee', true],
            ['abc', false],
            ['eddze', true],
        ];
    }
}
