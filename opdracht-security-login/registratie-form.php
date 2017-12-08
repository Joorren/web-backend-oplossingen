<?php

session_start();

$email = (isset($_SESSION[ 'registration' ][ 'email' ]))?$_SESSION[ 'registration' ][ 'email' ]:'';
$password = (isset($_SESSION[ 'registration' ][ 'password' ]))?$_SESSION[ 'registration' ][ 'password' ]:'';

?>
<!DOCTYPE html>
<html>
<title>Registratie Form</title>
</html>
<body>
<h1>Registreren</h1>
<?php if (isset($_SESSION[ 'registration' ][ 'error' ])) {
    echo $_SESSION[ 'registration' ][ 'error' ];
} ?>
<form action="registratie-process.php" method="post">
    <label for="email">Email</label><br />
    <input type="email" id="email" placeholder="email" name="email" value="<?=$email;?>" /><br />
    <label for="password">Wachtwoord</label><br />
    <input type="<?=($password!='')?'text':'password';?>" id="password" name="password" placeholder="password" value="<?=$password;?>" />
    <input type="submit" id="generate" name="generate" value="Genereer Wachtwoord" /><br />
    <input type="submit" id="submit" name="submit" value="Registreren" />
</form>
</body>