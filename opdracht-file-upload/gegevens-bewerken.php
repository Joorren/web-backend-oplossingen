<?php

if (isset($_FILES['profilePicture'])) {

    $dest = "img/";

    switch (substr($_FILES['profilePicture'],-4)) {
        case ".png":
        case ".jpg":
        case ".gif":
            //upload file
            move_uploaded_file($_FILES['profilePicture'], $dest.date("YmdHis")."_".$_FILES['profilePicture']);
            break;
        default:
            //error

            break;
    }
}

//$file_parts = pathinfo($filename);
//$file_parts['extension'];