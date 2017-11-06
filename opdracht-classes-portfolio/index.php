<?php
$page="home";
$load="";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

switch ($page) {
    case "contact":
        $load = "contact.partial.php";
        break;
    case "home":
    default:
        $load = "body.partial.php";
        break;
}

spl_autoload_register(function ($className) {
    include_once 'classes/' . $className . '.php';
});

$new = new HTMLBuilder("header.partial.php",$load,"footer.partial.php");