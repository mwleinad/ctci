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

//Level order traversal is "Breadth-first". We should process the current node, then process all siblings then move to
//the next level
//This should print the sample tree in this order: 3, 2, 5, 1, 4, 6, 7

/**
 * Class LevelOrderTraversal
 * Time Complexity: O(n^2) in worst case. Or
 * Space complexity: O(n) worst case
 */
class LevelOrderTraversal {
    /**
     * @param TreeNode $node
     * @param int $height
     */
    public function traverse(TreeNode $node, int $height) {
        //Print each level until height
        for($currentLevel = 1; $currentLevel <= $height; $currentLevel++) {
            $this->printLevel($node, $currentLevel);
            //For each level let's just print a line break
            echo "\n";
        }
    }


    /**
     * @param TreeNode|null $node
     * @return int
     * Still having some issues trying to understand how the recursion works here. Testing more tomorrow
     */
    public function height(?TreeNode $node) : int {
        if($node === null) {
            return 0;
        } else {
            //Compute height for each subtree
            $leftHeight = $this->height($node->left);
            $rightHeight = $this->height($node->right);

            //Use the larger one
            return $rightHeight > $leftHeight
                ? $rightHeight + 1
                : $leftHeight + 1;
        }
    }

    private function printLevel(?TreeNode $node, $currentLevel) {
        if($node === null) {
            return;
        }

        if($currentLevel === 1) {
            echo $node->value." ";
        } else {
            $this->printLevel($node->right, $currentLevel - 1);
            $this->printLevel($node->left, $currentLevel - 1);
        }
    }
}


$tree = new Tree();
$tree->initializeSampleTree($tree);

$levelOrderTraversal = new LevelOrderTraversal;
$height = $levelOrderTraversal->height($tree->root);
echo "Height: "; echo $levelOrderTraversal->height($tree->root);
echo "\n";
$levelOrderTraversal->traverse($tree->root, $height);


