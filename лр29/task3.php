<?php
$fridays13 = [];
for ($month = 1; $month <= 12; $month++) {
    $date = new DateTime("13-$month-" . date('Y'));
    if ($date->format('w') == 5) {
        $fridays13[] = $date->format('d-m-Y');
    }
}

echo "<br>Пятницы 13-го числа в текущем году: " . implode(', ', $fridays13);
