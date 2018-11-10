<?php
require "vendor/autoload.php";
//Write code to remove duplicates from an unsorted linked list: O(n)
//How would you solve the problem if a temporary buffer wasn't allowed?
    //To do it without a buffer we have to have 2 pointers, the current pointer, and the "runner" pointer
    //the current pointer would traverse the linked list normally, while the runner will check for duplicates
    //The runner will remove every future node with the same value.
    //This requires 2 while loops and the O time is O(n^2)

use App\LinkedList\LinkedList;

$n = $argv[1];
$linkedList = new LinkedList($n);
$linkedList->printIt();

//In PHP we can use the power of associative arrays to save new values in the linked list (and remove duplicated ones)
//To delete a node
//1. locate previous node of the node to be deleted
//2. Change the next of the previous node
class LinkedListAction {
    public function removeDups(LinkedList $linkedList) {
        $current = $linkedList->head;
        $previous = null;

        $dupArray = [];
        while($current !== null) {

            //Add value to our hash table
            if(!isset($dupArray[$current->value])) {
                $dupArray[$current->value] = true;
                $previous = $current;
            } else { //Value is already in hash table, hence is duplicated
                $previous->next = $current->next;
            }

            $current = $current->next;
        }

        return $linkedList;
    }
}

$linkedListAction = new LinkedListAction();
$linkedList = $linkedListAction->removeDups($linkedList);
echo PHP_EOL;
$linkedList->printIt();