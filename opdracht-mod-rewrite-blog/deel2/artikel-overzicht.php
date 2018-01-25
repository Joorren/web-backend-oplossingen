<?php
session_start();

?>

<h1>Overzicht</h1>

<?php if (isset($_SESSION['success']) && $_SESSION['success'] !== '') {
    echo '<div style="background:palegreen;">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}
?>
