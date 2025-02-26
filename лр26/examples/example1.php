<?php
date_default_timezone_set('Europe/Moscow');

$filename = "example.txt";
$file = fopen($filename, "r");

if (!$file) {
    die("Не удалось открыть файл '$filename'. Пожалуйста, проверьте, существует ли он и доступен ли для чтения.");
}

while ($line = fgets($file)) {
    echo $line . "<br>";
}
fclose($file);

$counterFile = "counter.dat";
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, "0");
}

$fp = fopen($counterFile, "r+");
if (!$fp) {
    die("Не удалось открыть файл счётчика '$counterFile'.");
}

$counter = (int)fgets($fp);
rewind($fp);
fwrite($fp, ++$counter);
fclose($fp);
echo "Посетителей страницы: $counter<br>";

$dir = '.';
if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            $color = '';
            if (pathinfo($file, PATHINFO_EXTENSION) == 'php') {
                $color = 'style="color: purple;"';
            } elseif (pathinfo($file, PATHINFO_EXTENSION) == 'txt') {
                $content = file_get_contents($file);
                if ($content !== false) {
                    $preview = substr($content, 0, 40);
                    $file .= " - $preview";
                }
            } elseif (in_array(pathinfo($file, PATHINFO_EXTENSION), ['gif', 'jpg', 'bmp', 'png'])) {
                $file .= " (Картинка)";
            }

            echo "<p $color>$file</p>";
        }
    }
    closedir($handle);
}

echo date('l d F Y') . " р.<br>";
echo date('d.m.Y') . " р.<br>";
echo date('d/m/y') . "<br>";
echo date('H:i:s') . "<br>";
echo date('H-i') . "<br>";
echo date('d.m.Y') . "<br>";

$years = date('Y') - 1986;
echo "Прошло лет с 1986 года: $years";
