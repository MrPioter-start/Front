<?php
date_default_timezone_set('Europe/Minsk');
if (isset($_POST['reset'])) {
    setcookie('birthday', '', time() - 3600);
    echo "Данные сброшены.";
    exit;
}

if (isset($_POST['birthday'])) {
    $birthday = $_POST['birthday'];
    if (new DateTime($birthday) > new DateTime('today')) {
        echo "Дата рождения не может быть больше сегодняшней.";
    } else {
        setcookie('birthday', $birthday, time() + 86400 * 365);
    }
}

if (isset($_COOKIE['birthday'])) {
    $today = new DateTime('today');
    $birthday_date = new DateTime($_COOKIE['birthday']);
    $birthday_this_year = new DateTime(date('Y') . '-' . $birthday_date->format('m-d'));

    if ($today > $birthday_this_year) {
        $birthday_this_year->modify('+1 year');
    }

    $interval = $today->diff($birthday_this_year);
    $days_left = $interval->days;

    if ($days_left == 0) {
        echo "С днем рождения";
    } else {
        echo "До вашего дня рождения осталось $days_left дней.";
    }
}
