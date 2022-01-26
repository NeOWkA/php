<?php
$a = rand(-100, 100);
$b = rand(-100, 100);
if ($a >= 0 && $b >=0) {
    $result = "a = {$a},  b = {$b}, оба положительные";
}
elseif ($a < 0 && $b <0) {
    $result = "a = {$a},  b = {$b}, оба отрицательные";
}
else {
    $result = "a = {$a},  b = {$b}, разных знаков";
}
echo $result;