<?php
$a = array("a", "b", "c", "d", "e", "f");
echo  "\$a:";
foreach ($a as $t) echo " $t";
$b = array_slice($a, 2);
echo  "<br>array_slice(\$a, 2):";
foreach ($b as $t) echo " $t";
$b = array_slice($a, 2, -1);
echo  "<br>array_slice(\$a, 2, -1):";
foreach ($b as $t) echo " $t";
$b = array_slice($a, -2, 1);
echo  "<br>array_slice(\$a, -2, 1):";
foreach ($b as $t) echo " $t";
$b = array_slice($a, 0, 3);
echo  "<br>array_slice(\$a, 0, 3):";
foreach ($b as $t) echo " $t";
