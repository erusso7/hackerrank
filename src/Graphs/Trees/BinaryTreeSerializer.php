<?php declare(strict_types = 1);

namespace App\Graphs\Trees;

class BinaryTreeSerializer
{
    public function serialize(?TreeNode $root): string
    {
        $result = '';
        $this->serializeNode($result, $root);
        $result = substr($result, 0, -1);

        return $result;
    }

    private function serializeNode(string &$result, ?TreeNode $node): void
    {
        if (is_null($node)) {
            $result .= 'N,';

            return;
        }

        $result .= (string)$node->val . ',';
        $this->serializeNode($result, $node->left);
        $this->serializeNode($result, $node->right);
    }

    public function deserialize(string $data): ?TreeNode
    {
        if (strlen($data) < 3) {
            return null;
        }

        $result = new TreeNode(null);
        $this->deserializeNode($result, $data);

        return $result;
    }

    private function deserializeNode(TreeNode &$result, string &$data)
    {
        $result->val = $result->val ?? $this->extractNextVal($data);
        $left = $this->extractNextVal($data);
        if ($left !== 'N') {
            $result->left = new TreeNode($left);
            $this->deserializeNode($result->left, $data);
        }
        $right = $this->extractNextVal($data);
        if ($right !== 'N') {
            $result->right = new TreeNode($right);
            $this->deserializeNode($result->right, $data);
        }
    }

    private function extractNextVal(string &$data): string
    {
        $len = strlen($data);
        $nextSeparator = strpos($data, ',') ?: $len;

        $val = substr($data, 0, $nextSeparator);
        $data = $nextSeparator === $len
            ? ''
            : substr($data, $nextSeparator + 1);

        return $val;
    }
}