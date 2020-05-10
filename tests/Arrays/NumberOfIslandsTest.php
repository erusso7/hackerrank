<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\NumberOfIslands;
use PHPUnit\Framework\TestCase;

class NumberOfIslandsTest extends TestCase
{

    /** @dataProvider numIslandsTestCases */
    public function testNumIslands($grid, $expected)
    {
        $sut = new NumberOfIslands;
        $this->assertEquals($expected, $sut->numIslands($grid));
    }

    public function numIslandsTestCases()
    {
        return [
            [
                'grid' => [
                    ['1', '1', '1', '1', '0'],
                    ['1', '1', '0', '1', '0'],
                    ['1', '1', '0', '0', '0'],
                    ['0', '0', '0', '0', '0'],
                ],
                'islands' => 1,
            ],
            [
                'grid' => [
                    ['1', '0', '1'],
                    ['0', '0', '1'],
                ],
                'islands' => 2,
            ],
            [
                'grid' => [
                    ['1', '0'],
                    ['0', '0'],
                ],
                'islands' => 1,
            ],
            [
                'grid' => [
                    ['1', '1'],
                    ['0', '0'],
                ],
                'islands' => 1,
            ],
            [
                'grid' => [
                    ['1', '1'],
                    ['1', '0'],
                ],
                'islands' => 1,
            ],
            [
                'grid' => [
                    ['1', '1'],
                    ['1', '1'],
                ],
                'islands' => 1,
            ],
        ];
    }
}
