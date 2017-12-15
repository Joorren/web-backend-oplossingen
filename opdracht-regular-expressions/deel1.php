<?php
if (isset($_POST['submit'])) {
    $regex = $_POST['regex'];
    $string = $_POST['string'];
    $newString = preg_replace('/' . $regex . '/',"#",$string);
}
?>

<h1>RegEx Tester</h1>

<form method="post">
    <label for="regex">Regular Expression</label><br />
    <input type="text" id="regex" name="regex" value="<?=$regex;?>"><br /><br />
    <label for="string">String</label><br />
    <textarea id="string" name="string"><?=$newString;?></textarea><br /><br />
    <input type="submit" value="Submit" id="submit" name="submit"/>
</form>
