<?php
require "vendor/autoload.php";
use App\LinkedList\LinkedList;
use App\LinkedList\LinkedListNode;

//Implement an algorithm to delete a node in the middle (ie any node but the first and the last node, not neccesarily
//the exact middle, of a singly linked list, given ONLY ACCESS TO THAT NODE
//Example
//Input the node c from the linked list a->b->c->d->e->f
//Output: Nothing is returned but the new linked list looks like a->b->d->e->f
$linkedList = new LinkedList(0);
$linkedList->append('a');
$linkedList->append('b');
$linkedList->append('c');
$linkedList->append('d');
$linkedList->append('e');
$linkedList->append('f');

//We are assuming the node we want to delete exists in the list
class LinkedListDeleteMiddleNode {
    //No access to $linkedList->head, so we use a helper to find the given node.
    public function findGivenNode($linkedList, $node) {
        $current = $linkedList->head;
        $previous = null;
        while($current !== null) {
            if($current->value === $node) {
                return $current;
            }
            $current = $current->next;
        }

        return null;
    }

    //This deletes the first node too,
    //The solution in the book does the same. So I'm not sure if the intructions are wrong or what
    public function deleteGivenNode(LinkedListNode $node) {
        if($node === null || $node->next === null) {
            return false;
        }

        $node->value = $node->next->value;
        $node->next = $node->next->next;

        return true;
    }
}

$linkedListDeleteMiddleNode = new LinkedListDeleteMiddleNode();
$givenNode = $linkedListDeleteMiddleNode->findGivenNode($linkedList, "a"); //This is just a helper
$linkedListDeleteMiddleNode->deleteGivenNode($givenNode);
$linkedList->printIt();
