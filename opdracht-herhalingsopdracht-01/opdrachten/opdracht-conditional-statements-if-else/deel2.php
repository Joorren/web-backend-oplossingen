<?php

//Maak een PHP-script dat achterhaalt hoeveel volledige jaren, maanden, weken, dagen, uren, minuten en seconden er in
//een gegeven aantal seconden zit (bv. 221108521). Hoeft niet met if-statement.

$seconds = 221108521;

$minutes = round($seconds/60);
$hours = round($minutes/60);
$days = round($hours/24);
$months = round($days/31);
$years = round($days/365);

echo $minutes . " minutes <br />" . $hours . " hours <br />" . $days . " days <br />" . $months . " months <br />" . $years . " years";