<?php

$number = 1;
$day = "";

switch ($number) {
    case 1:
        $day = "monday";
        break;
    case 2:
        $day = "tuesday";
        break;
    case 3:
        $day = "wednesday";
        break;
    case 4:
        $day = "thursday";
        break;
    case 5:
        $day = "friday";
        break;
    case 6:
        $day = "saturday";
        break;
    case 7:
        $day = "sunday";
        break;
    default:
        $day = "Invalid day";
        break;
}

echo $day;