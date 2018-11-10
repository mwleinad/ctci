<?php
namespace App\LinkedList;

/**
 * Class LinkedList
 * Implement a basic unsorted (with randomly generated values) single linked list of N elements
 */
class LinkedList {
    /**
     * @var null
     */
    public $head = null;

    /**
     * LinkedList constructor.
     * @param $elements
     * Build a unsorted linked list with random values
     */
    public function __construct($elements) {
        for($ii = 0; $ii < $elements; $ii++) {
            $this->prepend(mt_rand(1, 9));
        }
    }

    /**
     * @param $value
     * This will insert new values in reverse order, IE, if you insert 1, 2, 3
     * When you traverse the Linked List you will get 3, 2, 1
     */
    public function prepend($value) {
        $node = new LinkedListNode($value);

        //If head is null we know we are trying to insert the first element in the list
        if(!isset($this->head)) {
            $this->head = $node; //next for head is "null"
        } else {
            //Remember when prepending values, all we have to do is "point" whatever is currently on the head to the
            //next attribute
            $node->next = $this->head;
            $this->head = $node;
        }
    }

    public function append($value) {
        $node = new LinkedListNode($value);

        //Note: We could keep a pointer to "last" element and append action would be faster, but we are keeping it simple
        //with the pointers.
        //If head is null we know we are trying to insert the first element in the list
        if(!isset($this->head)) {
            $this->head = $node; //next for head is "null"
        } else {
            $current = $this->head;
            while($current !== null) {
                if($current->next === null) {
                    $current->next = $node;
                    break;
                }
                $current = $current->next;
            }
        }
    }

    /**
     *
     */
    public function printIt() {
        $current = $this->head;
        while($current !== null) {
            echo $current->value;
            if($current->next) {
                echo " -> ";
            }

            $current = $current->next;
        }
    }

    public function removeDups() {
        $current = $this->head;
        $previous = null;

        $dupArray = [];
        while($current !== null) {

            //Add value to our hash table
            if(!isset($dupArray[$current->value])) {
                $dupArray[$current->value] = true;
            } else { //Value is duplicated
                $previous->next = $current->next;
                $current = $current->next;
                continue;
            }

            //Here we know is not a duplicated value
            $previous = $current;
            $current = $current->next;
        }
    }
}

