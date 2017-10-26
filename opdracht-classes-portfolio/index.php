<?php

spl_autoload_register(function ($className) {
    include_once 'classes/' . $className . '.php';
});


$new = new HTMLBuilder("header.partial.php","body.partial.php","footer.partial.php");