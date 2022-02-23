<?php
include 'functions.php';

$id = (int)$_GET['id'];

$result = mysqli_query($db, "SELECT * FROM `images` WHERE id = {$id}");

$filename = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div class="message"><?=$message?></div>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
            <img src="/gallery_img/small/<?= $filename['filename'] ?>"/>
    </div>
</div>
<div class="dlForm">
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myFile">
        <input type="submit" value="Load">
    </form>
</div>
</body>
</html>

