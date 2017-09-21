<?php

$number = 6;
$day = "Not a valid day";

if($number === 1) {
    $day = "monday";
}
if($number === 2) {
     $day = "tuesday";
 }
if($number === 3) {
     $day = "wednesday";
 }
if($number === 4) {
     $day = "thursday";
 }
if($number === 5) {
     $day = "friday";
 }
if($number === 6) {
     $day = "saturday";
 }
if($number === 7) {
     $day = "sunday";
 }

echo $day;
echo "<br />";

$day = strtoupper($day);
echo $day;
echo "<br />";

$day2 = str_replace("A","a",$day);
echo $day2;
echo "<br />";

$lastAPos = strrpos( $day, 'A' );
$day3 = substr_replace( $day, 'a', $lastAPos, 1 );
echo $day3;