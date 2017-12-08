<?php

session_start();

if (isset($_COOKIE['login']) && strlen($_COOKIE['login']) > 0) {
    header('location: dashboard.php');
    exit();
}

$email = (isset($_SESSION[ 'login' ][ 'email' ]))?$_SESSION[ 'login' ][ 'email' ]:'';

?>
<!DOCTYPE html>
<html>
<title>Login Form</title>
</html>
<body>
<h1>Inloggen</h1>
<?php if (isset($_SESSION[ 'account' ][ 'error' ])) {
    echo $_SESSION[ 'account' ][ 'error' ];
} ?>
<form action="login-process.php" method="post">
    <label for="email">Email</label><br />
    <input type="email" id="email" placeholder="email" name="email" value="<?=$email;?>" /><br />
    <label for="password">Wachtwoord</label><br />
    <input type="password" id="password" name="password" placeholder="password" />
    <input type="submit" id="submit" name="submit" value="Inloggen" />
</form>
<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a>.</p>
</body>