<?php

namespace Tests\Arrays;

use App\Arrays\ArrayLeftRotation;
use PHPUnit\Framework\TestCase;

class ArrayLeftRotationTest extends TestCase
{
    public function testExec()
    {
        $expected = [87, 97, 33, 47, 70, 37, 8, 53, 13, 93, 71, 72, 51, 100, 60];
        $sut = new ArrayLeftRotation;
        $actual = $sut->solution([33, 47, 70, 37, 8, 53, 13, 93, 71, 72, 51, 100, 60, 87, 97], 13);

        $this->assertEquals(
            $expected,
            $actual,
            'The array was not rotated properly'
        );
    }
}
