<?php

$groceryList = ["Carrots", "Bread", "Cheese", "Cornflakes", "Butter", "Chocolate"];

$i = 0;
$groceryLength = count($groceryList);

?>

<!DOCTYPE html>
<head>
    <title>Hello World</title>
</head>
<body>
<?php

echo "<ul>";

while ($i < $groceryLength) {
    echo "<li>" . $groceryList[$i] . "</li>";
    ++$i;
}

echo "</ul>"; ?>
</body>
