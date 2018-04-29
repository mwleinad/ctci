<?php
//Implement an algorithm to determine if a string has all unique characters.
//What if you cannot use additional data structtures
$string = $argv[1];

$stringArray = str_split($string, 1);

//With associative array
$letters = [];
$stringHasAllUniqueCharacters = true;
foreach($stringArray as $key => $letter) {
    if(isset($letters[$letter])) {
        $stringHasAllUniqueCharacters = false;
        break;
    }

    $letters[$letter] = true;
}

echo $stringHasAllUniqueCharacters;

//Without associative array
$letters = [];
$stringHasAllUniqueCharacters = true;
foreach($stringArray as $key => $letter) {
    foreach($letters as $letterInArray) {
        if($letterInArray == $letter) {
            $stringHasAllUniqueCharacters = false;
            break 2;
        }
    }

    $letters[] = $letter;
}

echo $stringHasAllUniqueCharacters;

//Without associative array, converting the letter to an int
$letters = [];
$stringHasAllUniqueCharacters = true;
foreach($stringArray as $key => $letter) {
    $intLetter = ord($letter);
    if(isset($letters[$intLetter])) {
        $stringHasAllUniqueCharacters = false;
        break;
    }

    $letters[$intLetter] = true;
}

echo $stringHasAllUniqueCharacters;