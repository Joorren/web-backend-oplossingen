<?php

try {
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}

$result = $db->query("
SELECT * FROM brouwers AS br");

if(isset($_GET["delete"])) {
    $nr = $_GET['delete'];
    $delete = $db->query("
DELETE FROM `brouwers` WHERE `brouwers`.`brouwernr` = $nr");

    if ($delete) {
        echo "De datarij werd goed verwijderd.";
    }
    else {
        echo "De datarij kon niet verwijderd worden. Probeer opnieuw.";
        echo $nr;
    }

}


?>
<head>
    <title>Just some page</title>
    <style>
        .delete {
            width: 16px;
            height: 16px;
            background: url(http://web-backend.local/img/icon-delete.png) no-repeat;
        }
        .input-icon-button {
            border: none;
            background-color: transparent;
            cursor: pointer;
            text-indent: -1000px;
        }
        .odd {
            background: #ddd;
        }
    </style>
</head>
<form method="get">
<table>
    <thead>
    <tr>
        <th>Brouwernummer</th>
        <th>Brouwernaam</th>
        <th>Adres</th>
        <th>Postcode</th>
        <th>Gemeente</th>
        <th>Omzet</th>
        <th><!--empty--></th>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($row = $result->fetch()) {
        static $nr = 1;
        $oddClass=($nr%2)?'odd':'';

        $brNr = $row['brouwernr'];
        $brNaam = $row['brnaam'];
        $adres = $row['adres'];
        $postcode = $row['postcode'];
        $gemeente = $row['gemeente'];
        $omzet = $row['omzet'];

        echo
            "<tr class='$oddClass'><td>$brNr</td>".
            "<td>$brNaam</td>".
            "<td>$adres</td>".
            "<td>$postcode</td>".
            "<td>$gemeente</td>".
            "<td>$omzet</td>".
            "<td><input type=\"submit\" class=\"input-icon-button delete\" name='delete' value='$brNr'></td></tr>";

        $nr++;
    }

    ?>
    </tbody>
</table>
</form>
