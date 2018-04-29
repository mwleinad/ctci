<?php
//Given 2 strings, write a method to decide if one is a permutation of the other

$stringA = $argv[1];
$stringB = $argv[2];

//abba
//baba true

$helper = new Helper();
echo $isPermutation = $helper->isPermutation($stringA, $stringB);

class Helper {
    public function isPermutation($stringA, $stringB) {
        $lettersInStringA = str_split($stringA, 1);
        $lettersInStringB = str_split($stringB, 1);

        if(strlen($stringA) != strlen($stringB)){
            return false;
        }

        $letters = [];
        foreach($lettersInStringA as $letterInStringA) {
            !isset($letters[$letterInStringA]) ? $letters[$letterInStringA] = 1 : $letters[$letterInStringA]++;
        }

        //abba
        /* Array (
            [a] => 1
            [b] => 2
            [c] => 1
        )*/


        foreach($lettersInStringB as $letterInStringB) {
            //Letter doesn't exist in stringA, We no longer need to keep checking
            if(!isset($letters[$letterInStringB])) {
                return false;
            }

            $letters[$letterInStringB]--;

            //A letter in stringB appears more times than in stringA. IE stringA = abba stringB abbb
            if($letters[$letterInStringB] < 0){
                return false;
            }
        }

        return true;
    }
}