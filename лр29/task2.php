<?php
$week = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
$firstDayOfYear = new DateTime('first day of January this year');
$firstDayIndex = $firstDayOfYear->format('w');
$firstDay = $week[$firstDayIndex];
echo "<br>Первый день текущего года: $firstDay";
