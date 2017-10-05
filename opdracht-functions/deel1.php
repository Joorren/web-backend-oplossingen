<?php

function calculateSum($number1, $number2) {
    return $number1 + $number2;
}
function multiply($number1, $number2) {
    return $number1 * $number2;
}
function isEven($number1) {
    return ($number1%2 === 0) ? true : false;
}

echo calculateSum(3,5) . "<br />";
echo multiply(3,5) . "<br />";
echo (isEven(2)) ? "true" : "false";
echo "<br />";

/*-------------------------------------------------------*/

function lengthAndUpper($string1) {
    return array(strlen($string1), strtoupper($string1));
}

$stringLengthAndUpper = lengthAndUpper("Hello World");

echo $stringLengthAndUpper[0] . "<br />";
echo $stringLengthAndUpper[1];