<?php
$a = array("первый" => 6, "второй" => 2, "третий" => 1);
echo  "Massiv(\$a):<br>";
foreach ($a as $k => $t) echo " $k = $t<br>";
asort($a);
echo  "asort (\$a):<br>";
foreach ($a as $k => $t) echo " $k = $t<br>";
ksort($a);
echo  "ksort (\$a):<br>";
foreach ($a as $k => $t) echo "$k = $t<br>";
