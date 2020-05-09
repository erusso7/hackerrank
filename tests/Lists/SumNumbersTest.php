<?php declare(strict_types = 1);

namespace Tests\Lists;

use App\Lists\ListNode;
use App\Lists\SumNumbers;
use PHPUnit\Framework\TestCase;

class SumNumbersTest extends TestCase
{
    /** @dataProvider sumTwoListsTestCases */
    public function testItShouldSumTwoLists(
        ?ListNode $list1,
        ?ListNode $list2,
        ?ListNode $expected
    ) {
        $sut = new SumNumbers;
        $this->assertEquals($expected, $sut->addTwoNumbers($list1, $list2));
    }

    public function sumTwoListsTestCases()
    {
        return [
            [
                new ListNode(1),
                new ListNode(9, new ListNode(9)),
                new ListNode(0, new ListNode(0, new ListNode(1))),
            ],
            [
                new ListNode(2, new ListNode(4, new ListNode(3))),
                new ListNode(5, new ListNode(6, new ListNode(4))),
                new ListNode(7, new ListNode(0, new ListNode(8))),
            ],
            [
                new ListNode(2),
                null,
                new ListNode(2),
            ],
            [
                null,
                null,
                null,
            ],
            [
                new ListNode(2, new ListNode(5)),
                new ListNode(3),
                new ListNode(5, new ListNode(5)),
            ],
            [
                new ListNode(3),
                new ListNode(9, new ListNode(3)),
                new ListNode(2, new ListNode(4)),
            ],
            [
                new ListNode(5),
                new ListNode(5),
                new ListNode(0, new ListNode(1)),
            ],
        ];
    }
}
