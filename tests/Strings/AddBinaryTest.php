<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\AddBinary;
use PHPUnit\Framework\TestCase;

class AddBinaryTest extends TestCase
{
    /** @dataProvider binaryAddTestCases */
    public function testItShouldReturnsTheBinarySumOfStrings(
        string $a,
        string $b,
        string $expected
    ) {
        $sut = new AddBinary;
        $sum = $sut->addBinary($a, $b);

        $this->assertSame($expected, $sum);
    }

    public function binaryAddTestCases()
    {
        return [
            ['0', '0', '0'],
            ['0', '1', '1'],
            ['1', '0', '1'],
            ['1', '1', '10'],
            ['10', '10', '100'],
            ['11', '11', '110'],
            [
                '10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101',
                '110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011',
                '110111101100010011000101110110100000011101000101011001000011011000001100011110011010010011000000000',
            ],
        ];
    }
}
