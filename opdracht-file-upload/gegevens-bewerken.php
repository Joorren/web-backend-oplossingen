<?php

session_start();

if (isset($_FILES['profilePicture'])) {

    $dest = "img/";
    $newFile = $_FILES['profilePicture'];

    var_dump($_FILES['profilePicture']);

    if ($newFile['error'] !== 0) {
        $_SESSION['upload']['error'] = $newFile['error'];
        header('url: gegevens-wijzigen-form.php');
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
// ["type"]=> string(9) "image/bmp"
// ["type"]=> string(9) "image/gif"