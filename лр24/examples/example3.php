<?php // эта программа напечатает число 12, 
// несмотря на то, что условие цикла не выполнено 
$i = 12;
do { // если число четное, то печатаем его 
    if ($i % 2 == 0) print $i;
    // увеличиваем число на единицу 
    $i++;
} while ($i < 10);
