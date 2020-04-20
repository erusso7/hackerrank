<?php declare(strict_types = 1);

namespace App\Graphs\Trees;

class TreeNode
{
    public $val = null;
    /* @var self $left */
    public $left = null;
    /* @var self $right */
    public $right = null;

    public function __construct(
        $value,
        ?self $left = null,
        ?self $right = null
    ) {
        $this->val = $value;
        $this->left = $left;
        $this->right = $right;
    }
}
