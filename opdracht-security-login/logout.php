<?php

session_start();


$_SESSION['account']['logout']      = "Successvol uitgelogd.";
setcookie("login","",time()-100);
header('location: login-form.php');