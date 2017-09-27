<?php

$rows = 10;
$columns = 10;

?>

<!DOCTYPE html>
<head>
    <title>Hello World</title>
    <style>
        table, td {
            border: 1px solid black;
        }
        td {
            height: 50px;
            width: 75px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
    echo "<table>";
    for ($i = 0; $i < $rows; ++$i) {
        echo "<tr>";
        for ($j = 0; $j < $columns; ++$j) {
            echo "<td>Column</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

?>

</body>
