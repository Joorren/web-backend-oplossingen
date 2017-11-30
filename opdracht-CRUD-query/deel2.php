<?php


//Zorg ervoor dat wanneer er niet kan geconnecteerd worden met de database, er een custom foutboodschap verschijnt, inclusief de specifieke fout.
//Voer de volgende query uit: selecteer de brouwernummer en de brouwernaam
//Bouw een formulier op volgens de regels van de kunst via een get-methode en de action verwijst naar dezelfde pagina.
//In dit formulier bevindt zich een select. Deze select bevat alle name van elke brouwerij.
//De value van elke brouwernaam is gelijk aan het brouwernummer
//Wanneer er op de submit wordt gedrukt moet er een tabel verschijnen met alle bieren van deze brouwerij
//Er moet een nieuwe query uitgevoerd worden. De bieren moeten geselecteerd worden op basis van het brouwernummer
//De resultaten moeten in een <table> weergegeven worden en werk met <thead>, <tfoot> en <tbody>
//Voor de naam van elk bier staat de nummer van het hoeveelste bier dit is. Misschien kan de static je hierbij helpen?
//    De oneven rijen krijgen een klasse odd. Deze klasse heeft een andere achtergrondkleur


try {
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}

$selectedBrouwerNr = (isset($_GET['brouwer']))? $_GET['brouwer']: '';

$brouwerResult = $db->query("
SELECT br.brouwernr, br.brnaam  FROM brouwers AS br");

if ($selectedBrouwerNr === "") {
    $bierResult = $db->query("SELECT bi.naam FROM bieren as bi");
}
else {
    $bierResult = $db->prepare("
SELECT bi.naam FROM bieren AS bi
WHERE bi.brouwernr = :brouwerNr");
    $bierResult->bindValue(':brouwerNr', $selectedBrouwerNr);
    $bierResult->execute();
}
?>
<head>
    <style>
        .odd {
            background: #ddd;
        }
    </style>
</head>

<form action="deel2.php" method="get">
    <select name="brouwer" id="brouwer"><label for="brouwer"></label>
        <?php
            while ($row=$brouwerResult->fetch()) {
                $brNaam = $row['brnaam'];
                $brNr = $row['brouwernr'];
                $selected = ($brNr === $selectedBrouwerNr)?"selected":"";
                echo "<option value='$brNr' $selected>$brNaam</option>";
            }
?>
    </select>
    <input type="submit" value="Zoek bieren">
</form>

<table>
    <thead>
    <tr>
        <th>Naam</th>
        <th>Aantal</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while ($row = $bierResult->fetch()) {
            static $nr=1;
            $bierNaam = $row['naam'];
            $oddClass = ($nr%2)?"odd":"";
            echo "<tr class='$oddClass'><td>$nr</td><td>$bierNaam</td></tr>";
            $nr++;
        }

?>
    </tbody>
</table>
