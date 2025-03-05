<?php
session_start();
if (isset($_SESSION['a'])) {
    echo "Значение переменной 'a' из сессии: " . $_SESSION['a'];
} else {
    echo "Переменная 'a' не найдена в сессии.";
}
