<?php

session_start();

if ( isset( $_POST[ 'generate' ] ) )
{
    $generatedPassword	=	generatePassword(16);
    $_SESSION[ 'registration' ][ 'email' ]		=	$_POST[ 'email' ];
    $_SESSION[ 'registration' ][ 'password' ]	=	$generatedPassword;
    header( 'location: registratie-form.php');
    exit();
}
elseif (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION[ 'registration' ][ 'email' ]		=	$email;
    $_SESSION[ 'registration' ][ 'password' ]	=	$password;


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registration']['error']      = "Email adres is niet correct.";
        header('location: registratie-form.php');
        exit();
    }

    if (strlen($password)<=5) {
        $_SESSION['registration']['error']      = "Wachtwoord is te kort.";
        header('location: registratie-form.php');
        exit();
    }

    try {
        $db = new pdo('mysql:host=localhost;dbname=opdracht-security-login','root','');
    }

    catch (Exception $e) {
        echo $e->getMessage();
    }

    $result = $db->query("SELECT * FROM users WHERE email = '$email'");

    $row_count =$result->fetchColumn();
    if ($row_count > 0)
    {
        $_SESSION['registration']['error']      = "Email bestaat al.";
        header('location: registratie-form.php');
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $today=date("Y-m-d");

    $insert = $db->query("
    INSERT INTO `users` (`id`, `email`, `password`, `last_login_time`) 
    VALUES (NULL, '$email', '$hashed_password', '$today');
    ");

    //header('location:dashboard.php');
    exit();
}

function generatePassword($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}