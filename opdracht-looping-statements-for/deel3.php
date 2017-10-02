<?php

$array = [];

for ($i = 0; $i<=10; ++$i) {
    for ($j = 0; $j<=10; ++$j) {
        $array[$i][$j] = $i*$j;
    }
}

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

    foreach ($array as $i) {

        echo "<tr>";

        foreach ($i as $j) {
            echo "<td";
            echo ($j%2 !== 0) ? " class='green'" : "";
            echo ">" . $j;
            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";

?>

</body>
