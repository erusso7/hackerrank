<?php declare(strict_types = 1);

namespace Tests\Strings;

use App\Strings\GoatLatin;
use PHPUnit\Framework\TestCase;

class GoatLatinTest extends TestCase
{
    /** @dataProvider goatLatinTestCases */
    public function testItShouldReturnTheGoatLatinSentence($sentence, $expected)
    {
        $sut = new GoatLatin;
        $goatLatinSentence = $sut->toGoatLatin($sentence);

        $this->assertSame($expected, $goatLatinSentence);
    }

    public function goatLatinTestCases()
    {
        return [
            [
                "I speak Goat Latin",
                "Imaa peaksmaaa oatGmaaaa atinLmaaaaa",
            ],
            [
                "The quick brown fox jumped over the lazy dog",
                "heTmaa uickqmaaa rownbmaaaa oxfmaaaaa umpedjmaaaaaa overmaaaaaaa hetmaaaaaaaa azylmaaaaaaaaa ogdmaaaaaaaaaa",
            ],
        ];
    }
}
