<?php
//assume you have a method isSubstring which check if one word is a substring of another. Given 2 strings, s1 and s2
//write code to check if s2 is a rotation of s1 using only one call to isSubstring
// (eg. "waterbottle" is a rotation of "erbottlewat")
$s1 = $argv[1];
$s2 = $argv[2];

echo $s1;
echo PHP_EOL;
echo $s2;

//This is actually very simple in PHP
//if we have the word waterbottle we only need to find the rotation point. For instance if the rotation point is wat
//$x = wat and $y = erbottle
//$s1 is equals to $x$y wat|erbottle
//$s2 is equals to $y$x erbottle|wat
//so basically $s2 ($y$x) has to be a substring of $x$y$x$y or wat|erbottle|wat|erbottle
//this is the same as saying $s2 has to be a substr of $s1$s1
//in PHP we can easilly use strpos to find if a string is a substring of another string
if (strpos($s1.$s1, $s2) !== false) {
    echo PHP_EOL;
    echo 'is a Rotation';
}