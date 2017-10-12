<?php
$date = mktime(22, 35, 25, 1, 21, 1904);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body>
    <?= date("d F Y, h\:i\:s a ",$date); ?>
</body>
</html>
