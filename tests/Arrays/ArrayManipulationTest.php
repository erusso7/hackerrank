<?php

namespace Tests\Arrays;

use App\Arrays\ArrayManipulation;
use PHPUnit\Framework\TestCase;

class ArrayManipulationTest extends TestCase
{
    /** @var ArrayManipulation */
    private $sut;

    protected function setUp(): void
    {
        $this->sut = new ArrayManipulation;
    }

    public function testExecOptimized()
    {
        $expected = 2506721627;

        $actual = $this->sut->finalSolution(
            10000000,
            require 'data/ArrayManipulationTestCase11.php');

        $this->assertEquals($expected, $actual);
    }

    public function testExecFirstSolution()
    {
        $expected = 31;

        $actual = $this->sut->firstSolution(
            4,
            [
                [2, 6, 8],
                [3, 5, 7],
                [1, 8, 1],
                [5, 9, 15],
            ]
        );

        $this->assertEquals($expected, $actual);
    }
}
