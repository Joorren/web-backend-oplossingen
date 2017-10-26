<?php
session_start();

$isValid = false;

try {
    if (isset($_POST["submit"])) {
        if (isset ($_POST["coupon"])) {
            if (strlen($_POST["coupon"]) === 8) {
                $isValid = true;
            } else {
                throw new Exception("VALIDATION-CODE-LENGTH");
            }
        }
        else {
            throw new Exception("SUBMIT-ERROR");
        }
    }
}
catch ( Exception $e )
{
    $messageCode = $e->getMessage();
    $message = ["text"=>"", "type"=>""];
    $createMessage = false;

    switch ($messageCode) {
        case "SUBMIT-ERROR":
            $message["type"] = "error";
            $message["text"] = "Er werd met het formulier geknoeid";
            break;
        case "VALIDATION-CODE-LENGTH":
            $message[ 'type' ]	=	'error';
            $message[ 'text' ]	=	'De kortingscode heeft niet de juiste lengte';
            $createMessage	=	true;
            break;
        default:
            break;
    }

    if ($createMessage) {
        createMessage($message);
    }

    logToFile($message);

    $errorMessage = showMessage();
}

function logToFile($msg) {
    $fileName = "logs.txt";
    $currErrors = file_get_contents($fileName);
    $currErrors .= "[" . date("H:i:s d/m/y") ."] - " . $_SERVER['REMOTE_ADDR'];
    $currErrors .= " - Type:[". $msg["type"] . "] " . $msg["text"] . " \n";
    file_put_contents($fileName,$currErrors);
}

function createMessage($msg) {
    $_SESSION['message']['type'] = $msg["type"];
    $_SESSION['message']['message'] = $msg["text"];
}

function showMessage() {
    if (isset($_SESSION['message']['type'], $_SESSION['message']['message'])) {
        $arrayData = ["type" => $_SESSION['message']['type'], "message" => $_SESSION['message']['message']];
    }
    else {
        $arrayData = false;
    }
    unset($_SESSION['message']['type']);
    unset($_SESSION['message']['message']);

    return $arrayData;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
    <style>
        .error {
            color: #b94a48;
            background-color: #f2dede;
            border: 1px solid #eed3d7;
        }
    </style>
</head>
<body>
<?php if ($isValid) { ?>
    Korting toegekend!
<?php
}
else {
    echo "<h1>Fill in your coupon code</h1>";
    if (isset($errorMessage)) {
        echo "<div class='error'>" . $errorMessage['message'] . "</div>";
    } ?>
<form method="post">
    <label for="coupon">Coupon Code</label><br />
    <input type="number" id="coupon" name="coupon" /><br />
    <input type="submit" value="Submit" name="submit" />
</form>
<?php } ?>
</body>
</html>
