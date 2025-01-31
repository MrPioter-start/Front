<html>

<head>
    <title>Web-страница</title>
</head>

<body>
    Этот текст представляет данные, полученные в результате работы PHP 5: Сегодня
    <?php
    $todaysdate = date("m", time()) . "-" . date("d", time()) . "-" . date("Y", time());
    echo $todaysdate;
    ?>

</body>

</html>