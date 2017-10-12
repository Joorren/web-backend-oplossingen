<?php

//Ga verder op deel 1 (maar maak een aparte kopie voor, overschrijf het origineel niet!)
//Zorg ervoor dat de array volgens het alfabet gesorteerd wordt ( A -> Z )
//Maak een array $zoogdieren en plaats hier 3 dieren in, voeg vervolgens de 2 arrays met dieren samen in de array $dierenLijst

$animals = array("monkey", "bear", "spider", "cow", "dog");
$toFindAnimal = "cow";

echo count($animals);

echo "<br />";

echo in_array($toFindAnimal, $animals) ? "found" : "not found";

sort($animals);

$mamals = array("dog", "cat", "pig");

$animalsList = array_merge($animals, $mamals);

var_dump($animalsList);