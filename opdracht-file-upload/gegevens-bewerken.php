<?php

session_start();

if (isset($_FILES['profilePicture'])) {

    $dest = "img/";
    $newFile = $_FILES['profilePicture'];

    if ($newFile["error"] !== 0) {
        $errMessage = "";
        switch ($newFile['error']) {
            case 1:
            case 2:
                $errMessage="Bestand is te groot";
                break;
            case 3:
                $errMessage="Bestand is recentelijk geupload";
                break;
            case 4:
                $errMessage="Geen bestand toegevoegd";
                break;
            case 6:
                $errMessage="Geen tijdelijke map gevonden";
                break;
            case 7:
                $errMessage="Mislukt om bestand te schrijven";
                break;
            case 8:
                $errMessage="Php extentie stopte de upload";
                break;
            default:
                $errMessage="Error";
                break;
        }

        $_SESSION['upload']['error'] = $errMessage;
        header('location: gegevens-wijzigen-form.php');
        exit();
    }
    if ($newFile['size'] > 2097152) { // if bigger than 2mb (2*1024*1024)
        $_SESSION['upload']['error'] = "Bestand is te groot";
        header('location: gegevens-wijzigen-form.php');
        exit();
    }

//    switch (substr($_FILES['profilePicture'],-4)) {
//        case ".png":
//        case ".jpg":
//        case ".gif":
//            //upload file
//            move_uploaded_file($_FILES['profilePicture'], $dest.date("YmdHis")."_".$_FILES['profilePicture']);
//            break;
//        default:
//            //error
//
//            break;
//    }
}

//$file_parts = pathinfo($filename);
//$file_parts['extension'];


//["name"] ["type"] ["tmp_name"] ["error"] ["size"]

// ["type"]=> string(10) "image/jpeg"
// ["type"]=> string(9) "image/png"
// ["type"]=> string(9) "image/gif"


// $dest.date("YmdHis")
