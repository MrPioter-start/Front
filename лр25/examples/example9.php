<?php
$мнение1 = array(1, "Катя" => "умная", 2, "Женя" => "красивая", 3);
$мнение2 = array(4, "Женя" => "глупая", 5, "Катя" => "милая");
echo  "1 + 2:<br>";
print_r(array_merge($мнение1, $мнение2));
echo  "<br>2 + 1:<br>";
print_r(array_merge($мнение2, $мнение1));
