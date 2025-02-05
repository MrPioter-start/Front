<?
// не будет работать:
//$color = strtoupper($color);
// работает:
$colors = array('красный', 'синий', 'зеленый', 'желтый');
foreach ($colors as $key => $color) {
    $colors[$key] = strtoupper($color);
}
print_r($colors);
