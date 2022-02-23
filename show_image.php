<?
//Подключаемся к БД
require "db.php";
//читаем индекс картинки из URL
$id = (int)$_GET["id"];
//Увеличиваем ей в БД количество просмотров на 1
$result = mysqli_query($db, "UPDATE `images` SET `likes` = `likes` + 1 WHERE id={$id}");
//Читаем данные этой картинки из БД
$result = mysqli_query($db, "SELECT * FROM `images` WHERE id={$id}");

//Получим одну единственную картинку в большом варианте
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">


        <img src='gallery_img/big/<?= $row["filename"] ?>'/><?= $row["likes"] ?>

        <br>
        <a href="index.php">Назад</a>
    </div>
</div>

</body>
</html>