<?php

$numbers = array(8, 7, 8, 7, 3, 2, 1, 2, 4);

$numbers = array_unique($numbers);

Rsort($numbers);

var_dump($numbers);