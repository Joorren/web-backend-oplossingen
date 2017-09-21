<?php
//Maak een PHP-script dat kan bepalen of de variabele 'jaartal' al dan niet een schrikkeljaar is
//Een jaar is een schrikkeljaar als het deelbaar is door 4.
//Een jaar is géén schrikkeljaar als het deelbaar is door 100, TENZIJ het wel deelbaar is door 400.

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
