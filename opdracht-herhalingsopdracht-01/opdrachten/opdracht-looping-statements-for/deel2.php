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
            width: 50px;
            text-align: center;
        }
        td.green {
            background: green;
        }
    </style>
</head>
<body>

<?php
echo "<table>";
for ($i = 0; $i <= $rows; ++$i) {
    echo "<tr>";
    for ($j = 0; $j <= $columns; ++$j) {
        $ij = $i*$j;
        echo "<td";
        echo ($ij%2 !== 0) ? " class='green'" : "";
        echo ">" . $ij . "</td>" ;
    }
    echo "</tr>";
}
echo "</table>";

?>

</body>
