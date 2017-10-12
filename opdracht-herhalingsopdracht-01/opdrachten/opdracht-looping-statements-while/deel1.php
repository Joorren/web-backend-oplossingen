<?php

$i = 0;

while ($i <= 100) {

    echo $i . " ";

    ++$i;
}

echo "<br />";

$i = 40;

while ($i < 80) {

    if ($i%3 === 0) {
        echo $i . " ";
    }

    ++$i;
}