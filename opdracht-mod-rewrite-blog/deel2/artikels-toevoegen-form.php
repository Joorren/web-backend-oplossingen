<?php
session_start();

$title = (isset($_SESSION['title'])? $_SESSION['title'] : '');
$article = (isset($_SESSION['article'])? $_SESSION['article'] : '');
$tags = (isset($_SESSION['tags'])? $_SESSION['tags'] : '');
$date = (isset($_SESSION['date'])? $_SESSION['date'] : '');

unset($_SESSION['title']);
unset($_SESSION['article']);
unset($_SESSION['tags']);
unset($_SESSION['date']);

?>



<h1>Artikel toevoegen</h1>

<?php if (isset($_SESSION['error']) && $_SESSION['error'] !== '') {
    echo '<div style="background:indianred;"><ul>';
    foreach ($_SESSION['error'] as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul></div>';
    unset($_SESSION['error']);
}
?>

<a href="artikel-overzicht.php">Terug naar overzicht</a>

<form action="artikel-toevoegen.php">
    <ul>
        <li>
            <label for="title">Titel</label><br />
            <input type="text" id="title" name="title" value="<?=$title?>">
        </li>
        <li>
            <label for="article">Artikel</label><br />
            <textarea id="article" name="article"><?=$article?></textarea>
        </li>
        <li>
            <label for="tags">Kernwoorden</label><br />
            <input type="text" id="tags" name="tags" value="<?=$tags?>">
        </li>
        <li>
            <label for="date">Datum</label><br />
            <input type="date" id="date" name="date" value="<?=$date?>">
        </li>
    </ul>
    <input type="submit" name="submit">
</form>