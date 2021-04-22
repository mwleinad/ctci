<?php

namespace App\Tree;

/**
 * Class TreeNode
 * @package App\Tree
 * A tree node has a value, a pointer to the left and a pointer to the right
 * I found it easier to keep this class simple as just a reference to the node without handling any operation
 */
class TreeNode {
    /**
     * @var int
     */
    public int $value;
    /**
     * @var TreeNode|null
     */
    public ?TreeNode $left = null;
    /**
     * @var TreeNode|null
     */
    public ?TreeNode $right = null;

    /**
     * TreeNode constructor.
     * @param int $value
     */
    public function __construct(int $value) {
        $this->value = $value;
    }
}
