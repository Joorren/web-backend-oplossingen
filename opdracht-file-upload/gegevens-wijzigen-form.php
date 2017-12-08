<?php

session_start();

if (!isset($_COOKIE['login']) || strlen($_COOKIE['login']) <= 0) {
    $_SESSION['account']['error']      = "U moet eerst inloggen.";
    header('location: login-form.php');
    exit();
}

$accountInfo = explode(",", $_COOKIE['login']);


try {
    $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}

$result = $db->query("SELECT * FROM users WHERE email = '$accountInfo[0]' LIMIT 1");

$row  = $result -> fetch();

if (!($row['password'] === $accountInfo[1])) {
    $_SESSION['account']['error']      = "Error.";
    setcookie("login","",time()-100);
    header('location: login-form.php');
    exit();
}

if ($row['profile_picture'] === "") {
    $profilePicture = "icon.png";
}
else {
    $profilePicture = $row['profile_picture'];
}

?>

<a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <?= $accountInfo[0];?> | <a href="logout.php">Uitloggen</a>
<br /><br />

<img src="img/<?=$profilePicture;?>" alt="<?=$accountInfo[0];?>" height="200" width="200"/><br /><br />

<form action="gegevens-bewerken.php" method="post" enctype="multipart/form-data">

    <input type="file" name="profilePicture" /><br /><br />
    <label for="email">Email</label><br />
    <input type="email" id="email" placeholder="email" name="email" value="<?=$accountInfo[0];?>" /><br /><br />
    <input type="submit" id="submit" name="submit" value="Gegevens Wijzigen" />

</form>
