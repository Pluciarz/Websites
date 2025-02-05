<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <form method="POST">
        Podaj liczbę<input type="number" name="Liczba"><br>
            <input type="submit" value="Oblicz silnię">
            <input type="reset" value="Czyść">
        </form>
<body>
    <?php
    $Liczba=$_POST["Liczba"];
    $Wynik=1;
    for ($i=1; $i<=$Liczba; $i++)
    {
        $Wynik=$Wynik*$i;
    }
    echo("$Wynik");
    ?>
</body>
</html>