<?php
$db = mysqli_connect('localhost:3306','root','','shop');

$message = '';
$buttonText = "Добавить";
$action = "add";
$row = [];

$messages = [
    'ok' => 'Сообщение добавлено',
    'delete' => 'Сообщение удалено',
    'edit' => 'Сообщение изменено',
    'error' => 'Ошибка'
];

if ($_GET['action'] == 'add') {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
    $sql = "INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')";
    mysqli_query($db, $sql);
    header('Location: /?message=ok');
    die();
}


if ($_GET['action'] == 'edit') {
    $id = (int)$_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM feedback WHERE id = {$id}");
    if ($result) $row = mysqli_fetch_assoc($result);
    $buttonText = "Править";
    $action = "save";
}

if ($_GET['action'] == 'save') {
    $id = (int)$_POST['id'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
    $sql = "UPDATE feedback SET name='{$name}', feedback='{$feedback}' WHERE id = {$id}";
    mysqli_query($db, $sql);

    header('Location: /?message=edit');
    die();
}

    if ($_GET['action'] == 'delete') {

    //Удаление
    header('Location: /?message=delete');
    die();
}


$feedbacks = mysqli_query($db, "SELECT * FROM feedback ORDER BY id DESC");


if (isset($_GET['message'])) {
    $message = $messages[$_GET['message']];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2>Отзывы</h2>
<?=$message?><br>
<form action="index.php?action=<?=$action?>" method="post">
    <input type="text" name="id" value="<?=$row['id']?>" hidden>
    <input placeholder="Ваше имя" type="text" name="name" value="<?=$row['name']?>"><br>
    <input placeholder="Ваш отзыв" type="text" name="feedback" value="<?=$row['feedback']?>"><br>
    <input type="submit" value="<?=$buttonText?>">
</form>
<hr>
<div>
    <?php foreach ($feedbacks as $feedback):?>
        <b><?=$feedback['name']?> :</b> <?=$feedback['feedback']?> <a href="?action=edit&id=<?=$feedback['id']?> ">[edit]</a>
        <br>
    <?php endforeach;?>
</div>
</body>
</html>
