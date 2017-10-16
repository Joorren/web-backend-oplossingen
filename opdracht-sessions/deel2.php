<?php
session_start();

$_SESSION["UserData"]["email"] = (isset($_POST["email"])) ? $_POST["email"] : ((isset($_SESSION["UserData"]["email"])) ? $_SESSION["UserData"]["email"] : '');
$_SESSION["UserData"]["nickname"] = (isset($_POST["nickname"])) ? $_POST["nickname"] : ((isset($_SESSION["UserData"]["nickname"])) ? $_SESSION["UserData"]["nickname"] : '');

$street = (isset($_SESSION["UserData"]["street"])) ? $_SESSION["UserData"]["street"] : '';
$number = (isset($_SESSION["UserData"]["number"])) ? $_SESSION["UserData"]["number"] : '';
$town = (isset($_SESSION["UserData"]["town"])) ? $_SESSION["UserData"]["town"] : '';
$postal = (isset($_SESSION["UserData"]["postal"])) ? $_SESSION["UserData"]["town"] : '';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
    <a href="deel1.php?session=destroy">Kill Session</a>
    <h1>User data:</h1>
    <p>E-mail: <?= $_SESSION["UserData"]["email"];?></p>
    <p>Nickname: <?= $_SESSION["UserData"]["nickname"];?></p>
    <h1>Address</h1>
<form method="post" action="deel3.php">
    <label for="street">Street</label>
    <input type="text" name="street" id="street" value="<?= $street; ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] === "street" ? "autofocus" : ""); ?> /><br />
    <label for="number">Number</label>
    <input type="number" name="number" id="number" value="<?= $number; ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] === "number" ? "autofocus" : ""); ?> /><br />
    <label for="town">Town</label>
    <input type="text" name="town" id="town" value="<?= $town; ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] === "town" ? "autofocus" : ""); ?> /><br />
    <label for="postal">Postal Code</label>
    <input type="text" name="postal" id="postal" value="<?= $postal; ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] === "postal" ? "autofocus" : ""); ?> /><br />
    <input type="submit" value="Submit">
</form>
</body>
</html>
