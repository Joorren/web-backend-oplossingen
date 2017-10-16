<?php
session_start();

$_SESSION["UserData"]["street"] = (isset($_POST["street"])) ? $_POST["street"] : ((isset($_SESSION["UserData"]["street"])) ? $_SESSION["UserData"]["street"] : '');
$_SESSION["UserData"]["number"] = (isset($_POST["number"])) ? $_POST["number"] : ((isset($_SESSION["UserData"]["number"])) ? $_SESSION["UserData"]["number"] : '');
$_SESSION["UserData"]["town"] = (isset($_POST["town"])) ? $_POST["town"] : ((isset($_SESSION["UserData"]["number"])) ? $_SESSION["UserData"]["number"] : '');
$_SESSION["UserData"]["postal"] = (isset($_POST["postal"])) ? $_POST["postal"] : ((isset($_SESSION["UserData"]["number"])) ? $_SESSION["UserData"]["number"] : '');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
<a href="deel1.php?session=destroy">Kill Session</a>
<h1>User data:</h1>
<p>E-mail: <?= $_SESSION["UserData"]["email"];?> <a href="deel1.php?focus=email">Edit</a></p>
<p>Nickname: <?= $_SESSION["UserData"]["nickname"];?> <a href="deel1.php?focus=nickname">Edit</a></p>
<p>Street: <?= $_SESSION["UserData"]["street"];?> <a href="deel2.php?focus=street">Edit</a></p>
<p>Number: <?= $_SESSION["UserData"]["number"];?> <a href="deel2.php?focus=number">Edit</a></p>
<p>Town: <?= $_SESSION["UserData"]["town"];?> <a href="deel2.php?focus=town">Edit</a></p>
<p>Postal: <?= $_SESSION["UserData"]["postal"];?> <a href="deel2.php?focus=postal">Edit</a></p>
</body>
</html>