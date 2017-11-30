<?php

try {
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}

$result = $db->query("
SELECT * FROM brouwers AS br");

$showMessage=true;

if(isset($_POST["delete"])) {
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

    $showMessage=false;
}
elseif (isset($_POST['remove'])){
    $showMessage=false;
}
elseif (isset($_POST['submit'])) {
    $brNr = $_GET['edit'];
    $brnaam = $_POST['brnaam'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $gemeente = $_POST['gemeente'];
    $omzet = $_POST['omzet'];
    $update = $db->query("
UPDATE `brouwers` SET 
`brnaam` = '$brnaam' 
`adres` = '$adres' 
`postode` = '$postcode' 
`gemeente` = '$gemeente' 
`omzet` = '$omzet' 
WHERE `brouwers`.`brouwernr` = $brNr;");
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
        .edit {
            background: url(http://web-backend.local/img/icon-edit.png) no-repeat;
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
<body>
<?php if (isset($_GET['delete']) && $showMessage) {

    ?>
    <div>
        <p>Bent u zeker dat u deze datarij wil verwijderen?</p>
        <form method="post">
            <input type="submit" name='delete' value='Ja' />
            <input type="submit" name='remove' value="Nee"/>
        </form>
    </div>
<?php }
elseif (isset($_GET['edit'])) {
    $brNr = $_GET['edit'];
    $brouwerij = $db->prepare("SELECT * FROM brouwers as br WHERE br.brouwernr = :brouwerNr");
    $brouwerij->bindValue(':brouwerNr', $brNr);
    $brouwerij->execute();

    while ($row = $brouwerij->fetch()) {

        $brNr=$row['brouwernr'];
        $brNaam = $row['brnaam'];
        $adres = $row['adres'];
        $postcode = $row['postcode'];
        $gemeente = $row['gemeente'];
        $omzet = $row['omzet'];

        ?>

        <h1>Brouwerij <?=$brNaam;?> (<?= $brNr; ?>)</h1>
        <form method="post">
            <label for="brouwerNaam">Brouwernaam</label><br/>
            <input type="text" id="brouwerNaam" name="brnaam" value="<?= $brNaam; ?>"/><br/>
            <label for="adres">Adres</label><br/>
            <input type="text" id="adres" name="adres" value="<?= $adres; ?>"/><br/>
            <label for="postcode">Postcode</label><br/>
            <input type="number" id="postcode" name="postcode" value="<?= $postcode; ?>"/><br/>
            <label for="gemeente">Gemeente</label><br/>
            <input type="text" id="gemeente" name="gemeente" value="<?= $gemeente; ?>"/><br/>
            <label for="omzet">Omzet</label><br/>
            <input type="number" id="omzet" name="omzet" value="<?= $omzet; ?>"/><br/>
            <input type="submit" value="Submit" name="submit"><br/>
        </form>
        <?php
    }
        }
    ?>

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
                "<td><input type=\"submit\" class=\"input-icon-button delete\" name='delete' value='$brNr'></td>".
                "<td><input type=\"submit\" class=\"input-icon-button edit\" name='edit' value='$brNr'></td></tr>";

            $nr++;
        }

        ?>
        </tbody>
    </table>
</form>
