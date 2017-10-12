<?php

function printArray($array) {
    foreach ($array as $key => $hero) {
        echo "Hero [" . $key . "] has value '" . $hero . "'<br />";
    }
}

$heroes = ["Elon Musk", "Bill Gates"];

printArray($heroes);

/*-------------------------------------------*/

function validateHtmlTag($html) {
    echo (strstr($html, "<html>") && strstr($html, "</html>")) ? "True" : "False";
}

validateHtmlTag("<html>test</html>");