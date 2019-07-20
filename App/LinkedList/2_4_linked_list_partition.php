<?php
require 'vendor/autoload.php';
use App\LinkedList\LinkedList;
use App\LinkedList\LinkedListNode;
//Write code to partition a linked list around a value X, such that all nodes less than x come before than all nodes
//greater than or equal to x. If x is contained within the list, the values of x only need to be after the elements less than x
//The partition element x can appear anywhere in the right partition, it does not need to appear between the left and right
//partitions.
//Input 3 -> 5 -> 8 -> 5 -> 10 -> 2 -> 1 (partition = 5)
//output 3 -> 1 -> 2-> 10 -> 5 -> 5 -> 8 //I found this output very weird and it still no makes sense to me

$partition = $argv[1];
$linkedList = new LinkedList();
$linkedList->initialize([3, 5, 8, 5, 10, 2, 1]);
echo "Input: ";
$linkedList->printIt();
echo PHP_EOL;

//As we are talking about linked lists, the easiest solution is to create 2 linked lists one for each partition
//then merge both together.
//Note: we do not care about keeping the linked list "stable" which means the order of the newly created partition doesn't matter
//Two other problems could be. 1. Keep the linked list stable, 2 Order the newly partitions by value (harder)

class LinkedListPartition {
    public function partitionate(LinkedList $linkedList, $partition) {
        $current = $linkedList->head;
        $leftPartition = new LinkedList();
        $leftPartitionTail = null;
        $rightPartition = new LinkedList();

        //in our linkedlist implementation prepending is faster because we do not keep a pointer to tail
        //Append has to loop through the element
        while($current !== null) {
            //Send to left partition
            if($current->value < $partition) {
                $leftPartition->prepend($current->value);
                if(!$leftPartitionTail) {
                    $leftPartitionTail = $leftPartition->head;
                }
            } else {
                //Send to right partition
                $rightPartition->prepend($current->value); //prepending because is faster
            }

            $current = $current->next;
        }

        //merge both together, in a perfect world we would have a pointer to tail. //We did that in the while though/
        $leftPartitionTail->next = $rightPartition->head;

        return $leftPartition;

    }
}

$linkedListPartition = new LinkedListPartition();
$partitions = $linkedListPartition->partitionate($linkedList, $partition);
echo "Output: ";
$partitions->printIt();