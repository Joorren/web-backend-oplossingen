<?php

//Lees de tekst (text-file.txt) in en stop de tekst in een variabele $text Misschien helpt de functie file_get_contents
//Splits de tekst op per karakter en sla deze op in een array $textChars ( dus een array die bestaat uit waarden van
//maximum 1 karakter)
//Zorg ervoor dat deze array gesorteerd wordt van Z naar A
//Draai nu de volgorde van de array volledig om
//Zorg er nu voor dat je via een for-lus alle karakters van de tekst overloopt en bijhoudt hoeveel keer elk karakter voorkomt.
//Toon een lijst met:
//  Hoeveel verschillende karakters er in totaal voorkomen
//  Hoeveel elk karakter voorkomt.

$text = file_get_contents("text-file.txt");
$textChars = str_split($text);
rsort($textChars);
array_reverse($textChars);

$letters = [];
$length = count($textChars);
for ($i=0; $i<$length; $i++) {
    $letter = $textChars[$i];
    if(isset($letters[$letter])) {
        $letters[$letter]++;
    }
    else {
        $letters[$letter] = 1;
    }
}

echo "Different Characters: " . count($letters) . "<br /><br />Letters and amounts<hr />";
foreach ($letters as $key => $currLetter) {
    echo $key . ": " . $currLetter . "<br />";
}

