<?php
require "vendor/autoload.php";
use App\Tree\Tree;

$tree = new Tree();
$tree->insert(3);
$tree->insert(2);
$tree->insert(5);
$tree->insert(1);
$tree->insert(4);
$tree->insert(6);
$tree->insert(7);

print_r($tree->root);
