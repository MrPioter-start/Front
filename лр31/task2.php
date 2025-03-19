<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numbers'])) {
    // Получаем массив цифр из ввода
    $input = $_POST['numbers'];
    $digits = array_map('intval', explode(',', $input));

    echo '<div class="result">';

    // Проверяем, что введено ровно 6 цифр
    if (count($digits) != 6) {
        echo "<p>Ошибка: Необходимо ввести ровно 6 цифр!</p>";
    } else {
        $validDigits = true;
        foreach ($digits as $digit) {
            if ($digit < 0 || $digit > 9) {
                $validDigits = false;
                break;
            }
        }

        if (!$validDigits) {
            echo "<p>Ошибка: Все элементы должны быть цифрами от 0 до 9!</p>";
        } else {
            echo "<p>Введенные цифры: " . implode(", ", $digits) . "</p>";

            // Генерируем все возможные перестановки
            $isLucky = false;
            $luckyPermutation = [];

            // Функция для генерации перестановок
            function permute($arr, $start, $end, &$isLucky, &$luckyPermutation)
            {
                if ($start == $end) {
                    // Проверяем, является ли текущая перестановка счастливым билетом
                    $sum1 = $arr[0] + $arr[1] + $arr[2];
                    $sum2 = $arr[3] + $arr[4] + $arr[5];

                    if ($sum1 == $sum2) {
                        $isLucky = true;
                        $luckyPermutation = $arr;
                        return;
                    }
                } else {
                    for ($i = $start; $i <= $end; $i++) {
                        // Меняем местами элементы
                        list($arr[$start], $arr[$i]) = array($arr[$i], $arr[$start]);

                        // Рекурсивно генерируем перестановки для оставшихся элементов
                        permute($arr, $start + 1, $end, $isLucky, $luckyPermutation);

                        // Возвращаем элементы на исходные позиции (backtrack)
                        list($arr[$start], $arr[$i]) = array($arr[$i], $arr[$start]);

                        // Если нашли счастливый билет, прекращаем поиск
                        if ($isLucky) return;
                    }
                }
            }

            permute($digits, 0, 5, $isLucky, $luckyPermutation);

            if ($isLucky) {
                $ticket = implode('', $luckyPermutation);
                $firstHalf = implode('', array_slice($luckyPermutation, 0, 3));
                $secondHalf = implode('', array_slice($luckyPermutation, 3, 3));
                $sum = array_sum(array_slice($luckyPermutation, 0, 3));

                echo "<p>Да, можно собрать счастливый билет: <strong>{$ticket}</strong></p>";
                echo "<p>{$firstHalf} | {$secondHalf}</p>";
                echo "<p>Сумма первых трех цифр = Сумма последних трех цифр = {$sum}</p>";
            } else {
                echo "<p>Нет, из данных цифр нельзя собрать счастливый билет.</p>";
            }
        }
    }

    echo '</div>';
}
