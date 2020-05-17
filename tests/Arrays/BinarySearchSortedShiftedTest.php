<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\BinarySearchSortedShifted;
use PHPUnit\Framework\TestCase;

class BinarySearchSortedShiftedTest extends TestCase
{

    /** @dataProvider binarySearchTestCases */
    public function testBinarySearch($expected, $numbers, $target)
    {
        $sut = new BinarySearchSortedShifted;
        $this->assertEquals($expected, $sut->search($numbers, $target));
    }

    public function binarySearchTestCases()
    {
        return [
            [-1, [], 1],
            [1, [3, 1], 1],
            [1, [1, 3], 3],
            [3, [3, 4, 1, 2], 2],
            [-1, [3, 4, 2], 5],
            [-1, [1, 3, 4], 2],
        ];
    }
}
