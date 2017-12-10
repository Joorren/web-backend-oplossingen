<?php

session_start();

$accountInfo = explode(",", $_COOKIE['login']);

$email = $_POST['email'];
$oldEmail = $accountInfo[0];

$newProfilePicture = "";
$newEmail = "";

if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] !== 4) {

    $dest = "img/";
    $date = date("YmdHis");
    $newFile = $_FILES['profilePicture'];
    $fullDir = $dest . $date . "_" . $newFile['name'];
    $allowedExtensions = ['image/jpeg', 'image/png', 'image/gif'];

    if ($newFile['error'] !== 0) {
        $errMessage = "";
        switch ($newFile['error']) {
            case 1:
            case 2:
                $errMessage = "Bestand is te groot";
                break;
            case 3:
                $errMessage = "Bestand is recentelijk geupload";
                break;
            case 4:
                $errMessage = "Geen bestand toegevoegd";
                break;
            case 6:
                $errMessage = "Geen tijdelijke map gevonden";
                break;
            case 7:
                $errMessage = "Mislukt om bestand te schrijven";
                break;
            case 8:
                $errMessage = "Php extentie stopte de upload";
                break;
            default:
                $errMessage = "Error";
                break;
        }

        $_SESSION['upload']['error'] = $errMessage;
        header('location: gegevens-wijzigen-form.php');
        exit();
    }
    if ($newFile['size'] > 2097152) { // if bigger than 2mb (2*1024*1024)
        $_SESSION['upload']['error'] = "Bestand is te groot";
        header('location: gegevens-wijzigen-form.php');
        exit();
    }
    if (array_search($newFile['type'], $allowedExtensions) < 0) {
        $_SESSION['upload']['error'] = "Bestandstype niet toegestaan";
        header('location: gegevens-wijzigen-form.php');
        exit();
    }
    while (file_exists($fullDir)) {
        $fullDir = $dest . date("YmdHis") . $newFile['name'];
    }

    move_uploaded_file($newFile['tmp_name'], $fullDir);

    $newProfilePicture = $newFile['name'];
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['upload']['error']      = "Email adres is niet correct.";
    header('location: gegevens-wijzigen-form.php');
    exit();
}

$newEmail = $email;


try {
    $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}

//$sql = "UPDATE `users` SET `email` = '$newEmail' `profile_picture` = '$newProfilePicture' WHERE `email` = '$oldEmail'";
$sql = "UPDATE `users` SET `email` = '$newEmail' WHERE `email` = $oldEmail;";
$db = $db->prepare($sql);
$db->execute();

$_SESSION['upload']['error']    = "Successfully changed for $newEmail";
header('location: gegevens-wijzigen-form.php');
exit();
