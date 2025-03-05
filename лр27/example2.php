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

echo "<html><body style='background-color: #5F2580; color: #FFFF40; font-size: 24px; text-align: center; display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;'>  
<span style='background-color: 	#BFBF30; padding: 5px; border-radius: 5px'>Нажмите Reload, чтобы увеличить счетчик<br />Счетчик: $a</span>";
echo "</body></html>";
