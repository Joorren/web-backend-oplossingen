<?php
session_start();

if (isset($_GET['session'])) {
    if ($_GET['session']  === 'destroy') {
        session_destroy();
        header('location: deel1.php' );
    }
}
$email = (isset($_SESSION["UserData"]["email"])) ? $_SESSION["UserData"]["email"] : '';
$nickname = (isset($_SESSION["UserData"]["nickname"])) ? $_SESSION["UserData"]["nickname"] : '';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
<a href="deel1.php?session=destroy">Kill Session</a>
    <h1>User Info</h1>
    <form method="post" action="deel2.php">
        <label for="mail">E-mail: </label>
        <input type="text" name="email" id="mail" value="<?= $email; ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] === "email" ? "autofocus" : ""); ?> /><br />
        <label for="nick">Nickname: </label>
        <input type="text" name="nickname" id="nick" value="<?= $nickname; ?>" <?= (isset($_GET["focus"]) && $_GET["focus"] === "nickname" ? "autofocus" : ""); ?> /><br />
        <input type="submit" content="Submit" />
    </form>
</body>
</html>
