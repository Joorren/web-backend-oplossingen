<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$percent = new Percent(150,100);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <tr><td>Relative</td><td><?= $percent->relative;?></td></tr>
        <tr><td>Percent</td><td><?= $percent->hundred;?>%</td></tr>
        <tr><td>Nominal</td><td><?= $percent->nominal;?></td></tr>
    </table>
</body>
</html>

