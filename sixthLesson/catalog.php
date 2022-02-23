<?
//Подключаемся к БД
require "db.php";

//Читаем данные этой картинки из БД
$result = mysqli_query($db, "SELECT * FROM `goods` WHERE 1");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Каталог</title>
</head>
<body>
<div id="main">
    <?php include "menu.php";?>
    <div class="post_title"><h2>Каталог</h2></div>
    <div class="catalog">
        <?
        //Выводим все картинки в цикле формируя ссылку на вторую страницу по idx
        while ($row = mysqli_fetch_assoc($result)): ?>
        <a href='show_good.php?id=<?=$row["id"]?>'><?=$row["name"]?></a>
        <div><img src='gallery_img_new/small/<?=$row["image"]?>' /><br>Цена: <?=$row["price"]?></div>
        <button type="submit" >Купить</button>
            <hr>
        <?endwhile;?>

    </div>
</div>
</body>
</html>
