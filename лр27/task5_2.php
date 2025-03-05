<?php
session_start();
echo "Данные из сессии:<br>";
echo "a: " . $_SESSION['a'] . "<br>";
echo "b: " . $_SESSION['b'] . "<br>";
echo "c: " . implode(", ", $_SESSION['c']) . "<br><br>";

echo "Данные из cookies:<br>";
echo "a_cookie: " . ($_COOKIE['a_cookie'] ?? "Не найдено") . "<br>";
echo "b_cookie: " . ($_COOKIE['b_cookie'] ?? "Не найдено");
?>