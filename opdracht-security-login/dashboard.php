<?php

session_start();

if (!isset($_COOKIE['login']) || strlen($_COOKIE['login']) <= 0) {
    $_SESSION['account']['error']      = "U moet eerst inloggen.";
    header('location: login-form.php');
    exit();
}

$accountInfo = explode(",", $_COOKIE['login']);


try {
    $db = new pdo('mysql:host=localhost;dbname=opdracht-security-login','root','');
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

var_dump($accountInfo);

?>



<a href="logout.php">Uitloggen</a>
