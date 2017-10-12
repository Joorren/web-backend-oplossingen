<?php
$username="Joorren";
$password="abc123";
$message = "";
if (isset($_POST["username"]) && isset($_POST["password"])) {
    if ($username === $_POST["username"] && $password === $_POST["password"]) {
        $message="Welcome";
    }
    else {
        $message = "Something went wrong, try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <form action="" method="post">
        <label for="uName">Username:</label>
        <input type="text" name="username" id="uName" /><br />
        <label for="pWord">Password:</label>
        <input type="password" name="password" id="pWord" /><br />
        <input type="submit" content="Submit" />
    </form>
<?= $message; ?>
</body>
</html>