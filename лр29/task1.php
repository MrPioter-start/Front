<?php
$week = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

$currentDayIndex = date('w');
$currentDay = $week[$currentDayIndex];

echo "Сегодня: $currentDay";
