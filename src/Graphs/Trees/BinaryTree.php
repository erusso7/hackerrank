<?php declare(strict_types = 1);

namespace App\Graphs\Trees;

class BinaryTree
{
    /** @param TreeNode $root */
    public function binaryTreePaths($root)
    {
        $paths = $this->pathsForNode($root);
        if (empty($paths)) {
            return [];
        }

        $paths = is_array($paths) ? $paths : [[$paths]];

        return array_map(function (array $paths) {
            return implode('->', $paths);
        }, $paths);
    }

    /** @param TreeNode */
    public function pathsForNode($node)
    {
        if ($node === null) {
            return;
        }

        $leftPath = $this->pathsForNode($node->left);
        $rightPath = $this->pathsForNode($node->right);

        if (empty($leftPath) && empty($rightPath)) {
            return $node->val;
        }

        $results = [];
        if (is_array($leftPath)) {
            foreach ($leftPath as $left) {
                $results[] = array_merge([$node->val], $left);
            }
        } else if ($leftPath) {
            $results[] = [$node->val, $leftPath];
        }

        if (is_array($rightPath)) {
            foreach ($rightPath as $right) {
                $results[] = array_merge([$node->val], $right);
            }
        } else if ($rightPath) {
            $results[] = [$node->val, $rightPath];
        }

        return $results;
    }
}