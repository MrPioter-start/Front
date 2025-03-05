<?php
$visit_count = 1;
if (isset($_COOKIE['visit_count'])) {
    $visit_count = $_COOKIE['visit_count'] + 1;
}
setcookie('visit_count', $visit_count, time() + 86400 * 30);
echo "Вы посетили наш сайт $visit_count раз!";
