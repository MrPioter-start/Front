<?php
session_start();
$_SESSION['a'] = "Pioter";
echo "Переменная 'a' сохранена в сессию. Перейдите на <a href='task3_2.php'>другую страницу</a>.";
