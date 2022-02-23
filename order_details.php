<?php
include "db.php";
global $db;
global $session;
if (!is_admin()) die("Доступ запрещен");
$order = mysqli_query($db, "SELECT `name`, `phone` FROM `orders` WHERE `id` = {$_POST["id"]} ORDER BY `orders`.`id` DESC;");

if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "DELETE FROM `orders` WHERE `id` = {$id}");
    header("Location: /admin.php");
    die();
}
if ($_GET['action'] == 'deleteItem') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "DELETE FROM `basket` WHERE `basket`.`id` = {$id}");

    //Очистка URL
    header("Location: /admin.php");
    die();
}
$orderSessionId = mysqli_fetch_assoc(mysqli_query($db, "SELECT `session_id_basket` FROM `orders` WHERE `id`={$_POST["id"]}"));
$basket = mysqli_query($db, "SELECT basket.id basket_id, goods.image, goods.id good_id, goods.name, goods.description, goods.price FROM basket,goods WHERE basket.good_id=goods.id AND session_id='{$orderSessionId['session_id_basket']}'");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php include "menu.php"; ?><br>
<div class="post_title"><h2>Подробности заказа №<?=$_POST["id"]?></h2></div>

<? foreach ($order as $info): ?>
    Имя покупателя: <?= $info["name"] ?><br>
    Телефон покупателя: <?= $info["phone"] ?><br>

    <a href="?action=delete&id=<?= $_POST["id"] ?>">
        <button>Удалить заказ</button><br>
    </a>

    Состав заказа:<br>
    <? foreach ($basket as $item): ?>
        <?= $item["name"] ?>
        <div><img src='gallery_img_new/small/<?= $item["image"] ?>' width="300px"/><br>Цена: <?= $item["price"] ?>
        </div>
        <a href="?action=deleteItem&id=<?= $item["basket_id"] ?>">
            <button>Удалить товар</button>
        </a><br>
    <? endforeach; ?>
    <hr>
    <div>
        Сумма заказа:
        <?php foreach ($basket as $item): ?>
            <?php $totalSum += $item["price"] ?>
        <?php endforeach; ?>
        <?= $totalSum ?>
    </div>


    <? endforeach; ?>

</body>
</html>

