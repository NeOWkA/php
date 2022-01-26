<?php

// Задание 1
echo "Задание 1<br><br>";

$a = mt_rand(-10, 10);
$b = mt_rand(-10, 10);

echo "если a и b положительные, вывести их разность;<br>
        если а и b отрицательные, вывести их произведение;<br>
        если а и b разных знаков, вывести их сумму<br>";
		
if ($a >= 0 && $b >= 0) {
    $res = $a - $b;
    $out = "разность {$a} - {$b} = {$res}";
  }
  elseif ($a < 0 && $b < 0) {
    $res = $a * $b;
    $out = "произведение {$a} * {$b} = {$res}";
  }
  else {
    $res = $a + $b;
    $out = "сумма {$a} + {$b} = {$res}";
  }
  
echo $out;

// Задание 2
echo "<br><br><br>Задание 2<br><br>";


//вариант с рекурсией
echo "<br>Метод рекурсия<br>";
$a = mt_rand(0, 15);

echo_val($a);

function echo_val($a) {
	echo "$a ";
	if ($a == 15) return false;
	echo_val($a+1);
}

echo "<br>Метод switch";
echo "<br>";

switch ($a) {
        case 0:
            echo "{$a} "; $a++;
        case 1:
            echo "{$a} "; $a++;
        case 2:
            echo "{$a} "; $a++;
        case 3:
            echo "{$a} "; $a++;
        case 4:
            echo "{$a} "; $a++;
        case 5:
            echo "{$a} "; $a++;
        case 6:
            echo "{$a} "; $a++;
        case 7:
            echo "{$a} "; $a++;
        case 8:
            echo "{$a} "; $a++;
        case 9:
            echo "{$a} "; $a++;
        case 10:
            echo "{$a} "; $a++;
        case 11:
            echo "{$a} "; $a++;
        case 12:
            echo "{$a} "; $a++;
        case 13:
            echo "{$a} "; $a++;
        case 14:
            echo "{$a} "; $a++;
        case 15:
            echo "{$a} "; $a++;
}



// Задание 3

function sum($a, $b) {
  return $a + $b;
}

function sub($a, $b) {
  return $a - $b;
}

function mult($a, $b) {
  return $a * $b;
}

function div($a, $b) {
  return ($b!=0)?$a/$b:"Деление на 0";
}

// Задание 4
echo "<br><br><br>Задание 4<br><br>";

$arg1 = mt_rand(-10, 10);
$arg2 = mt_rand(-10, 10);
$operation = mt_rand(0, 3);

switch ($operation) {
    case '0':
      $operation = "+";
      break;
    case '1':
      $operation = "-";
      break;
    case '2':
      $operation = "*";
      break;
    case '3':
      $operation = "/";
      break;
  }
echo "arg1 = {$arg1} <br> arg2 = {$arg2} <br> operation = {$operation} <br>";

function mathOperation($arg1, $arg2, $operation) {

switch($operation) {
    case '+':
		$res = sum($arg1, $arg2);
		break;
    case '-':
		$res = sub($arg1, $arg2);
		break;
    case '*':
		$res = mult($arg1, $arg2);
		break;
    case '/':
		$res = div($arg1, $arg2);
		break;
	default: 
		$res = "Не верная операция.";
  }

  return $res;
}

echo "результат = " . mathOperation($arg1, $arg2, $operation);

// Задание 6
echo "<br><br><br>Задание 6<br><br>";

$val = mt_rand(-5, 5);
$pow = mt_rand(-10, 10);

//Вариант с отрицательными степенями
function power($val, $pow) { 
  if ($pow == 0) return 1;
    elseif ($val == 0) return 0;
		elseif ($pow < 0) {
      $pow = -$pow;
      $res = 1 / ($val * power($val, $pow - 1));
    }
    else 
      $res = $val * power($val, $pow - 1);

  return $res;  
}
echo "{$val} в степени {$pow} = " . power($val, $pow);

$val = mt_rand(-10, 10);
$pow = mt_rand(0, 10);
//Простой вариант
function power2($val, $pow) { 
  if ($pow == 0) return 1;
  return $val * power($val, $pow - 1);
}
echo "<br>";
echo "{$val} в степени {$pow} = " . power2($val, $pow);

// Задание 7
echo "<br><br><br>Задание 7<br><br>";
/*
0 часов	минут	10 часов минут 20 часов минут	30 минут  40 минут
1 час	минута	11 часов минут 21 час	минута	31 минута 41 минута
2 часа	минуты	12 часов минут 22 часа	минуты	32 минуты 42 минуты
3 часа	минуты	13 часов минут 23 часа	минуты	33 минуты 43 минуты
4 часа	минуты	14 часов минут 24 часа	минуты	34 минуты 44 минуты
5 часов	минут	15 часов минут 25		минут	35 минут  45 минут
6 часов	минут	16 часов минут 26		минут	36 минут  46 минут 
7 часов минут	17 часов минут 27		минут	37 минут  47 минут
8 часов	минут	18 часов минут 28		минут	38 минут  48 минут 
9 часов минут	19 часов минут 29		минут	39 минут  49 минут
*/

$hour = date('G');
$min = date('i');
$sec = date('s');

echo "$hour " . get_word($hour,"hours") . " $min " . get_word($min,"min") . " $sec ";

function get_word($number, $format) {
	//сначала реализуем логику получения варианта окончания
	if ($number > 10 && $number <= 20) $message = 1;
		else {
			switch ($number % 10) {
				case 1:
					$message = 2; break;
				case 2:
				case 3:
				case 4:
					$message = 3; break;
				default: 
					$message = 1;
				}
		}
	//затем отдельно добавим само окончание по полученному варианту
	if ($format=="hours") 
		switch ($message) {
			case 1: return "часов";
			case 2: return "час";
			case 3: return "часа";
		}
	if ($format=="min") 	
		switch ($message) {
			case 1: return "минут";
			case 2: return "минута";
			case 3: return "минуты";
		}	
}
