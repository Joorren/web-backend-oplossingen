<?php

$number = 1;
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
if($number === 7) {
     $day = "saturday";
 }
if($number === 7) {
     $day = "sunday";
 }

echo $day;
echo "<br />";
echo strtoupper($day);
// Every letter but "a"
// Every letter but the last "a"