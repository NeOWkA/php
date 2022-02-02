<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("IMG_BIG", ROOT . "/gallery_img/big/");
define("IMG_SMALL", ROOT . "/gallery_img/small/");

function getImages($path)
{
    return array_splice(scandir($path), 2);
}

$images = getImages(IMG_BIG);

if (!empty($_FILES)) {
    var_dump($_FILES['myFile']);
    $path_big = IMG_BIG . $_FILES['myFile']['name'];
    $path_small = IMG_SMALL . $_FILES['myFile']['name'];
    var_dump($path_big);
    var_dump($path_small);
    if (move_uploaded_file($_FILES['myFile']['tmp_name'], $path_big)) {
        $image = new SimpleImage();
        $image->load($path_big);
        $image->resizeToWidth(150);
        $image->save($path_small);
        header("Location: /");
    } else {
        echo "Error<br>";
        die();
    }
}
$images = getImages(IMG_BIG);

include "classSimpleImage.php";
include "mygallery.php";