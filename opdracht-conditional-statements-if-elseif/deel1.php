<?php
//Maak een getal met een waarde tussen 1-100
//Zorg ervoor dat het script kan zeggen tussen welke tientallen het getal ligt, bv 'Het getal ligt tussen 20 en 30'.
//Zorg er vervolgens voor dat de boodschap omgekeerd afgedrukt wordt, bv '03 ne 02 nessut tgil lateg teH'.

$number = 49;
$text = "The number is between ";

if ($number < 10) {
    $text .= 0 . " and " . 10;
}
else if($number < 20) {
    $text .= 10 . " and " . 20;
}
else if($number < 30) {
    $text .= 20 . " and " . 30;
}
else if($number < 40) {
    $text .= 30 . " and " . 40;
}
else if($number < 50) {
    $text .= 40 . " and " . 50;
}
else if($number < 60) {
    $text .= 50 . " and " . 60;
}
else if($number < 70) {
    $text .= 60 . " and " . 70;
}
else if($number < 80) {
    $text .= 70 . " and " . 80;
}
else if($number < 90) {
    $text .= 80 . " and " . 90;
}
else if($number < 100) {
    $text .= 90 . " and " . 100;
}

echo strrev($text);