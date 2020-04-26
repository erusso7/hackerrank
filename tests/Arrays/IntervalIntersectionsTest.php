<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\IntervalIntersections;
use PHPUnit\Framework\TestCase;

class IntervalIntersectionsTest extends TestCase
{

    /** @dataProvider intervalsIntersectionTestCases */
    public function testIntervalIntersection($a, $b, $expected)
    {
        $sut = new IntervalIntersections;
        $this->assertEquals(
            $expected,
            $sut->intervalIntersection($a, $b)
        );
    }

    public function intervalsIntersectionTestCases()
    {
        return [
            [
                'Intervals A' => [[1, 2]],
                'Intervals B' => [[3, 4]],
                'Expected' => [],
            ],
            [
                'Intervals A' => [[1, 3]],
                'Intervals B' => [[2, 4]],
                'Expected' => [[2, 3]],
            ],
            [
                'Intervals A' => [[2, 4]],
                'Intervals B' => [[1, 3]],
                'Expected' => [[2, 3]],
            ],
            [
                'Intervals A' => [[2, 4]],
                'Intervals B' => [[1, 5]],
                'Expected' => [[2, 4]],
            ],
            [
                'Intervals A' => [[1, 5]],
                'Intervals B' => [[2, 4]],
                'Expected' => [[2, 4]],
            ],
            [
                'Intervals A' => [[2, 4]],
                'Intervals B' => [[2, 4]],
                'Expected' => [[2, 4]],
            ],
            [
                'Intervals A' => [[3, 4]],
                'Intervals B' => [[4, 5]],
                'Expected' => [[4, 4]],
            ],
            [
                'Intervals A' => [[1, 3], [5, 7]],
                'Intervals B' => [[2, 5]],
                'Expected' => [[2, 3], [5, 5]],
            ],
            [
                'Intervals A' => [[0, 2], [5, 10], [13, 23], [24, 25]],
                'Intervals B' => [[1, 5], [8, 12], [15, 24], [25, 26]],
                'Expected' => [[1, 2], [5, 5], [8, 10], [15, 23], [24, 24], [25, 25]],
            ],
            [
                'Intervals A' => [[8, 15]],
                'Intervals B' => [[2, 6], [8, 10], [12, 20]],
                'Expected' => [[8, 10], [12, 15]],
            ],
            //[
            //    'Intervals A' => [[0, 5], [12, 14], [15, 18]],
            //    'Intervals B' => [[11, 15], [18, 19]],
            //    'Expected' => [[12, 14], [15, 15], [18, 18]],
            //],
        ];
    }
}
