<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\MergeSorted;
use PHPUnit\Framework\TestCase;

class MergeSortedTest extends TestCase
{
    /** @dataProvider mergeSortTestCases */
    public function testItShouldMergeTwoArrays($num1, $m, $num2, $n, $expected)
    {
        $sut = new MergeSorted;
        $this->assertNull($sut->merge($num1, $m, $num2, $n));
        $this->assertEquals($expected, $num1);
    }

    public function mergeSortTestCases()
    {
        return [
            [
                [2, 0],
                1,
                [1],
                1,
                [1, 2],
            ],
            [
                [1, 3, 0, 0],
                2,
                [2, 5],
                2,
                [1, 2, 3, 5],
            ],
            [
                [1, 2, 3, 0, 0, 0],
                3,
                [2, 5, 6],
                3,
                [1, 2, 2, 3, 5, 6],
            ],
        ];
    }
}
