<?php
session_name("SESS1");
session_start();

if (isset($_SESSION['a'])) {
    $a = $_SESSION["a"];
} else {
    $a = 0;
}

$a++;
$_SESSION["a"] = $a;

echo "<html><body style='background-color: 	#AD66D5; color:#FFFF00; font-size: 24px; text-align: center; display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;'>  
<span style=' background-color: 	#BFBF30; padding: 5px; border-radius: 5px'>Нажмите Reload, чтобы увеличить счетчик<br />Счетчик: $a </span>";
echo "<br /> <a href='example2.php' style = 'color:	#48036F; text-decoration: none; margin-top: 20px; background-color: 	#9F3ED5; padding: 5px; border-radius: 5px	'>Перейти на 2 пример чтобы посмотреть работу сессии</a>";
echo "</body></html>";
