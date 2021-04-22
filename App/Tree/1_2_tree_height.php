<?php
//Calculate height of a binary tree
require "vendor/autoload.php";
use App\Tree\Tree;


$tree = new Tree();
$tree->initializeSampleTree($tree);

class TreeHeight {

    public function calculate(Tree $tree) {
        return 1;
    }

}

//print_r($tree->root);
$treeHeight = new TreeHeight($tree);

echo $treeHeight->calculate();

