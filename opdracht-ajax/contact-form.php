<?php

session_start();

$errorMessage = (isset($_SESSION['contact']['error']) && $_SESSION['contact']['error'])? $_SESSION['contact']['error'] : '';
$email = (isset($_SESSION['contact']['email']) && $_SESSION['contact']['email'])? $_SESSION['contact']['email'] : '';
$message = (isset($_SESSION['contact']['message']) && $_SESSION['contact']['message'])? $_SESSION['contact']['message'] : '';
$copy = (isset($_SESSION['contact']['copy']) && $_SESSION['contact']['copy'] === 'copy')? 'checked' : '';
unset($_SESSION['contact']);


?>

<h1>Contacteer ons</h1>

<p><?=$errorMessage;?></p>
<div id="form-container">
    <form method="post" action="contact.php" id="form">
        <label for="email">E-mailadres</label><br />
        <input type="email" name="email" id="email" value="<?=$email;?>"><br /><br />
        <label for="message">Boodschap</label><br />
        <input type="text" name="message" id="message" value="<?=$message;?>"><br /><br />
        <input type="checkbox" name="copy" id="copy" value="copy" <?=$copy;?>><label for="copy">Stuur een kopie naar mezelf</label><br /><br />
        <input type="submit" value="Submit" name="submit" id="submit">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(function()
    {
        $('#form').submit(function() {
            var formData	=	$('#form').serialize();
            $.ajax({
                type: 'POST',
                url: 'contact-API.php',
                data: formData,
                success: function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                }
            });
            return false;
        });
    });
</script>