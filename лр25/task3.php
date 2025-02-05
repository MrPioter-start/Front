<?php
$peoples = array(
    1 => array('fio' => 'Сонный Антон Петрович', 'age' => 20, 'sex' => 'м', 'education' => 'среднее'),
    2 => array('fio' => 'Павлова Александра Анатольевна', 'age' => 28, 'sex' => 'ж', 'education' => 'высшее'),
    3 => array('fio' => 'Никольский Алексей Николаевич', 'age' => 31, 'sex' => 'м', 'education' => 'высшее'),
    4 => array('fio' => 'Коленкова Анна Серегеевна', 'age' => 20, 'sex' => 'ж', 'education' => 'среднее'),
    5 => array('fio' => 'Питонова Карина Фёдоровна', 'age' => 21, 'sex' => 'ж', 'education' => 'среднее'),
);


function displayPeopleTable($data)
{
    if (empty($data)) {
        echo "<p>Нет данных для отображения.</p>";
        return;
    }

    echo '<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse;">';
    echo '<tr>';
    echo '<th>ФИО</th>';
    echo '<th>Возраст</th>';
    echo '<th>Пол</th>';
    echo '<th>Образование</th>';
    echo '</tr>';

    foreach ($data as $person) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($person['fio']) . '</td>';
        echo '<td>' . htmlspecialchars($person['age']) . '</td>';
        echo '<td style="background-color:' . ($person['sex'] == 'м' ? '#b3d9ff' : '#ffb3b3') . ';">' . htmlspecialchars($person['sex']) . '</td>';
        echo '<td style="background-color:' . ($person['education'] == 'высшее' ? '#b3ffb3' : '#ffe6cc') . ';">' . htmlspecialchars($person['education']) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

displayPeopleTable($peoples);
