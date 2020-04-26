<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\KClosestPoints;
use PHPUnit\Framework\TestCase;

class KClosestPointsTest extends TestCase
{
    /** @dataProvider kClosestPointsTestCases */
    public function testKClosest($points, $k, $expected)
    {
        $sut = new KClosestPoints;
        $this->assertEquals($expected, $sut->kClosest($points, $k));
    }

    public function kClosestPointsTestCases()
    {
        return [
            [
                [[1, 1], [2, 2], [3, 3]],
                1,
                [[1, 1]],
            ],
            [
                [[1, 1], [2, 2], [3, 3]],
                2,
                [[1, 1], [2, 2]],
            ],
        ];
    }
}
