<?php declare(strict_types = 1);

namespace Tests\Graphs\Trees;

use App\Graphs\Trees\DiameterBinaryTree;
use App\Graphs\Trees\TreeNode;
use PHPUnit\Framework\TestCase;

class DiameterBinaryTreeTest extends TestCase
{

    /** @dataProvider diameterBinaryTreeTestCases */
    public function testDiameterOfBinaryTree($root, $expected)
    {
        $sut = new DiameterBinaryTree;
        $this->assertEquals($expected, $sut->diameterOfBinaryTree($root));
    }

    public function diameterBinaryTreeTestCases()
    {
        return [
            [
                new TreeNode(
                    1,
                    new TreeNode(
                        2,
                        new TreeNode(4),
                        new TreeNode(5)
                    ),
                    new TreeNode(3)
                ),
                3,
            ],
            [
                new TreeNode(1),
                0,
            ],
            [
                new TreeNode(1, null, new TreeNode(2)),
                1,
            ],
            [
                new TreeNode(2, new TreeNode(1), new TreeNode(3)),
                2,
            ],
            [
                new TreeNode(
                    4,
                    new TreeNode(-7),
                    new TreeNode(
                        -3,
                        new TreeNode(
                            -9,
                            new TreeNode(
                                9,
                                new TreeNode(
                                    6,
                                    new TreeNode(0, null, new TreeNode(-1)),
                                    new TreeNode(6, new TreeNode(4))
                                )
                            ),
                            new TreeNode(-7,
                                new TreeNode(-6, new TreeNode(5)),
                                new TreeNode(-6, new TreeNode(9, new TreeNode(-2)))
                            )
                        ),
                        new TreeNode(-3, new TreeNode(-4)),
                    )
                ),
                8
            ],
        ];
    }
}
