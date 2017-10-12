<?php

$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
$char1 = "2";
$char2 = "8";
$char3 = "a";

function countChars1($char) {
    global $md5HashKey;

    $charCount = substr_count ($md5HashKey, $char);

    $percentage = ($charCount / strlen($md5HashKey)) * 100;

    return $percentage;

}
function countChars2($char) {
    $hash =  $GLOBALS['md5HashKey'];

    $charCount = substr_count ($hash, $char);

    $percentage = ($charCount / strlen($hash)) * 100;

    return $percentage;

}
function countChars3($char, $hash) {
    $charCount = substr_count ($hash, $char);

    $percentage = ($charCount / strlen($hash)) * 100;

    return $percentage;
}

echo "Function 1: The needle '" . $char1 . "' occurs " . countChars1($char1) . "% in the hash key '" . $md5HashKey . "'<br />";
echo "Function 2: The needle '" . $char2 . "' occurs " . countChars2($char2) . "% in the hash key '" . $md5HashKey . "'<br />";
echo "Function 3: The needle '" . $char3 . "' occurs " . countChars3($char3, $md5HashKey) . "% in the hash key '" . $md5HashKey . "'<br />";