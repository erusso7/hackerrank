<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\AddStrings;
use PHPUnit\Framework\TestCase;

class AddStringsTest extends TestCase
{
    /** @dataProvider addStringsTestCases */
    public function testItShouldAddTwoStrings(
        string $num1,
        string $num2,
        string $expected
    ) {
        $sut = new AddStrings;
        $sum = $sut->addStrings($num1, $num2);

        $this->assertSame($expected, $sum);
    }

    public function addStringsTestCases()
    {
        return [
            ['1', '1', '2'],
            ['124123', '98131231', '98255354'],
            ['412344', '234', '412578'],
        ];
    }
}
