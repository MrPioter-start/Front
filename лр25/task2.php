<?php
$products = array(
    "Хлеб" => 50,
    "Молоко" => 80,
    "Яйца" => 70
);

$products["Сыр"] = 200;
$products["Колбаса"] = 150;

echo "Товары и их цены:<br>";
foreach ($products as $product => $price) {
    echo "$product: $price руб.<br>";
}

$count = count($products);
$totalCost = array_sum($products);

echo "<br>Статистика:<br>Количество товаров: $count<br>Суммарная стоимость: $totalCost руб.<br>";

echo "<br>Выберите вид сортировки:<br>1. По возрастанию цены (asort)<br>2. По убыванию цены (arsort)<br>3. В алфавитном порядке названий товаров (ksort)<br>4. В обратном алфавитном порядке названий товаров (krsort)<br>";

$choice = readline("Введите номер сортировки (1-4): ");

switch ($choice) {
    case '1':
        asort($products);
        echo "<br>Отсортировано по возрастанию цены:<br>";
        break;
    case '2':
        arsort($products);
        echo "<br>Отсортировано по убыванию цены:<br>";
        break;
    case '3':
        ksort($products);
        echo "<br>Отсортировано в алфавитном порядке названий товаров:<br>";
        break;
    case '4':
        krsort($products);
        echo "<br>Отсортировано в обратном алфавитном порядке названий товаров:<br>";
        break;
    default:
        echo "Неверный выбор!";
        exit;
}

foreach ($products as $product => $price) {
    echo "$product: $price руб.<br>";
}
