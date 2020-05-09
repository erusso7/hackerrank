<?php declare(strict_types = 1);

namespace Tests\Arrays;

use App\Arrays\StocksMaxProfit;
use PHPUnit\Framework\TestCase;

class StocksMaxProfitTest extends TestCase
{
    /** @dataProvider maxProfitTestCases */
    public function testMaxProfit($prices, $expected)
    {
        $sut = new StocksMaxProfit;
        $this->assertEquals($expected, $sut->maxProfit($prices));
    }

    public function maxProfitTestCases()
    {
        return [
            [[3, 3, 5, 0, 0, 3, 1, 4], 4],
            [[2, 1, 2, 1, 0, 1, 2], 2],
            [[2, 4, 1], 2],
            [[], 0],
            [[1, 7], 6],
            [[7, 1], 0],
            [[7, 1, 5, 3, 6, 4], 5],
        ];
    }
}
