<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\LongestPalindromic;
use PHPUnit\Framework\TestCase;

class LongestPalindromicTest extends TestCase
{
    /** @dataProvider longestPalindromicTestCases */
    public function testLongestPalindrome($input, $expected)
    {
        $this->assertEquals(
            $expected,
            (new LongestPalindromic)->longestPalindrome($input)
        );
    }

    public function longestPalindromicTestCases()
    {
        return [
            [
                'cbcdcbedcbc',
                'bcdcb',
            ],
            [
                'cbbd',
                'bb',
            ],
            [
                'eabcb',
                'bcb',
            ],
            [
                'babad',
                'bab',
            ],
            [
                'ccd',
                'cc',
            ],
        ];
    }
}
