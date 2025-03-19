
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем коэффициенты
    $a = isset($_POST['a']) ? (float)$_POST['a'] : 0;
    $b = isset($_POST['b']) ? (float)$_POST['b'] : 0;
    $c = isset($_POST['c']) ? (float)$_POST['c'] : 0;

    echo '<div class="result">';
    echo "<p>Уравнение: {$a}x² + {$b}x + {$c} = 0</p>";

    if ($a == 0) {
        if ($b == 0) {
            if ($c == 0) {
                echo "<p>Уравнение имеет бесконечное множество решений.</p>";
            } else {
                echo "<p>Уравнение не имеет решений.</p>";
            }
        } else {
            $x = -$c / $b;
            echo "<p>Это линейное уравнение. x = " . round($x, 4) . "</p>";
        }
    } else {
        $discriminant = $b * $b - 4 * $a * $c;
        echo "<p>Дискриминант D = " . round($discriminant, 4) . "</p>";

        if ($discriminant > 0) {
            $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminant)) / (2 * $a);
            echo "<p>Два различных корня:</p>";
            echo "<p>x₁ = " . round($x1, 4) . "</p>";
            echo "<p>x₂ = " . round($x2, 4) . "</p>";
        } elseif ($discriminant == 0) {
            $x = -$b / (2 * $a);
            echo "<p>Один корень (кратности 2):</p>";
            echo "<p>x = " . round($x, 4) . "</p>";
        } else {
            $realPart = -$b / (2 * $a);
            $imaginaryPart = sqrt(abs($discriminant)) / (2 * $a);
            echo "<p>Комплексные корни:</p>";
            echo "<p>x₁ = " . round($realPart, 4) . " + " . round($imaginaryPart, 4) . "i</p>";
            echo "<p>x₂ = " . round($realPart, 4) . " - " . round($imaginaryPart, 4) . "i</p>";
        }
    }
    echo '</div>';
}
?>