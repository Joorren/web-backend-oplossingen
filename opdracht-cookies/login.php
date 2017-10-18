<?php

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
<a href="login.php?a=logout">Log out</a>
</body>
</html>
