<?php

//Het is de bedoeling om een HTML-pagina in stukken te snijden (header, body, footer) en deze via PHP weer aan elkaar te lijmen
//tot het origineel. In het PHP bestand wordt ook data gedefinieerd die in de HTML uitgelezen moet worden.
//Probeer zelf je HTML-pagina op te bouwen. Je kan je hiervoor laten inspireren door voorbeelden die je bv. op dribbble terugvindt.

$articles = array(
    array(
        "title" => "Lorem ipsum",
        "text" => "Lorem ipsum dolor sit amet, mei ex vivendo deleniti invenire, quo utinam aliquid id. 
                    Cu vix adhuc fugit volumus. Ut diam salutatus disputando vel. Erat necessitatibus ut his, 
                    eu pro graeco oportere, an nec fugit quodsi. Sit audire maiorum ea.",
        "tags" => "lorem, ipsum"
    ),
    array(
        "title" => "Mei erant",
        "text" => "Mei erant noster nominati ex. Te possim argumentum vix. Eum ne aliquid concludaturque, 
                    id labores perpetua interpretaris mei, ius te quodsi adversarium. Illum verterem vim eu, 
                    ius agam commodo blandit eu. Cu cum natum habemus, te novum audire vis.",
        "tags" => "mei, erant"
    ),
    array(
        "title" => "Sit legare",
        "text" => "Sit legere essent insolens an. Sea no zril primis intellegat, aliquid feugiat torquatos vim an, 
                    vis ex veritus detracto dissentiet. Vis ne quidam vituperata complectitur. Tollit convenire ea qui.",
        "tags" => "sit, legare"
    )
);

    include 'view/header-partial.html';
    include 'view/body-partial.html';
    include 'view/footer-partial.html';
?>