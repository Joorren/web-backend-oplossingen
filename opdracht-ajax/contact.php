<?php

session_start();

function logError($error) {
    $_SESSION['contact']['error'] = $error;
    header('location: contact-form.php');
    exit();
}

$email = (isset($_POST['email']))? $_POST['email'] : '';
$message = (isset($_POST['message']))? $_POST['message'] : '';
$copy = (isset($_POST['copy']))? $_POST['copy'] : '';
$date = date('Y-m-d H:i:s');

if (isset($_POST['submit'])) {
    if (strlen($email) === 0) {
        $error = 'Geen email ingevoerd';
        logError($error);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Fout email ingevoerd';
        logError($error);
    }
    if (strlen($message) === 0) {
        $error = 'Geen bericht ingevoerd';
        logError($error);
    }
}

$admin = 'Jorendandois@hotmail.com';

try {
    $db = new pdo('mysql:host=localhost;dbname=opdracht-file-upload','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}

$sql = "INSERT INTO `opdracht-ajax`.contact_messages (id, email, message, time_sent) VALUES (0,'$email', '$message', '$date')";
$db->query($sql);

echo "ok";