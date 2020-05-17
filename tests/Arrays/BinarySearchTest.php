<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    /** @dataProvider binarySearchTestCases */
    public function testBinarySearch($expected, $numbers, $target)
    {
        $sut = new BinarySearch;
        $this->assertEquals($expected, $sut->search($numbers, $target));
    }

    public function binarySearchTestCases()
    {
        return [
            [-1, [], 1],
            [0, [1, 3], 1],
            [1, [1, 3], 3],
            [0, [2, 3, 4], 2],
            [-1, [2, 3, 4], 5],
            [-1, [1, 3, 4], 2],
        ];
    }
}
