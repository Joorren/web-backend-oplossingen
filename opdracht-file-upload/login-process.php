<?php

//Bevat alle PHP logica die instaat voor het afhandelen van het inloggen van een gebruiker
//en bevat op geen enkel moment HTML code.
//Deze pagina staat in voor het verifiëren van de login van de gebruiker.
//Maak een connectie met de database en selecteer alle gegevens op basis van het ingevulde e-mailadres.
//Als de user niet werd teruggevonden, zet dan een gepaste boodschap in de $_SESSION['notification']
// en redirect naar login-form.php
//Als de user werd teruggevonden, mag het tweede deel van het script worden ingezet.

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION[ 'login' ][ 'email' ] = $email;

if (isset($_POST['submit'])) {
    if (!isset($_POST['email']) || strlen($_POST['email']) <= 0) {
        $_SESSION['account']['error']      = "Email adres is niet ingevuld. " . $_POST['email'];
        header('location: login-form.php');
        exit();
    }
    if (!isset($_POST['password']) || $_POST['password'] <= 0) {
        $_SESSION['account']['error']      = "Wachtwoord is niet ingevuld.";
        header('location: login-form.php');
        exit();
    }


    try {
        $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','');
    }

    catch (Exception $e) {
        echo $e->getMessage();
    }

    $result = $db->query("SELECT * FROM users WHERE email = '$email' LIMIT 1");

    $row = $result->fetch();
    $row_count =$result->rowCount();
    if ($row_count <= 0)
    {
        $_SESSION['account']['error']      = "Email niet teruggevonden.";
        header('location: login-form.php');
        exit();
    }
    elseif (password_verify($password, $row['password'])) {
        setcookie("login",$email.','.$row['password'],time()+60*60*24*30);
        header('location:dashboard.php');
        exit();
    }
    else {
        $_SESSION['account']['error']      = "Wachtwoord onjuist.";
        header('location: login-form.php');
        exit();
    }

}


header( 'location: login-form.php');
exit();