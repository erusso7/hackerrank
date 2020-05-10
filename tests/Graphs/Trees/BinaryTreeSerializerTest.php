<?php declare(strict_types = 1);

namespace Tests\Graphs\Trees;

use App\Graphs\Trees\BinaryTreeSerializer;
use App\Graphs\Trees\TreeNode;
use PHPUnit\Framework\TestCase;

class BinaryTreeSerializerTest extends TestCase
{

    /** @dataProvider serializeTestCases */
    public function testSerialize(?TreeNode $root, string $serialized)
    {
        $sut = new BinaryTreeSerializer;
        $this->assertEquals($serialized, $sut->serialize($root));
        $this->assertEquals($root, $sut->deserialize($serialized));
    }

    public function serializeTestCases()
    {
        return [
            [
                null,
                'N',
            ],
            [
                new TreeNode(1),
                '1,N,N',
            ],
            [
                new TreeNode(2, new TreeNode(1)),
                '2,1,N,N,N',
            ],
            [
                new TreeNode(3,
                    new TreeNode(
                        2,
                        new TreeNode(1)
                    ),
                    new TreeNode(
                        5,
                        new TreeNode(4),
                        new TreeNode(6)
                    ),
                ),
                '3,2,1,N,N,N,5,4,N,N,6,N,N',
            ],
        ];
    }
}
