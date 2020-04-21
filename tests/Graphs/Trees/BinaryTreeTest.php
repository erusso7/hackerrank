<?php declare(strict_types = 1);

namespace Tests\Graphs\Trees;

use App\Graphs\Trees\BinaryTree;
use App\Graphs\Trees\BinaryTreeStack;
use App\Graphs\Trees\TreeNode;
use PHPUnit\Framework\TestCase;

class BinaryTreeTest extends TestCase
{
    /** @dataProvider serializerTestCases */
    public function testSolutionWithArrays(?TreeNode $root, $expectedPaths)
    {
        $sut = new BinaryTree;
        $paths = $sut->binaryTreePaths($root);

        $this->assertEquals($expectedPaths, $paths);
    }

    /** @dataProvider serializerTestCases */
    public function testSolutionWithAStack(?TreeNode $root, $expectedPaths)
    {
        $sut = new BinaryTreeStack;
        $paths = $sut->binaryTreePaths($root);

        $this->assertEquals($expectedPaths, $paths);
    }

    public function serializerTestCases()
    {
        return [
            'tree is empty' => [
                'root' => null,
                'expected' => [],
            ],
            'tree 1 element' => [
                'root' => new TreeNode(1),
                'expected' => ['1'],
            ],
            'tree 3 elements' => [
                'root' => new TreeNode(
                    1,
                    new TreeNode(2),
                    new TreeNode(3)
                ),
                'expected' => ['1->2', '1->3'],
            ],
            'tree 4 elements' => [
                'root' => new TreeNode(
                    1,
                    new TreeNode(2,
                        null,
                        new TreeNode(5)
                    ),
                    new TreeNode(3)
                ),
                'expected' => ['1->2->5', '1->3'],
            ],
            'tree 5 elements' => [
                'root' => new TreeNode(
                    1,
                    new TreeNode(2,
                        new TreeNode(5),
                        new TreeNode(6)
                    ),
                    new TreeNode(3)
                ),
                'expected' => ['1->2->5', '1->2->6', '1->3'],
            ],
        ];
    }
}
