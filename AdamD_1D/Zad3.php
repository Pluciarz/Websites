<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Podaj podstawę<input type="number" name="Podstawa"><br>
        Podaj wykładnik<input type="number" name="Wykładnik"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść">
    </form>
    <?php
        $Podstawa=$_POST["Podstawa"];
        $Wykładnik=$_POST["Wykładnik"];
        $Wynik=1;
        for($i=1;$i<=$Wykładnik;$i++)
        {
            $Wynik=$Wynik*$Podstawa;
        }
        if ($Wykładnik=="0")
        {
        echo("$Podstawa<sup>$Wykładnik</sup>=1");
        }
        else
        {
            echo("$Podstawa<sup>$Wykładnik</sup>=$Wynik");
        }
    ?>
</body>
</html>