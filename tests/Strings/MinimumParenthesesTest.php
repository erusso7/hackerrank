<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\MinimumParentheses;
use PHPUnit\Framework\TestCase;

class MinimumParenthesesTest extends TestCase
{
    /** @dataProvider  minRemoveTestCases */
    public function testItShouldRemoveSomeParentheses(string $s, string $expected)
    {
        $sut = new MinimumParentheses;
        $this->assertEquals($expected, $sut->minRemoveToMakeValid($s));
    }

    public function minRemoveTestCases()
    {
        return [
            ['', ''],
            [')(', ''],
            ['())()(((', '()()'],
            ['a)b(c)d', 'ab(c)d'],
            ['lee(t(c)o)de)', 'lee(t(c)o)de'],
        ];
    }
}
