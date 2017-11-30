<?php

try {
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['submit'])) {
    $brnaam = $_POST['brnaam'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $gemeente = $_POST['gemeente'];
    $omzet = $_POST['omzet'];
    $insert = $db->query("
INSERT INTO `brouwers` (`brouwernr`, `brnaam`, `adres`, `postcode`, `gemeente`, `omzet`) 
VALUES (NULL, '$brnaam', '$adres', '$postcode', '$gemeente', '$omzet')");

    if ($insert) {
        echo "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $db->lastInsertId();
    }
    else {
        echo "Er ging iets mis met het toevoegen. Probeer opnieuw.";}

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Some page</title>
</head>
<body>
<h1>Voeg een brouwer toe</h1>
<form method="post">
    <label for="brouwerNaam">Brouwernaam</label><br />
    <input type="text" id="brouwerNaam" name="brnaam"/><br />
    <label for="adres">Adres</label><br />
    <input type="text" id="adres" name="adres"/><br />
    <label for="postcode">Postcode</label><br />
    <input type="number" id="postcode" name="postcode"/><br />
    <label for="gemeente">Gemeente</label><br />
    <input type="text" id="gemeente" name="gemeente"/><br />
    <label for="omzet">Omzet</label><br />
    <input type="number" id="omzet" name="omzet"/><br />
    <input type="submit" value="Submit" name="submit"><br />
</form>
</body>
</html>
