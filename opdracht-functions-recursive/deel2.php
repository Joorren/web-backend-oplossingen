<?php

$money = 100000;
$percentage = 8;
$time = 10;

$counter = 1;

function interestCalculator($money, $time, $percentage, $counter) {


    if ($counter < $time) {

        $interest = floor($money*($percentage/100));
        $money += $interest;

        echo "The new amount is €" . $money . ", with an interest of €" . $interest . ".<br />";

        $counter++;
        interestCalculator($money, $time, $percentage, $counter);
    }
    else {
        echo "After " . $GLOBALS['time'] . " years with a percentage of " . $percentage .
            ", you will have " . $money . ".";
    }
}

interestCalculator($money, $time, $percentage, $counter);