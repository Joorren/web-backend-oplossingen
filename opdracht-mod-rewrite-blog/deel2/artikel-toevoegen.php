<?php
session_start();
$_SESSION['error'] = [];
$errors = [];

if ($_GET['submit']) {
    try {
        $db = new pdo('mysql:host=localhost;dbname=opdracht-blog','root','');
    }

    catch (Exception $e) {
        echo $e->getMessage();
    }

    $title = htmlentities($_GET['title']);
    $article = htmlentities($_GET['article']);
    $tags = htmlentities($_GET['tags']);
    $date = htmlentities($_GET['date']);

    $_SESSION['title'] = $title;
    $_SESSION['article'] = $article;
    $_SESSION['tags'] = $tags;
    $_SESSION['date'] = $date;

    if ($title === '' || strlen($title) > 255) {
        array_push($errors, 'Title argument was invalid.');
    }

    if ($article === '') {
        array_push($errors, 'Article argument was invalid.');
    }

    if ($tags === '') {
        array_push($errors, 'Tags argument was invalid.');
    }

    if ($date === '') {
        array_push($errors, 'Date argument was invalid.');
    }

    if (count($errors) === 0) {
        $insert = $db->query("
        INSERT INTO `articles` (`id`, `title`, `article`, `tags`, `date`) 
        VALUES (NULL, '$title', '$article', '$tags', '$date');
        ");
        $_SESSION['success'] = 'Success';
        header('location: artikel-overzicht.php');
        exit();
    }

}
else {
    array_push($errors, 'Wrong method used.');
}

$_SESSION['error'] = $errors;

header('location: artikels-toevoegen-form.php');


?>