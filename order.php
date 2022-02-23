<?php
require "db.php";
global $db;
global $session;
if (isset($_POST['name']) && isset($_POST['phone'])) {
    var_dump($session);
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $result = mysqli_query($db, "INSERT INTO `orders` (`name`, `phone`, `session_id_basket`) VALUES ('{$name}', '{$phone}', '{$session}')");
    setcookie('orderId', $session, time() + 3600);
    session_regenerate_id();
    header("Location: /order.php");
    die();
}
$orderId = mysqli_fetch_assoc(mysqli_query($db, "SELECT `id` FROM `orders` WHERE session_id_basket='{$_COOKIE['orderId']}'"));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заказ</title>
</head>
<body>
<div id="main">
    <?php include "menu.php"; ?>
    <div class="post_title"><h2>Ваш заказ №<?= $orderId['id'] ?> принят!</h2></div>
</div>
</body>
</html>