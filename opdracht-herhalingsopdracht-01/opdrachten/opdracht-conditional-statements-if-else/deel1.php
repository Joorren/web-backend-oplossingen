<?php

$year = 1996;
$leapYear;

if($year%100 === 0 && $year%400 !== 0) {
    $leapYear = false;
}
else if($year%4 === 0) {
    $leapYear = true;
}
else {
    $leapYear = false;
}

echo ($leapYear) ? "true" : "false";
