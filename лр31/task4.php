<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['size'])) {
        $size = (int)$_POST['size'];
        
        echo '<div class="result">';
        
        if ($size % 2 == 0) {
            echo "<p>Для данного алгоритма поддерживаются только нечетные размеры (3, 5, 7, ...).</p>";
        } else {
            echo "<p>Магический квадрат размером {$size}×{$size}:</p>";
            
            // Генерация магического квадрата с добавлением случайности
            function generateMagicSquare($n) {
                // Базовая реализация стандартного метода
                $magicSquare = array_fill(0, $n, array_fill(0, $n, 0));
                
                // Добавляем случайное смещение для начальных координат
                // Это гарантирует, что каждый раз будет генерироваться разный квадрат
                $row = mt_rand(0, $n-1);
                $col = mt_rand(0, $n-1);
                
                // Заполнение квадрата
                for ($num = 1; $num <= $n * $n; $num++) {
                    $magicSquare[$row][$col] = $num;
                    
                    // Вычисление следующей позиции с вариациями
                    $row_direction = -1;  // Стандартное направление вверх
                    $col_direction = 1;   // Стандартное направление вправо
                    
                    // С некоторой вероятностью меняем направление движения
                    if (mt_rand(0, 100) < 50) {
                        // Выбираем одно из альтернативных направлений
                        $directions = [
                            [-1, 1],  // вверх-вправо (стандартное)
                            [1, 1],   // вниз-вправо
                            [-1, -1], // вверх-влево
                            [1, -1]   // вниз-влево
                        ];
                        
                        $random_dir = $directions[mt_rand(0, 3)];
                        $row_direction = $random_dir[0];
                        $col_direction = $random_dir[1];
                    }
                    
                    // Вычисляем новую позицию с учетом направления
                    $newRow = ($row + $row_direction + $n) % $n;
                    $newCol = ($col + $col_direction + $n) % $n;
                    
                    // Если клетка уже занята или с определенной вероятностью
                    if ($magicSquare[$newRow][$newCol] != 0 || mt_rand(0, 100) < 20) {
                        // Используем дополнительное правило - идем в другом направлении
                        $alternate_directions = [
                            [1, 0],   // вниз
                            [0, 1],   // вправо
                            [0, -1],  // влево
                            [-1, 0]   // вверх
                        ];
                        
                        $alt_dir = $alternate_directions[mt_rand(0, 3)];
                        $newRow = ($row + $alt_dir[0] + $n) % $n;
                        $newCol = ($col + $alt_dir[1] + $n) % $n;
                        
                        // Если и эта клетка занята, используем стандартное правило
                        if ($magicSquare[$newRow][$newCol] != 0) {
                            $newRow = ($row + 1) % $n;
                            $newCol = $col;
                        }
                    }
                    
                    $row = $newRow;
                    $col = $newCol;
                }
                
                // Проверяем полученный квадрат на "магичность"
                $isValid = validateMagicSquare($magicSquare);
                
                // Если квадрат не является магическим, применяем трансформации
                if (!$isValid) {
                    $magicSquare = transformToMagicSquare($magicSquare, $n);
                }
                
                return $magicSquare;
            }
            
            // Проверка квадрата на "магичность"
            function validateMagicSquare($square) {
                $n = count($square);
                $magicConstant = $n * ($n * $n + 1) / 2 / $n;
                
                // Проверяем строки
                for ($i = 0; $i < $n; $i++) {
                    if (array_sum($square[$i]) != $magicConstant * $n) {
                        return false;
                    }
                }
                
                // Проверяем столбцы
                for ($j = 0; $j < $n; $j++) {
                    $sum = 0;
                    for ($i = 0; $i < $n; $i++) {
                        $sum += $square[$i][$j];
                    }
                    if ($sum != $magicConstant * $n) {
                        return false;
                    }
                }
                
                // Проверяем диагонали
                $diag1 = $diag2 = 0;
                for ($i = 0; $i < $n; $i++) {
                    $diag1 += $square[$i][$i];
                    $diag2 += $square[$i][$n - $i - 1];
                }
                
                if ($diag1 != $magicConstant * $n || $diag2 != $magicConstant * $n) {
                    return false;
                }
                
                return true;
            }
            
            // Трансформация квадрата в магический
            function transformToMagicSquare($square, $n) {
                // Если наш случайный подход не создал магический квадрат,
                // используем более надежный алгоритм - сиамский метод
                $magicSquare = array_fill(0, $n, array_fill(0, $n, 0));
                
                // Начальная позиция
                $row = 0;
                $col = floor($n / 2);
                
                for ($num = 1; $num <= $n * $n; $num++) {
                    $magicSquare[$row][$col] = $num;
                    
                    // Следующая позиция (вверх-вправо)
                    $newRow = ($row - 1 + $n) % $n;
                    $newCol = ($col + 1) % $n;
                    
                    // Если клетка уже занята
                    if ($magicSquare[$newRow][$newCol] != 0) {
                        $newRow = ($row + 1) % $n;
                        $newCol = $col;
                    }
                    
                    $row = $newRow;
                    $col = $newCol;
                }
                
                // Произведем дополнительные случайные трансформации,
                // которые сохраняют магичность
                
                // 1. Случайное количество поворотов квадрата
                $rotations = mt_rand(0, 3);
                for ($r = 0; $r < $rotations; $r++) {
                    $magicSquare = rotateMagicSquare($magicSquare, $n);
                }
                
                // 2. Случайное отражение
                if (mt_rand(0, 1) == 1) {
                    $magicSquare = reflectMagicSquare($magicSquare, $n, 'horizontal');
                }
                
                if (mt_rand(0, 1) == 1) {
                    $magicSquare = reflectMagicSquare($magicSquare, $n, 'vertical');
                }
                
                return $magicSquare;
            }
            
            // Поворот квадрата
            function rotateMagicSquare($square, $n) {
                $rotated = array_fill(0, $n, array_fill(0, $n, 0));
                
                for ($i = 0; $i < $n; $i++) {
                    for ($j = 0; $j < $n; $j++) {
                        $rotated[$j][$n - 1 - $i] = $square[$i][$j];
                    }
                }
                
                return $rotated;
            }
            
            // Отражение квадрата
            function reflectMagicSquare($square, $n, $direction) {
                $reflected = array_fill(0, $n, array_fill(0, $n, 0));
                
                if ($direction == 'horizontal') {
                    // Отражение по горизонтали
                    for ($i = 0; $i < $n; $i++) {
                        for ($j = 0; $j < $n; $j++) {
                            $reflected[$n - 1 - $i][$j] = $square[$i][$j];
                        }
                    }
                } else {
                    // Отражение по вертикали
                    for ($i = 0; $i < $n; $i++) {
                        for ($j = 0; $j < $n; $j++) {
                            $reflected[$i][$n - 1 - $j] = $square[$i][$j];
                        }
                    }
                }
                
                return $reflected;
            }
            
            // Вычисление магической суммы
            function calculateMagicSum($square) {
                $n = count($square);
                
                // Вычисляем сумму первой строки как эталон
                $magicSum = array_sum($square[0]);
                
                return $magicSum;
            }
            
            // Генерируем магический квадрат
            $magicSquare = generateMagicSquare($size);
            $magicSum = calculateMagicSum($magicSquare);
            
            // Добавим немного случайности - с вероятностью 50% 
            // выполним перестановку значений, сохраняющую магичность
            if (mt_rand(0, 1) == 1) {
                // Заменим каждое число i на (n² + 1 - i), 
                // где n - размер квадрата
                $n_squared_plus_one = $size * $size + 1;
                for ($i = 0; $i < $size; $i++) {
                    for ($j = 0; $j < $size; $j++) {
                        $magicSquare[$i][$j] = $n_squared_plus_one - $magicSquare[$i][$j];
                    }
                }
            }
            
            // Отображаем магический квадрат в виде таблицы
            echo "<table class='magic-square'>";
            for ($i = 0; $i < $size; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $size; $j++) {
                    echo "<td>{$magicSquare[$i][$j]}</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            
            // Выводим магическую сумму
            echo "<p class='magic-sum'>Магическая сумма: {$magicSum}</p>";
            
            // Проверяем суммы по строкам, столбцам и диагоналям
            echo "<p>Проверка сумм:</p>";
            echo "<ul>";
            
            // Строки
            for ($i = 0; $i < $size; $i++) {
                $rowSum = array_sum($magicSquare[$i]);
                echo "<li>Строка " . ($i+1) . ": $rowSum</li>";
            }
            
            // Столбцы
            for ($j = 0; $j < $size; $j++) {
                $colSum = 0;
                for ($i = 0; $i < $size; $i++) {
                    $colSum += $magicSquare[$i][$j];
                }
                echo "<li>Столбец " . ($j+1) . ": $colSum</li>";
            }
            
            // Диагонали
            $diag1Sum = 0;
            $diag2Sum = 0;
            for ($i = 0; $i < $size; $i++) {
                $diag1Sum += $magicSquare[$i][$i];
                $diag2Sum += $magicSquare[$i][$size - 1 - $i];
            }
            echo "<li>Главная диагональ: $diag1Sum</li>";
            echo "<li>Побочная диагональ: $diag2Sum</li>";
            
            echo "</ul>";
            
            // Добавляем случайную метку для уникальности
            echo "<p><small>Идентификатор генерации: " . md5(microtime()) . "</small></p>";
        }
        
        echo '</div>';
    }
    ?>