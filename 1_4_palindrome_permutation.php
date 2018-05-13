<?php
//Given a string write a function to check if it is a permutation of a palindrome. A palindrome is a word or phrase that
//is the same forwards and backwards. A permutation is a rearrangements of letters. The palindrome does not need to be
//limited to just dictionary words
//Example
//Input:    Tact Coa
//Output: true (permutations: "taco cat", "atco cta", etc.)
$string = strtolower($argv[1]);
$length = strlen($string);

$arrayOfLetters = [];

$numberOfLetters = 0;
for($ii = 0; $ii < $length; $ii++) {
    if($string[$ii] == ' ') {
        continue;
    }

    $numberOfLetters++;
    if(!isset($arrayOfLetters[$string[$ii]])) {
        $arrayOfLetters[$string[$ii]] = 1;
    } else  {
        $arrayOfLetters[$string[$ii]]++;
    }
}

$isPalindrome = true;

$maxNumberOfOddLetters = $numberOfLetters % 2 == 0 ? 0 : 1;
$oddLetters = 0;
foreach($arrayOfLetters as $key => $letter) {
    if($letter % 2 > 0) {
        $oddLetters++;
    }

    if($oddLetters > $maxNumberOfOddLetters) {
        $isPalindrome = false;
        break;
    }
}

echo $isPalindrome;
