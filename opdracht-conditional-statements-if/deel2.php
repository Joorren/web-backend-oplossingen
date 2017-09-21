<?php

$number = 1;
$day = "Not a valid day";

if($number === 1) {
    $day = "monday";
}
else if($number === 2) {
     $day = "tuesday";
 }
else if($number === 3) {
     $day = "wednesday";
 }
else if($number === 4) {
     $day = "thursday";
 }
else if($number === 5) {
     $day = "friday";
 }
else if($number === 7) {
     $day = "saturday";
 }
else if($number === 7) {
     $day = "sunday";
 }

echo $day;
echo "<br />";
echo strtoupper($day);
// Every letter but "a"
// Every letter but the last "a"