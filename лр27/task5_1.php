<?php
session_start();
$_SESSION['a'] = 10;
$_SESSION['b'] = "PHP";
$_SESSION['c'] = [1, 2, 3];

setcookie("a_cookie", $_SESSION['a'], time() + 3600);
setcookie("b_cookie", $_SESSION['b'], time() + 3600);

echo "Данные сохранены. Перейдите на <a href='task5_2.php'>другую страницу</a>.";
