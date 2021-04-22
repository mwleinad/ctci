<?php
require "vendor/autoload.php";
use App\Tree\Tree;
use App\Tree\TreeNode;

//Sample tree
//              3
//          /           \
//          2           5
//      /           /       \
//      1           4       6
//                              \
//                              7

//InOrder/PreOrder and PostOrder are considered depth-first

//InOrder is left first, then current, then right
//This should print the sample tree in this order: 1, 2, 3, 4, 5, 6 7
class InOrderTraversal {
    public function traverse(TreeNode $node) : void {
        if($node->left !== null) {
            $this->traverse($node->left);
        }
        echo $node->value; echo " ";
        if($node->right !== null) {
            $this->traverse($node->right);
        }
    }
}

//PreOder is current node first, then traverse left and right
//This should print the sample tree in this order: 3, 2, 1, 5, 4, 6, 7
class PreOrderTraversal {
    public function traverse(TreeNode $node) : void {
        echo $node->value; echo " ";
        if($node->left !== null) {
            $this->traverse($node->left);
        }

        if($node->right !== null) {
            $this->traverse($node->right);
        }
    }
}

//PostOrder is left and right first then current
//This should print the sample tree in this order: 1, 2, 4, 7, 6, 5, 3
class PostOrderTraversal {
    public function traverse(TreeNode $node) : void {
        if($node->left !== null) {
            $this->traverse($node->left);
        }

        if($node->right !== null) {
            $this->traverse($node->right);
        }

        echo $node->value; echo " ";
    }
}

$tree = new Tree();
$tree->initializeSampleTree($tree);

$inOrderTraversal = new InOrderTraversal();
//Send the initial node (root)
//$inOrderTraversal->traverse($tree->root);

echo "\n";
$preOrderTraversal = new PreOrderTraversal();
//$preOrderTraversal->traverse($tree->root);

echo "\n";
$postOrderTraversal = new PostOrderTraversal();
//$postOrderTraversal->traverse($tree->root);

echo "\n";
$levelOrderTraversal = new LevelOrderTraversal;
$levelOrderTraversal->traverse($tree->root);


