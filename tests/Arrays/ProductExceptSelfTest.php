<?php declare(strict_types = 1);

namespace Tests\Arrays;

use PHPUnit\Framework\TestCase;

class ProductExceptSelfTest extends TestCase
{
    /** @dataProvider productExceptSelfTestCases */
    public function testProductExceptSelf($nums, $expected)
    {
        $this->assertEquals($expected, (new ProductExceptSelf)->productExceptSelf($nums));
    }

    public function productExceptSelfTestCases()
    {
        return [
            [
                [1, 0],
                [0, 1],
            ],
            [
                [0, 0],
                [0, 0],
            ],
            [
                [1, 2, 3, 4],
                [24, 12, 8, 6],
            ],
        ];
    }
}
