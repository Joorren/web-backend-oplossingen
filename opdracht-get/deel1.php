<?php

$articles = array(
    array("Vlaams toerisme verteert ‘lockdown’ en aanslagen: Antwerpen bezig aan “topjaar”",
          "05/10/2017",
          "Het toerisme in Vlaanderen is tijdens de eerste helft van dit jaar opnieuw gegroeid ten opzichte van de eerste zes 
          maanden van 2016, die getekend werden door de nasleep van de ‘lockdown’ in Brussel en de aanslagen van 22 maart. 
          Ook de provincie Antwerpen tekent positieve cijfers op, al zijn Oost-Vlaanderen en Vlaams-Brabant de sterkste cijfers. 
          Bij ons is het vooral het zakentoerisme dat boomt.2017 lijkt een topjaar voor het toerisme in de provincie Antwerpen 
          te gaan worden. De logiescijfers van de eerste jaarhelft doen het beste vermoeden voor de toeristische sector. 
          In zes maanden tijd telde de provincie 6% meer aankomsten en 3% meer overnachtingen dan in dezelfde periode vorig jaar.",
          "https://gvacdn.akamaized.net/Assets/Images_Upload/2017/10/05/6d9d53b2-a9b1-11e7-bdec-85b5a9e3de4e_web_scale_0.0659382_0.0659382__.jpg?maxheight=460&maxwidth=629",
          "Vlaams toerisme verteert ‘lockdown’ en aanslagen: Antwerpen bezig aan “topjaar”"),
    array("Antwerpse Ring krijgt al begin volgend jaar zuinige ledverlichting: besparing van 4 miljoen",
          "05/10/2017",
          "Vlaanderen vervangt de verlichtingspalen langs de Vlaamse snelwegen. Er komt zuinige ledverlichting in de plaats. 
          De Antwerpse Ring wordt begin 2018 als eerste onder handen genomen. De ledverlichting is goed voor een totale besparing 
          van 4 miljoen euro per jaar.",
          "https://gvacdn.akamaized.net/Assets/Images_Upload/2017/10/04/4c7f4b10-a923-11e7-835a-a00103c6c11a_original.jpg?maxheight=465&maxwidth=700",
          "Antwerpse Ring krijgt al begin volgend jaar zuinige ledverlichting: besparing van 4 miljoen"),
    array("Sheriff: “Schutter van Las Vegas had een kompaan”",
          "05/10/2017",
          "Speurders denken dat Stephen Paddock, de schutter die in Las Vegas 59 doden maakte, niet alleen handelde. 
          Daarmee spreken ze de eerdere verklaring tegen dat Paddock een lone wolf zou zijn.",
          "https://gvacdn.akamaized.net/Assets/Images_Upload/2017/10/05/f6230146-a984-11e7-bdec-85b5a9e3de4e_web_scale_0.3808487_0.3808487__.jpg?maxheight=460&maxwidth=629",
          "Schutter en Sheriff")
);

$individual = false;
$exists = true;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if (array_key_exists($id, $articles)) {
        $articles = array($articles[$id]);
        $individual = true;
    }
    else {
        $exists = false;
    }
}

$type = ($individual? "solo" : "multi");

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        article.multi {
            width: 30vw;
            margin: 1vh 0.8vw;
            border: 1px solid gray;
            border-radius: 3px;
            padding: 0.5vw;
            float: left;
        }
        article.solo {
            width: 90vw;
            margin: 5vh 4vw;
            border: 1px solid gray;
            border-radius: 3px;
            padding: 0.9vw;
            float: left;
        }
        h1.multi {
            font-size: 1.2vw;
        }
        h1.solo {
            font-size: 2vw;
        }
        img.multi {
            width: 100%;
        }
        img.solo {
            width: 50%;
            float: right;
        }
        span {
            color: gray;
            font-size: 1vw;
        }
        span {
        }
        p.multi {
            font-size: 1.1vw;
        }
        p.solo {
            font-size: 1.2vw;
        }
        .multi.right {
            text-align: right;
        }
        .solo.right {
            display: none;
        }

    </style>
</head>
<body>
<?php
if ($exists) {
    foreach ($articles as $key => $article) {
        ?>
        <article class="<?= $type; ?>">
            <h1 class="<?= $type; ?>"><?= $article[0]; ?></h1>
            <span><?= $article[1]; ?></span>
            <img class="<?= $type; ?>" src="<?= $article[3]; ?>" alt="<?= $article[4]; ?>"/>
            <p class="<?= $type; ?>"><?= ($individual) ? $article[2] : substr($article[2], 0, 50) . "..."; ?></p>
            <p class="<?= $type; ?> right"><a href="deel1.php?id=<?= $key; ?>">Read more >></a></p>
        </article>
        <?php
    }
}
else {
    ?>
    <h1>Article doesn't exist</h1>
<?php
}
?>
</body>
</html>
