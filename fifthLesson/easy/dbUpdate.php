<?php

require "db.php";

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("IMG_BIG", ROOT . "/gallery_img/big/");

$result = mysqli_query($db, "SELECT id FROM images");

if ($result -> num_rows == 0) {
    echo "Таблица пустая. Данные заполнены.";
    $images = array_splice(scandir(IMG_BIG), 2);
    mysqli_query($db, "INSERT INTO images(`filename`) VALUES ('" . implode("'),('", $images). "')");
} else{
    echo "Таблица заполнена";
}

