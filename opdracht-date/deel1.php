<?php

//Maak een geldig HTML document
//Zet deze datum 22u 35m 25sec 21 januari 1904 om naar een timestamp
//Toon deze timestamp daarna in het volgende formaat: 21 January 1904, 10:35:25 pm
//
//int mktime ([ int $hour = date("H") [, int $minute = date("i") [, int $second = date("s")
// [, int $month = date("n") [, int $day = date("j") [, int $year = date("Y") [, int $is_dst = -1 ]]]]]]] )
$date = mktime(22, 35, 25, 1, 21, 1904);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
    <?= date("H\:i\:s\, d F Y",$date); ?>
</body>
</html>
