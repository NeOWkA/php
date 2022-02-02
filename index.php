<?php
include "classSimpleImage.php";

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("IMG_BIG", ROOT . "/gallery_img/big/");
define("IMG_SMALL", ROOT . "/gallery_img/small/");

function getImages($path)
{
    return array_splice(scandir($path), 2);
}

$images = getImages(IMG_BIG);

if (!empty($_FILES)) {
    $path_big = IMG_BIG . $_FILES['myFile']['name'];
    $path_small = IMG_SMALL . $_FILES['myFile']['name'];
    if (move_uploaded_file($_FILES['myFile']['tmp_name'], $path_big)) {
        $message = "Downloaded";
        $image = new SimpleImage();
        $image->load($path_big);
        $image->resizeToWidth(150);
        $image->save($path_small);
        header("Location: /");
    } else {
        $message = "Error";
        die();
    }
}
$images = getImages(IMG_BIG);

include "mygallery.php";