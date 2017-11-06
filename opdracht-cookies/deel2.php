<?php

if (isset($_COOKIE["login"]) && $_COOKIE["login"] === "true") {
    header("location: login.php");
}

$text = file_get_contents("text.txt");
$textArray = explode(",","$text");

function checkValues($username, $password, $details) {
    if ($username == $details[0] && $password == $details[1]) {
        if (isset($_POST["remember"]) && $_POST["remember"] === "true") {
            setcookie("login", "true", time() + 30*24*60*60);
        }
        else {
            setcookie("login", "true");
        }
        header("location: login.php");
        $return = "Logged in";
    }
    else {
        $return = "Wrong username and/or password.";
    }
    return $return;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
<?= (isset($_POST["username"]) && isset($_POST["password"]))? checkValues($_POST["username"], $_POST["password"], $textArray): "" ;?>
<form action="deel1.php" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username" /><br />
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" /><br />
    <input type="checkbox" name="remember" id="remember" value="true" />
    <label for="remember">Remember me</label><br />
    <input type="submit" value="Submit" />
</form>
</body>
</html>
