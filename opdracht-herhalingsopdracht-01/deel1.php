<?php

function searchFiles($keyword) {
//    Wanneer iemand een zoekterm ingeeft, moet er in de map voorbeelden én opdrachten gezocht worden naar alle bestandsnamen die de zoekterm bevatten.
//    Er moet een lijst verschijnen met de bestandsnamen die de zoekterm bevatten
//    Toon een titel met de zoekterm
//    Toon een boodschap wanneer er niets wordt gevonden.

    $list = [];
    $finds = 0;

    foreach (glob("voorbeelden/*/*.php") as $filename) {
        $list[] = $filename;
    }
    foreach (glob("opdrachten/*/*.php") as $filename) {
        $list[] = $filename;
    }

    foreach($list as $index => $string) {
        if (strpos($string, $keyword) !== FALSE) {
            echo $list[$index] . "<br />";
            $finds++;
        }
    }

    if ($finds === 0) {
        echo "No results found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <ul>
        <li><a href="deel1.php?link=cursus">Cursus</a></li>
        <li><a href="deel1.php?link=voorbeelden">Voorbeelden</a></li>
        <li><a href="deel1.php?link=opdrachten">Oplossingen</a></li>
    </ul>
    <form method="get" action="deel1.php">
        <label for="search">Search for:</label>
        <input type="text" name="search" id="search" /><br />
        <input type="submit" content="Search" />
    </form>
    <hr />
<?php
    if(isset($_GET["link"])) {
        $link = $_GET["link"];
        if (strtolower($link) === "cursus") {
?>
            <iframe src="cursus.pdf" height="750" width="1000"></iframe>
<?php
        }
        elseif (strtolower($link) === "voorbeelden" || $link === "opdrachten") {
            foreach (glob("$link/*/*.php") as $filename) {
                echo $filename . "<br />";
            }
        }
    }
    elseif (isset($_GET["search"]) && !empty($_GET["search"])) {
        echo "<h1>Result for " . $_GET["search"] . "</h1>";
        searchFiles($_GET["search"]);
    }
?>
</body>
</html>
