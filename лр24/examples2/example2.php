<?php
define("PASSWORD", "qwerty"); // Определяем константу PASSWORD с значением "qwerty"  
define("PI", "3.14", True);     // Определяем константу PI с значением "3.14" (регистронезависимая)  
echo (PASSWORD);                // Выводим значение константы PASSWORD (выведет "qwerty")  
echo constant("PASSWORD");      // Вызываем значение константы PASSWORD через функцию constant() (выведет "qwerty")  
echo (PASSWORD);                // Снова выводим значение константы PASSWORD (выведет "qwerty")  
echo PI;                        // Выводим значение константы PI (выведет "3.14")  
