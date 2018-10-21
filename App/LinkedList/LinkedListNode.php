<?php

namespace App\LinkedList;
/**
 * Class LinkedListNode
 */
class LinkedListNode {
    /**
     * @var
     */
    public $value;
    /**
     * @var null
     */
    public $next = null;

    /**
     * Node constructor.
     * @param $value
     */
    public function __construct($value) {
        $this->value = $value;
    }
}