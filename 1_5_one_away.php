<?php
//THere are three types of edits that can be performed on strings. Insert a character. Remove a character or replace
//a character. Given two strings, write a function to check if they are one edit or zero edits away
//EXAMPLE
//pale, ple -> true
//pales, pale -> true
//pale, bale -> true
//pale, bake -> false
//pale, ble -> false

$stringA = $argv[1];
$stringB = $argv[2];

class Edits {
    private $stringA;
    private $stringB;

    public function __construct($stringA, $stringB) {
        //if stringA is longer than stringB a deletion happened. If stringB is longer than stringA an insertion happened.
        //Deletion and insertion are basically the same
        if(strlen($stringA) >= strlen($stringB)) {
            $this->stringA = $stringA;
            $this->stringB = $stringB;
        } else {
            $this->stringA = $stringB;
            $this->stringB = $stringA;
        }
    }

    public function checkEdits() {

        if(strlen($this->stringA) === strlen($this->stringB)) {
            return $this->oneStepEdit();
        } elseif(strlen($this->stringA) - strlen($this->stringB) < 2){
            return $this->oneStepInsert();
        }

        return 'more than one edit';
    }

    private function oneStepEdit(){
        $edits = 0;
        for($ii = 0; $ii < strlen($this->stringB); $ii++) {
            //Same letter
            if($this->stringA[$ii] === $this->stringB[$ii]) {
                continue;
            }

            $edits++;
            if($edits > 1){
                return 'more than one edit';
            }
        }
        return 'zero or one edit away';
    }

    private function oneStepInsert(){
        $indexA = 0;

        for($ii = 0; $ii < strlen($this->stringB); $ii++) {
            //Same letter
            if($this->stringA[$indexA] === $this->stringB[$ii]) {
                $indexA++;
                continue;
            }

            //Different letter, check next index on stringA, if the letter is, again, different, this means we have edited more than 1 time
            $indexA++;
            if($this->stringA[$indexA] !== $this->stringB[$ii]) {
                return 'more than one edit';
            }
        }
        return 'zero or one edit away';
    }
}

$edits = new Edits($stringA, $stringB);

echo $edits->checkEdits();