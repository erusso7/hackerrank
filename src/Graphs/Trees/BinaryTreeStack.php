<?php declare(strict_types = 1);

namespace App\Graphs\Trees;

use SplStack;

class BinaryTreeStack
{
    private $stack;
    private $results;

    public function __construct()
    {
        $this->stack = new SplStack;
        $this->results = [];
    }

    /** @param TreeNode $node */
    public function binaryTreePaths($node = null)
    {
        if ($node === null) {
            return $this->results;
        }

        $this->stack->push($node->val);

        if ($node->left === null && $node->right === null) {
            $this->stackToString();
            $this->stack->pop();

            return $this->results;
        }

        if ($node->left !== null) {
            $this->binaryTreePaths($node->left);
        }

        if ($node->right !== null) {
            $this->binaryTreePaths($node->right);
        }

        if (!$this->stack->isEmpty()) {
            $this->stack->pop();
        }

        return $this->results;
    }

    private function stackToString(): void
    {
        if ($this->stack->isEmpty()) {
            return;
        }
        $result = [];
        foreach ($this->stack as $value) {
            $result[] = $value;
        }
        $this->stack->rewind();

        $result = array_reverse($result);

        $this->results[] = implode('->', $result);
    }
}