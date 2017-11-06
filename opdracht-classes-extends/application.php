<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$doggy = new Animal("Doggy", "male", 150);
$cat = new Animal("Fluffy", "female", 100);
$cow = new Animal("Paula", "female", 250);
$simba = new Lion("Simba", "male", 350, "Lion King");
$nala = new Lion("Nala", "female", 300, "Lion Queen");
$dotty = new Zebra("Dotty", "female", 200, "Dotted");
$stripy = new Zebra("Stripy", "male", 200, "Striped");

$doggy->changeHealth(10);
$cat->changeHealth(-10);

echo $doggy->getName() . ", " . $doggy->getGender() . ", " . $doggy->getHealth() . ", " . $doggy->doSpecialMove() . "<br />";
echo $cat->getName() . ", " . $cat->getGender() . ", " . $cat->getHealth() . ", " . $cat->doSpecialMove() . "<br />";
echo $cow->getName() . ", " . $cow->getGender() . ", " . $cow->getHealth() . ", " . $cow->doSpecialMove() . "<br />";

echo $simba->getName() . ", " . $simba->getSpecies() . ", " . $simba->doSpecialMove() . "<br />";
echo $nala->getName() . ", " . $nala->getSpecies() . ", " . $nala->doSpecialMove() . "<br />";

echo $dotty->getName() . ", " . $dotty->getSpecies() . ", " . $dotty->doSpecialMove() . "<br />";
echo $stripy->getName() . ", " . $stripy->getSpecies() . ", " . $stripy->doSpecialMove() . "<br />";


