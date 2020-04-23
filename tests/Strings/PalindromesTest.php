<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\Palindromes;
use PHPUnit\Framework\TestCase;

class PalindromesTest extends TestCase
{

    /** @dataProvider palindromeTestCases */
    public function testIsPalindrome($sentence, $expected)
    {
        $sut = new Palindromes;
        $this->assertEquals($expected, $sut->isPalindrome($sentence));
    }

    public function palindromeTestCases()
    {
        return [
            ['', true],
            ['race a car', false],
            ['0P', false],
            ['A man, a plan, a canal: Panama', true],
        ];
    }
}
