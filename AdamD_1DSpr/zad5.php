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
    $Plik=fopen("pliczek4.txt", "r");
    $Rozmiar=filesize("pliczek4.txt");
    $Zawartosc=fread($Plik, $Rozmiar);
    echo("$Zawartosc");
    fclose($Plik);
    ?>
</body>
</html>