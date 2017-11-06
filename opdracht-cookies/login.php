<?php

if (!isset($_COOKIE["login"]) || $_COOKIE["login"] !== "true") {
    header("location: deel2.php");
}

if (isset($_GET["a"]) && $_GET["a"] === "logout" ) {
    setcookie("login", "false");
    header("location: deel1.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logged in</title>
</head>
<body>

<p>Hello</p>
<a href="login.php?a=logout">Log out</a>
</body>
</html>
