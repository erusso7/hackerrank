<?php declare(strict_types = 1);

namespace Tests\Graphs\Trees;

use App\Graphs\Trees\BinaryTreeRightView;
use App\Graphs\Trees\TreeNode;
use PHPUnit\Framework\TestCase;

class BinaryTreeRightViewTest extends TestCase
{

    public function testRightSideView()
    {
        $root = new TreeNode(
            1,
            new TreeNode(2, null, new TreeNode(5)),
            new TreeNode(3, null, new TreeNode(4)),
        );

        $sut = new BinaryTreeRightView;

        $this->assertEquals([1, 3, 4], $sut->rightSideView($root));
    }

    public function testRightSideView2()
    {
        $root = new TreeNode(
            1,
            new TreeNode(2, null, new TreeNode(5)),
            new TreeNode(3),
        );

        $sut = new BinaryTreeRightView;

        $this->assertEquals([1, 3, 5], $sut->rightSideView($root));
    }
}
