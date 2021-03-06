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

?>

<a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <?= $accountInfo[0];?> | <a href="logout.php">Uitloggen</a>
<br />

<h1>Dashboard</h1>
<ul>
    <li>Artikels</li>
    <li><a href="gegevens-wijzigen-form.php">Gegevens wijzigen</a></li>
</ul>