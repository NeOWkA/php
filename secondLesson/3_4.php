<?php
function sum($a, $b)
{
    return $a + $b;
}

function mult($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    if ($b != 0) {
        return $a / $b;
    } else {
        return "на ноль делить нельзя";
    }
}

function sub($a, $b)
{
    return $a - $b;
}

function mathOperation($a, $b, $operation)
{
    switch ($operation) {
        case 0:
            return sum($a, $b);
        case 1:
            return mult($a, $b);
        case 2:
            return div($a, $b);
        case 3:
            return sub($a, $b);
    }
}

$a = rand(-100, 100);
$b = rand(-100, 100);
$operation = rand(0, 3);
echo mathOperation($a, $b, $operation);