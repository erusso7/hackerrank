<?php declare(strict_types = 1);

namespace App\Graphs\Trees;

class DiameterBinaryTree
{
    private $depth = 1;

    public function diameterOfBinaryTree(?TreeNode $root): int
    {
        $this->depth($root);

        return $this->depth - 1;
    }

    private function depth(?TreeNode $node)
    {
        if ($node === null) {
            return 0;
        }

        $left = $this->depth($node->left);
        $right = $this->depth($node->right);

        $this->depth = max($this->depth, $left + $right + 1);

        return max($left, $right) + 1;
    }
}