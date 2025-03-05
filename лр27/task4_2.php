<?php
if (isset($_COOKIE['test_cookie'])) {
    echo "Значение cookie: " . $_COOKIE['test_cookie'];
} else {
    echo "Cookie не найдена.";
}
?>