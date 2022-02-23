<?php

$messages = [
        'ok' => 'Файл загружен',
        'error' => 'Ошибка загрузки',
        'size' => 'недопустимый размер файла',
];

if (!empty($_FILES)) {
    $path = "upload/" . $_FILES['myfile']['name'];

    //Проверить можно ли грузить такой файл

    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $path)) {
        //ресайз
        $message =  "ok";

    } else {
        $message =   "error";
    }
    header("Location: 1.php?message=" . $message);
    die();
}
$message = $messages[$_GET['message']];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?=$message?><br>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" value="load">
</form>
</body>
</html>
