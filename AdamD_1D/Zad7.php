<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo (" x ");
    for ($i = 1; $i < 10; $i++) 
    {
        echo ("$i ");
    }
    echo ("<br>");
    for ($i = 1; $i < 10; $i++) 
    {
        echo ("$i ");
        for ($j = 1; $j < 10; $j++) 
        {
            $wynik = $i * $j;
            echo ("$wynik ");
        }
        echo ("<br>");
    }
    ?>
</body>

</html>