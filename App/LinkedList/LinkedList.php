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
     * @var null
     */
    private $current = null;

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

        //First element in the list
        if(!isset($this->head)) {
            $this->head = $node;
        } else {
            $node->next = $this->head;
            $this->head = $node;
        }
    }

    /**
     *
     */
    public function printIt() {
        $this->current = $this->head;
        while($this->current !== null) {
            echo $this->current->value;
            if($this->current->next) {
                echo " -> ";
            }

            $this->current = $this->current->next;
        }
    }
}

