<?php
$pigHealth = 5;
$maximumTrows = 8;
function calculateHit() {
    global $pigHealth;
    $hitChance = 40;
    $hit =  (rand(0,100) <= $hitChance) ? true : false;
    if ($hit) {
        $pigHealth--;
        if ($pigHealth === 1) {
            $text = "Hit, there is only " . $pigHealth . " pig left.";
        }
        else {
            $text = "Hit, there are only " . $pigHealth . " pigs left.";
        }
    }
    else {
        if ($pigHealth === 1) {
            $text = "Missed. There is " . $pigHealth . " pig left.";
        }
        else {
            $text = "Missed. There are " . $pigHealth . " pigs left.";
        }
    }
    return $text;
}
function launchAngryBird() {
    global $pigHealth, $maximumTrows;
    static $amount;
    while ($amount < $maximumTrows) {
        echo calculateHit() . "<br />";
        $amount++;
    }
    if ($pigHealth < 1) {
        $text = "You won!";
    }
    else {
        $text = "You lost!";
    }
    return $text;
}
echo launchAngryBird();