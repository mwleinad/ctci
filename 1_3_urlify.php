<?php
//Write a method to replace all spaces in a string with '%20'. You may assume that the string has sufficient space
//at the end to hold the additional characters, and that you are given the 'true' length of the string (note: if
//implementing in java, please use a character array so that you can perform this operation in place
//Example
//Input   "Mr John Smith    ", 13
//Output: "Mr%20John%20Smith"

$string = $argv[1];
$length = $argv[2];

$newLetterArray = [];
$newLetterArrayIndex = 0;

for($ii = 0; $ii < $length; $ii++){
    $newLetterArray[$newLetterArrayIndex] = $string[$ii];
    if($string[$ii] === ' ') {
        $newLetterArray[$newLetterArrayIndex] = '%';
        $newLetterArrayIndex++;
        $newLetterArray[$newLetterArrayIndex] = '2';
        $newLetterArrayIndex++;
        $newLetterArray[$newLetterArrayIndex] = '0';
    }
    $newLetterArrayIndex++;
}

echo implode("", $newLetterArray);
