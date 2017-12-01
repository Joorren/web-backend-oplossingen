<?php

$imgAsc = "http://web-backend.local/img/icon-asc.png";
$imgDesc = "http://web-backend.local/img/icon-desc.png";
$currLink = "http://oplossingen.web-backend.local/opdracht-CRUD-query-order-by/deel1.php";

session_start();
$bierAsc = (isset($_SESSION['bier']))? $_SESSION['bier']:true;
$brouwerAsc = (isset($_SESSION['brouwer']))? $_SESSION['brouwer']:true;
$soortAsc = (isset($_SESSION['soort']))? $_SESSION['soort']:true;
$alcAsc = (isset($_SESSION['alcoholPercentage']))? $_SESSION['alcoholPercentage']:true;
$previousOrderBy = (isset($_SESSION['prevOrder']) && $_SESSION['prevOrder'])?$_SESSION['prevOrder']:'';

$orderBy = '';
$orderType = 'DESC';

if (!isset($_GET['sort'])) $_GET['sort'] = "";

switch ($_GET['sort']) {
    default:
    case 'bier':
        $bierAsc = ($previousOrderBy === 'bier')?!$bierAsc:$bierAsc;
        $_SESSION['bier'] = $bierAsc;
        $_SESSION['prevOrder'] = 'bier';
        $orderBy = 'naam';
        $orderType = ($bierAsc)?'ASC':'DESC';
        break;
    case 'brouwer':
        $brouwerAsc = ($previousOrderBy === 'brouwer')?!$brouwerAsc:$brouwerAsc;
        $_SESSION['bier'] = $bierAsc;
        $_SESSION['prevOrder'] = 'brouwer';
        $orderBy = 'brnaam';
        $orderType = ($brouwerAsc)?'ASC':'DESC';
        break;
    case 'soort':
        $soortAsc = ($previousOrderBy === 'soort')?!$soortAsc:$soortAsc;
        $_SESSION['soort'] = $soortAsc;
        $_SESSION['prevOrder'] = 'soort';
        $orderBy = 'soort';
        $orderType = ($soortAsc)?'ASC':'DESC';
        break;
    case 'alcohol':
        $alcAsc = ($previousOrderBy === 'alcohol')?!$alcAsc:$alcAsc;
        $_SESSION['alcohol'] = $alcAsc;
        $_SESSION['prevOrder'] = 'alcohol';
        $orderBy = 'alcohol';
        $orderType = ($alcAsc)?'ASC':'DESC';
        break;
}


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
INNER JOIN soorten AS s
ON (bi.soortnr = s.soortnr)
ORDER BY $orderBy $orderType
LIMIT 20
");

?>
<head>
    <title>Some table...</title>
    <style>
        tr:nth-child(odd) {
            background: #ddd;
        }
        thead tr, thead tr a {
            background: #333333 !important;
            color: #EEE;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <td><a href="<?=$currLink;?>?sort=bier">Bier</a><img src="<?=($bierAsc)?$imgDesc:$imgAsc;?>" /></td>
        <td><a href="<?=$currLink;?>?sort=brouwer">Brouwer</a><img src="<?=($brouwerAsc)?$imgDesc:$imgAsc;?>" /></td>
        <td><a href="<?=$currLink;?>?sort=soort">Soort</a><img src="<?=($soortAsc)?$imgDesc:$imgAsc;?>" /></td>
        <td><a href="<?=$currLink;?>?sort=alcohol">Alcoholpercentage</a><img src="<?=($alcAsc)?$imgDesc:$imgAsc;?>" /></td>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($row = $result->fetch()) {
        $bier = $row['naam'];
        $brouwer = $row['brnaam'];
        $soort = $row['soort'];
        $alcohol = $row['alcohol'];
        echo
            "<tr>".
            "<td>$bier</td>".
            "<td>$brouwer</td>".
            "<td>$soort</td>".
            "<td>$alcohol</td>".
            "</tr>";
    }

    ?>
    </tbody>
</table>
</body>
