<?php
if (!isset($_COOKIE['user_name'])) {
    setcookie('user_name', 'John Doe', time() + 3600);
    echo "Кука 'user_name' установлена. Обновите страницу.";
} else {
    echo "Значение куки 'user_name': " . $_COOKIE['user_name'];
}
