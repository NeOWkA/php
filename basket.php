<?php
//Подключаемся к БД
require "db.php";
global $db;
global $session;
if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    $result = mysqli_query($db, "SELECT `session_id` FROM `basket` WHERE `id`={$id}");
    $row = mysqli_fetch_assoc($result);


    if ($session == $row['session_id']) {
        mysqli_query($db, "DELETE FROM `basket` WHERE `basket`.`id` = {$id}");
    }

    //Очистка URL
    header("Location: /basket.php");
    die();
}

$basket = mysqli_query($db, "SELECT basket.id basket_id, goods.image, goods.id good_id, goods.name, goods.description, goods.price FROM basket,goods WHERE basket.good_id=goods.id AND session_id='{$session}'");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Корзина</title>
</head>
<body>
<div id="main">
    <?php include "menu.php"; ?>
    <div class="post_title"><h2>Корзина</h2></div>
    <a class="catalog">
        <? foreach ($basket as $item): ?>
            <?= $item["name"] ?>
            <div><img src='gallery_img_new/small/<?= $item["image"] ?>' width="300px"/><br>Цена: <?= $item["price"] ?>
            </div>
            <a href="?action=delete&id=<?= $item["basket_id"] ?>">
                <button>Удалить</button>
            </a>

            <hr>
        <? endforeach; ?>
</div>
</div>
<div>
    Сумма:
    <?php foreach ($basket as $item): ?>
        <?php $totalSum += $item["price"] ?>
    <?php endforeach; ?>
    <?= $totalSum ?>
</div>

<h2>Оформите заказ</h2>
<form action="order.php" method="post">
    <input placeholder="Ваше имя" type="text" name="name">
    <input placeholder="Телефон" type="text" name="phone">
    <input type="submit">
</form>
</body>
</html>
