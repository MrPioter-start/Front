<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Определение дня недели</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" class="form-container">
        <label>Введите вашу дату рождения (гггг-мм-дд):</label>
        <input type="date" name="birthday" required />
        <input type="submit" value="Определить день недели" />
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $week = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

    $date1928 = new DateTime('1928-06-13');
    $day1928Index = $date1928->format('w');
    $day1928 = $week[$day1928Index];

    echo "<label class='result'>13 июня 1928 года был: $day1928 </label>";

    if (!empty($_POST['birthday'])) {
        $birthday = new DateTime($_POST['birthday']);
        $birthdayDayIndex = $birthday->format('w');
        $birthdayDay = $week[$birthdayDayIndex];

        echo "<label class='result'>Ваш день рождения: $birthdayDay </label>";
    }
}
