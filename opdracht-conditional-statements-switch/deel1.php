<?php

//Maak een HTML-document met een PHP code-block
//Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)
//Maak gebruik van een switch en probeer alles te herschrijven i.p.v. te kopiëren.

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