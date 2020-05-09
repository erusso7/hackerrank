<?php declare(strict_types = 1);

namespace Tests\Lists;

use App\Lists\ListNode;
use App\Lists\MergeTwoLists;
use PHPUnit\Framework\TestCase;

class MergeTwoListsTest extends TestCase
{

    /** @dataProvider mergeTwoListsTestCases */
    public function testMergeTwoLists(
        ?ListNode $l1,
        ?ListNode $l2,
        ?ListNode $expected
    ) {
        $sut = new MergeTwoLists;
        $this->assertEquals($expected, $sut->mergeTwoLists($l1, $l2));
    }

    public function mergeTwoListsTestCases()
    {
        return [
            [
                null,
                null,
                null,
            ],
            [
                new ListNode(1),
                new ListNode(2),
                new ListNode(1, new ListNode(2)),
            ],
            [
                new ListNode(1, new ListNode(1)),
                new ListNode(2),
                new ListNode(1, new ListNode(1, new ListNode(2))),
            ],
            [
                new ListNode(1, new ListNode(2, new ListNode(4))),
                new ListNode(1, new ListNode(3, new ListNode(4))),
                new ListNode(
                    1,
                    new ListNode(
                        1,
                        new ListNode(
                            2,
                            new ListNode(
                                3,
                                new ListNode(
                                    4,
                                    new ListNode(4)
                                )
                            )
                        )
                    )
                ),
            ],
        ];
    }
}
