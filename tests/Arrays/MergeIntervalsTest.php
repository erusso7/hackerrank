<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\MergeIntervals;
use PHPUnit\Framework\TestCase;

class MergeIntervalsTest extends TestCase
{
    /** @dataProvider mergeIntervalTestCases */
    public function testMergeInterval($intervals, $expected)
    {
        $sut = new MergeIntervals;
        $this->assertEquals($expected, $sut->merge($intervals));
    }

    public function mergeIntervalTestCases()
    {
        return [
            [
                [],
                [],
            ],
            [
                [[0, 1], [1, 2]],
                [[0, 2]],
            ],
            [
                [[0, 4], [1, 2]],
                [[0, 4]],
            ],
            [
                [[0, 2], [1, 5]],
                [[0, 5]],
            ],
            [
                [[0, 1], [1, 5], [6, 7]],
                [[0, 5], [6, 7]],
            ],
        ];
    }
}
