<?php
$a = array(1, 2, 3);
echo  "Массив \$a:";
foreach ($a as $tmp) echo " $tmp";
$k = array_push($a, 4, 5);
echo  "<br>Массив \$a после добавления:";
foreach ($a as $tmp) echo " $tmp";
echo  "<br>Его длина = $k";
