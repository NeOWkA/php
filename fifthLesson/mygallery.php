<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen"/>
</head>

<body>
<div class="message"><?=$message?></div>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($result as $filename): ?>
              <a class="photo" href="/image.php?id=<?= $filename['id'] ?>"/><img src="/gallery_img/small/<?= $filename['filename'] ?>" width="150" /></a>
        <?php endforeach; ?>
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
