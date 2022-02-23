<?
//Подключаемся к БД
require "db.php";

//Читаем данные этой картинки из БД
$result = mysqli_query($connect, "SELECT * FROM `images` WHERE 1");
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
        <?
        //Выводим все картинки в цикле формируя ссылку на вторую страницу по idx
        while ($row = mysqli_fetch_assoc($result)): ?>
           <a href='show_image.php?idx=<?=$row["idx"]?>'><img src='gallery_img/small/<?=$row["filename"]?>' /></a><?=$row["likes"]?>

        <?endwhile;?>

    </div>
</div>

</body>
</html>
