<?php
$i = 0;
do {
    if ($i === 0) {
        echo $i . " - ноль." . "<br>";
        $i++;
    } else {
    }
    $parity = ($i & 1) ? " - нечетное число." . "<br>" : " - четное число." . "<br>";
    echo $i . $parity;
    $i++;
} while ($i <= 10);