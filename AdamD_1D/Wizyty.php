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
    $Wizyty=fopen("Wizyty.txt", "r");
    $Rozmiar=filesize("Wizyty.txt");
    $Zawartosc=fread($Wizyty, $Rozmiar);
    fclose($Wizyty);
    echo("$Zawartosc");
    $Wizyty=fopen("Wizyty.txt", "w");
    $Zawartosc++;
    fwrite($Wizyty, $Zawartosc);
    fclose($Wizyty);
    ?>
</body>
</html>