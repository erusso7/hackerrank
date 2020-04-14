<?php declare(strict_types = 1);

namespace Tests\DictionariesAndHashmaps;

use App\DictionariesAndHashmaps\CountTriplets;
use PHPUnit\Framework\TestCase;

class CountTripletsTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testSolution(int $expectedTriplets, int $r, array $arr)
    {
        $triplets = (new CountTriplets)->solution($r, $arr);
        $this->assertEquals($expectedTriplets, $triplets);
    }

    public function dataProvider()
    {
        return [
            ['expected' => 161700, 'r' => 1, 'arr' => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]],
            ['expected' => 2, 'r' => 2, 'arr' => [1, 2, 2, 4]],
            ['expected' => 6, 'r' => 3, 'arr' => [1, 3, 9, 9, 27, 81,]],
            ['expected' => 4, 'r' => 5, 'arr' => [1, 5, 5, 25, 125]],
        ];
    }
}
