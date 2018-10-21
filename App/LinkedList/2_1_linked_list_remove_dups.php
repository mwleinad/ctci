<?php
require "../../vendor/autoload.php";
//Wtite code to remove duplicates from an unsorted linked list
//How would you solve the problem if a temporary buffer wasn't allowed?

use App\LinkedList\LinkedList;

$n = $argv[1];
$linkedList = new LinkedList($n);

$linkedList->printIt();