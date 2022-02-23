<?php

function sum($arg1, $arg2)
{
    return $arg1 + $arg2;
}

function mult($arg1, $arg2)
{
    return $arg1 * $arg2;
}

function div($arg1, $arg2)
{
    if ($arg2 != 0) {
        return $arg1 / $arg2;
    } else {
        return "на ноль делить нельзя";
    }
}

function sub($arg1, $arg2)
{
    return $arg1 - $arg2;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "+":
            return sum($arg1, $arg2);
        case "*":
            return mult($arg1, $arg2);
        case "/":
            return div($arg1, $arg2);
        case "-":
            return sub($arg1, $arg2);
    }
}

$arg1 = 0;
$arg2 = 0;
$result = 0;
$operation = 0;


if (!empty($_GET)) {
    $arg1 = $_GET['arg1'];
    $arg2 = $_GET['arg2'];
    $operation = $_GET['operation'];
    $result = mathOperation($arg1, $arg2, $operation);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>

<form action="" method="get">
    <input type="text" name="arg1" value="<?= $arg1 ?>">
    <select name="operation">
        <option <?php if ($_GET['operation'] == '+') echo 'selected' ?>>+</option>
        <option <?php if ($_GET['operation'] == '*') echo 'selected' ?>>*</option>
        <option <?php if ($_GET['operation'] == '/') echo 'selected' ?>>/</option>
        <option <?php if ($_GET['operation'] == '-') echo 'selected' ?>>-</option>
    </select>


    <input type="text" name="arg2" value="<?= $arg2 ?>">
    <input type="submit" value="=">
    <input readonly type="text" name="result" value="<?= $result ?>">

</form>


</body>
</html>
