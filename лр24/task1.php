<?php
$a = 5;
$b = 10;
$sum = $a + $b;
echo "Сумма: " . $sum . "\n";

$double_digit = $a / $b;
echo "Переменная типа double: " . $double_digit . "\n";

$integer_digit = 10;
if ($integer_digit == 10) echo "OK\n";
elseif ($integer_digit > 10) echo "Больше\n";
else echo "Меньше\n";

switch ($integer_digit) {
    case 10:
        echo "Переменная равна 10\n";
        break;
    case 20:
        echo "Переменная равна 20\n";
        break;
    case 30:
        echo "Переменная равна 30\n";
        break;
    default:
        echo "Ни одно из перечисленных условий не выполнилось\n";
}
