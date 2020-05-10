<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\RomanToInteger;
use PHPUnit\Framework\TestCase;

class RomanToIntegerTest extends TestCase
{
    /** @dataProvider romanToIntTestCases */
    public function testRomanToInt($roman, $expected)
    {
        $sut = new RomanToInteger;
        $this->assertEquals($expected, $sut->romanToInt($roman));
    }

    public function romanToIntTestCases()
    {
        return [
            ['', 0],
            ['I', 1],
            ['II', 2],
            ['IV', 4],
            ['VI', 6],
            ['VII', 7],
        ];
    }
}
