 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number'])) {
        $number = (int)$_POST['number'];
        
        echo '<div class="result">';
        
        if ($number < 2) {
            echo "<p>Пожалуйста, введите число больше или равное 2.</p>";
        } else {
            echo "<p>Разложение числа {$number} на простые множители:</p>";
            
            // Функция для разложения числа на простые множители с отображением шагов
            function primeFactorization($n) {
                $originalNumber = $n;
                $factors = [];
                $steps = [];
                $divisor = 2;
                
                while ($n > 1) {
                    if ($n % $divisor == 0) {
                        $factors[] = $divisor;
                        
                        // Записываем шаг
                        $step = "$n | $divisor\n";
                        $n = $n / $divisor;
                        $step .= "$n | ";
                        $steps[] = $step;
                    } else {
                        $divisor++;
                    }
                }
                
                // Формируем результат в виде произведения
                $factorization = "";
                $counts = array_count_values($factors);
                foreach ($counts as $prime => $count) {
                    if ($factorization) {
                        $factorization .= " × ";
                    }
                    if ($count == 1) {
                        $factorization .= $prime;
                    } else {
                        $factorization .= "$prime<sup>$count</sup>";
                    }
                }
                
                return [
                    'originalNumber' => $originalNumber,
                    'factors' => $factors,
                    'factorization' => $factorization,
                    'steps' => $steps
                ];
            }
            
            $result = primeFactorization($number);
            
            // Отображаем результат
            echo "<p>{$number} = {$result['factorization']}</p>";
            
            // Отображаем шаги разложения
            echo "<p>Процесс разложения:</p>";
            echo "<div class='factorization-steps'>";
            foreach ($result['steps'] as $step) {
                echo htmlspecialchars($step);
            }
            echo "</div>";
        }
        
        echo '</div>';
    }
    ?>