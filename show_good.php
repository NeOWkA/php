<?
//Подключаемся к БД
require "db.php";
//читаем индекс картинки из URL
$id = (int)$_GET["id"];
//Увеличиваем ей в БД количество просмотров на 1
$result = mysqli_query($db, "UPDATE `goods` SET `views` = `views` + 1 WHERE id={$id}");
//Читаем данные этой картинки из БД
$result = mysqli_query($db, "SELECT * FROM `goods` WHERE id={$id}");

//Получим одну единственную картинку в большом варианте
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
</head>

<body>
<div>
    <div><h2><?= $row["name"] ?></h2></div>
    <div>
        <div class="goodSize"><img src='gallery_img_new/big/<?= $row["image"] ?>'/></div>
        <div class="description">Описание: <?= $row["description"] ?></div>
        <div>Просмотров: <?= $row["views"] ?></div>
        <div>Цена: <?= $row["price"] ?></div>
        <button type="submit">Купить</button>
        <div><a href="catalog.php">Назад</a></div>
    </div>
</div>

</body>
</html>
