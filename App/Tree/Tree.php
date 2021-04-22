<?php

namespace App\Tree;

/**
 * Class Tree
 * @package App\Tree
 * This is a binary search tree. Which means that nodes are inserted in order. Read the insertNode comment
 */
class Tree {
    /**
     * @var TreeNode|null
     */
    public ?TreeNode $root = null;

    /**
     * @param int $value
     */
    public function insert(int $value) : void {
        $node = new TreeNode($value);

        //If our tree is empty, we just initialize the tree using that value
        //Otherwise we have to insert the value somewhere starting at the root
        $this->isEmpty()
            ? $this->root = $node
            : $this->insertNode($node, $this->root);
    }

    public function initializeSampleTree(Tree $tree) {
        $tree->insert(3);
        $tree->insert(2);
        $tree->insert(5);
        $tree->insert(1);
        $tree->insert(4);
        $tree->insert(6);
        $tree->insert(7);
    }

    /**
     * @param TreeNode $node
     * @param $subtree
     * Recursively look for a place to insert the node.
     * If the value to be inserted is less than the current node value we go to the left, otherwise we take the right
     */
    private function insertNode(TreeNode $node, ?TreeNode &$subtree) : void {
        if($subtree === null) {
            //Finally if the node is still empty
            $subtree = $node;
        } else {
            $node->value < $subtree->value
                ? $this->insertNode($node, $subtree->left) //Keep trying to insert left until the leaf is null
                : $this->insertNode($node, $subtree->right); //Keep trying to insert right until the leaf is null
        }
    }

    /**
     * @return bool
     */
    private function isEmpty() : bool {
        return $this->root === null;
    }
}
