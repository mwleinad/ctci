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

//Note: do not assume we have to create all the permutations, creating permutations is !n time (even for a 5 letter word is
//5*4*3*2*1 = 120 permutations)
//What we have to do here is just count the number of letters. If we do permutations on a string with 3 letters
//we only have to count that each letter appears an even number, so abab, a appears twice and b appear twice too,
//this means a permutation will sooner or later produce a palindrome. (ei abba)
//for odd number of character strings (ie 5 letters) all the letters must appear an even number of times except one "orphan"
//letter for instance ababt, will eventually produce abtba