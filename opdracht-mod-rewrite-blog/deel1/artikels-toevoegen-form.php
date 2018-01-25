<?php ?>



<h1>Artikel toevoegen</h1>

<a href="">Terug naar overzicht</a>

<form action="artikel-toevoegen.php">
    <ul>
        <li>
            <label for="title">Titel</label><br />
            <input type="text" id="title" name="title">
        </li>
        <li>
            <label for="article">Artikel</label><br />
            <textarea id="article" name="article"></textarea>
        </li>
        <li>
            <label for="tags">Kernwoorden</label><br />
            <input type="text" id="tags" name="tags">
        </li>
        <li>
            <label for="date">Datum</label><br />
            <input type="date" id="date" name="date">
        </li>
    </ul>
    <input type="submit" name="submit">
</form>