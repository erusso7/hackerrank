<?php declare(strict_types = 1);

namespace App\Graphs\Trees;

class BinaryTreeRightView
{
    private $nodes = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root)
    {
        if ($root === null) {
            return [];
        }
        $this->addNode(0, $root);

        return $this->nodes;
    }

    private function addNode(int $level, TreeNode $node)
    {
        if (!array_key_exists($level, $this->nodes)) {
            $this->nodes[$level] = $node->val;
        }
        $nextLevel = $level + 1;
        if ($node->right) {
            $this->addNode($nextLevel, $node->right);
        }

        if ($node->left) {
            $this->addNode($nextLevel, $node->left);
        }
    }
}