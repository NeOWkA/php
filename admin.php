<?php
include "db.php";
global $session;
global $db;

if (!is_admin()) die("Доступ запрещен");
$orders = mysqli_query($db, "SELECT `id`, `name`, `phone` FROM `orders` ORDER BY `orders`.`id` DESC;");

if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "DELETE FROM `orders` WHERE `id` = {$id}");
    header("Location: /admin.php");
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php include "menu.php"; ?><br>
<div class="post_title"><h2>Админка</h2></div>
<? foreach ($orders as $order): ?>
    Номер заказа: <?= $order["id"] ?><br>
    Имя покупателя: <?= $order["name"] ?><br>
    Телефон покупателя: <?= $order["phone"] ?><br>
    <form action="order_details.php" method="post">
        <input type="text" name="id" value="<?= $order['id'] ?>" hidden/>
        <input type="submit" value="Подробности заказа">
    </form>
    <a href="?action=delete&id=<?= $order["id"] ?>">
        <button>Удалить заказ</button>
    </a>
    <hr>
<? endforeach; ?>

</body>
</html>
