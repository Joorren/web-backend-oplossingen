<?php

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

