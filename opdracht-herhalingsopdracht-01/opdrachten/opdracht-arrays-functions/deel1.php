<?php

$animals = array("monkey", "bear", "spider", "cow", "dog");
$toFindAnimal = "cow";

echo count($animals);

echo "<br />";

echo in_array($toFindAnimal, $animals) ? "found" : "not found";