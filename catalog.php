<?php
//Подключаемся к БД
require "db.php";
global $db;
if ($_GET['action'] == 'add') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "INSERT INTO `basket`(`good_id`, `session_id`, `user_id`) VALUES ({$id}, '{$session}', {$userId})");
    //Очистка URL
    header("Location: /catalog.php");
    die();
}
if ($_GET['action'] == 'addLike') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "UPDATE `goods` SET likes=likes+1 WHERE `id`={$id}");
    //Очистка URL
    header("Location: /catalog.php");
    die();
}
//Читаем данные этой картинки из БД
$result = mysqli_query($db, "SELECT * FROM `goods`");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Каталог</title>
</head>
<body>
<div id="main">
    <?php include "menu.php"; ?>
    <div class="post_title"><h2>Каталог</h2></div>
    <a class="catalog">
        <? while ($row = mysqli_fetch_assoc($result)): ?>
            <a href='show_good.php?id=<?= $row["id"] ?>'><?= $row["name"] ?></a>
            <div><img src='gallery_img_new/small/<?= $row["image"] ?>' width="300px"/><br>Цена: <?= $row["price"] ?> руб.<br>
                Просмотрели: <?= $row["views"] ?><br>
                Понравилось: <?= $row["likes"] ?>
                <a href="?action=addLike&id=<?= $row["id"] ?>'>">
                    <button>Add like</button>
                </a>

                <br>

            </div>
            <a href="?action=add&id=<?= $row["id"] ?>">
                <button>Купить</button>
            </a>

            <hr>
        <?php endwhile; ?>

</div>
</body>
</html>
