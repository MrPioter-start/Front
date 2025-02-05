<?php
$фрукты = array("яблоко", "груша", "слива", "персик");
echo  "В вазе лежали:";
foreach ($фрукты as $tmp) {
    echo  " $tmp";
}
echo  "<br>Первым съели " . array_shift($фрукты) . "<br>";
echo  "В вазе остались:";
foreach ($фрукты as $tmp) {
    echo  " $tmp";
}
