<?php
require '../../vendor/autoload.php';
use App\LinkedList\LinkedList;

//You have two numbers represented by a linked list, where each node contains a single digit. The digits are stored
//in reverse order, such that the first digit is at the head of the list. while a function that adds the two numbers
// and returns the sum as a linked list
// Example
// input 7 > 1 > 6 + 5 > 9 > 2. That is 617 + 295
// output 2 > 1 > 9 that is 912
// Follow up
// Suppose the digits are stored in forward order. Repeat the above problem
// input 6 > 1 > 7 + 2 > 9 > 5. that is 617 + 295
// output 9 > 1> 2. That is 912
//

//in php we can create a string of numbers and treat it like a number
class SumList {
    public function sumReverse(LinkedList $left, LinkedList $right) {
        $currentLeft = $left->head;
        $leftNumber = "";

        while($currentLeft) {
            $leftNumber .= $currentLeft->value;
            $currentLeft = $currentLeft->next;
        }

        $currentRight = $right->head;
        $rightNumber = "";
        while($currentRight) {
            $rightNumber .= $currentRight->value;
            $currentRight = $currentRight->next;
        }

        //In PHP a string is also an array of chars
        $sum = (string) ((int) $leftNumber + (int) $rightNumber);
        $sumLinkedList = new LinkedList();
        for($ii = 0; $ii < strlen($sum); $ii++) {
            $sumLinkedList->append($sum[$ii]);
        }

        return $sumLinkedList;

    }

    public function sum(LinkedList $left, LinkedList $right) {
        $currentLeft = $left->head;
        $leftNumber = "";

        while($currentLeft) {
            $leftNumber = $currentLeft->value.$leftNumber;
            $currentLeft = $currentLeft->next;
        }

        $currentRight = $right->head;
        $rightNumber = "";
        while($currentRight) {
            $rightNumber = $currentRight->value.$rightNumber;
            $currentRight = $currentRight->next;
        }

        //In PHP a string is also an array of chars
        $sum = (string) ((int) $leftNumber + (int) $rightNumber);
        $sumLinkedList = new LinkedList();
        for($ii = 0; $ii < strlen($sum); $ii++) {
            $sumLinkedList->prepend($sum[$ii]);
        }

        return $sumLinkedList;

    }
}

$left = new LinkedList();
$left->initialize([7, 1, 6]);
$right = new LinkedList();
$right->initialize([5, 9, 2]);

$sumList = new SumList();
$sumLinkedList = $sumList->sum($left, $right);
$sumLinkedList->printIt();

$left = new LinkedList();
$left->initialize([6, 1, 7]);
$right = new LinkedList();
$right->initialize([2, 9, 5]);

echo PHP_EOL;
$sumList = new SumList();
$sumLinkedList = $sumList->sumReverse($left, $right);
$sumLinkedList->printIt();


