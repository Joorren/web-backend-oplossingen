<?php

$money = 100000;
$percentage = 8;
$time = 10;

function interestCalculator($money, $time, $percentage) {
    static $counter=1;

    if ($counter < $time) {

        $interest = floor($money*($percentage/100));
        $money += $interest;

        echo "The new amount is €" . $money . ", with an interest of €" . $interest . ".<br />";

        $counter++;
        interestCalculator($money, $time, $percentage);
    }
    else {
        echo "After " . $GLOBALS['time'] . " years with a percentage of " . $percentage .
            ", you will have " . $money . ".";
    }
}

interestCalculator($money, $time, $percentage);