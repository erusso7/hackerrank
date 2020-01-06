<?php

namespace Tests\DictionariesAndHashmaps;

use App\DictionariesAndHashmaps\RamsonNote;
use PHPUnit\Framework\TestCase;

class CheckMagazineTest extends TestCase
{
    public function dataProvider()
    {
        return [
            [
                'Yes',
                'give me one grand today night',
                'give one grand today',
            ],
            [
                'No',
                'ive got a lovely bunch of coconuts',
                'ive got some coconuts',
            ],
            [
                'No',
                'two times three is not four',
                'two times two is four',
            ],
        ];
    }

    /** @dataProvider dataProvider */
    public function testSolution($expected, $magazine, $note)
    {
        $magazine = explode(' ', $magazine);
        $note = explode(' ', $note);

        $sut = new RamsonNote;
        $actual = $sut->solution($magazine, $note);

        $this->assertEquals($expected, $actual);
    }
}
