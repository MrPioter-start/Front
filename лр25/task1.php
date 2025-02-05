<?php
$array = array("я", "ты", "он", "она", "оно");
print_r($array);

array_push($array, "i", "you");
print_r($array);

echo ("Количество элементов = " . count($array));
for ($i = 0; $i < count($array); $i++) {
    echo ($array[$i] . "<br>");
}

sort($array);
foreach ($array as $key => $value) {
    echo (($key + 1) . ". " . $value . "<br>");
}
