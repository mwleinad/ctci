<?php
require "vendor/autoload.php";
use App\LinkedList\LinkedList;

//implement an algorithm to find the kth to last element of a single linked list
//IE    1, 2, 3, 4 ,5   k=2 r=4
//IE    1, 2, 3, 4 ,5   k=4 r=2
//IE    1, 2, 3, 4 ,5, 6, 7, 8, 9   k=4 r=6
//IE    1, 2, 3, 4 ,5, 6, 7, 8, 9   k=8 r=2

$n = $argv[1];
$k = $argv[2];

//We assume n is not empty and k <= n

$linkedList = new LinkedList($n);
$linkedList->printIt();

//Do we know the length of the linked list? (in this case we do, length = n
//If we know it the problem is trivial as we just traverse the linked list until n - (k + 1);

//We are going to assume the length is random, and we do not know it.
//O(n) time O(1) space
class LinkedListFindK {

    //we can do this with a pointer *runner that will traverse the linked list
    //And another pointer *offset that will start when *runner is > k
    //When *runner is at the end of the linked list, whatever the value is in *offset is the one we want
    public function findK(LinkedList $linkedList, $k) {
        $runner = $linkedList->head;
        $offset = $linkedList->head;
        $displacedPlaces = 0;
        while($runner) {
            $runner = $runner->next;
            $displacedPlaces++;

            if($displacedPlaces > $k) {
                $offset = $offset->next;
            }
        }

        return $offset;
    }
}

$linkedListFindK = new LinkedListFindK();
echo PHP_EOL;
echo "kth to last: ";
echo $linkedListFindK->findK($linkedList, $k)->value;




