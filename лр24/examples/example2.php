<?php //эта программа напечатает все четные цифры 
$i = 1;
while ($i < 10) { // печатаем цифру, если она четная 
    if ($i % 2 == 0) echo "$i <br>";
    // увеличиваем $i на единицу 
    $i++;
}
