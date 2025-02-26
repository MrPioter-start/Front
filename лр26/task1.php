<?php
$filename = "counter.dat";
$fp = @fopen($filename, "r");

if ($fp) {
    $counter = fgets($fp, 10);
    fclose($fp);
} else {
    $counter = 0;
}

$counter++;
echo $counter;

$fp = @fopen($filename, "w");
if ($fp) {
    fputs($fp, $counter);
    fclose($fp);
}
