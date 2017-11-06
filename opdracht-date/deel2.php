<?php
setlocale(LC_ALL,"nld_nld");
$date = mktime(22, 35, 25, 1, 21, 1904);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
<?= strftime("%d %B %Y, %I:%M:%S %p",$date); ?>
</body>
</html>
