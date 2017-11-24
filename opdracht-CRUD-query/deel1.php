<?php


try {
    $db = new pdo('mysql:host=localhost;dbname=bieren','root','');
}

catch (Exception $e) {
    echo $e->getMessage();
}


$result = $db->query("
SELECT * FROM bieren AS bi 
INNER JOIN brouwers AS br 
ON (bi.brouwernr = br.brouwernr) 
WHERE bi.naam LIKE 'du%' AND br.brnaam LIKE '%a%'");
?>

    <head>
        <style>
            tr:nth-child(even) {
                background: #ddd;
            }
        </style>
    </head>
    <body>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>biernr (PK)</th>
            <th>naam</th>
            <th>brouwernr</th>
            <th>soortnr</th>
            <th>alcohol</th>
            <th>brnaam</th>
            <th>adres</th>
            <th>postcode</th>
            <th>gemeente</th>
            <th>omzet</th>
        </tr>
        </thead>
        <tbody>
<?php
while($row = $result->fetch()) {
    static $nr = 1;
    //echo ($nr % 2) ? '<tr>' : '<tr class="even">';
    echo '<tr>';
    echo "<td>$nr</td>";
    echo "<td>" . $row['biernr'] . "</td>";
    echo "<td>" . $row['naam'] . "</td>";
    echo "<td>" . $row['brouwernr'] . "</td>";
    echo "<td>" . $row['soortnr'] . "</td>";
    echo "<td>" . $row['alcohol'] . "</td>";
    echo "<td>" . $row['brnaam'] . "</td>";
    echo "<td>" . $row['adres'] . "</td>";
    echo "<td>" . $row['postcode'] . "</td>";
    echo "<td>" . $row['gemeente'] . "</td>";
    echo "<td>" . $row['omzet'] . "</td>";
    echo "</tr>";
    $nr++;
}
echo '</tbody></table>';
