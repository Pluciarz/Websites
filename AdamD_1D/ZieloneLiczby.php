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
    $ZieloneLiczby = fopen("ZieloneLiczby.txt", "r");
    $Rozmiar = filesize("ZieloneLiczby.txt");
    $Zawartosc = fread($ZieloneLiczby, $Rozmiar);
    fclose($ZieloneLiczby);
    $x = strlen($Zawartosc);
    for ($i = 0; $i < $x; $i++) 
    {
        echo ("<img src='$Zawartosc[$i].png'>");
    }
    $ZieloneLiczby = fopen("ZieloneLiczby.txt", "w");
    $Zawartosc++;
    fwrite($ZieloneLiczby, $Zawartosc);
    fclose($ZieloneLiczby);
    ?>
</body>

</html>