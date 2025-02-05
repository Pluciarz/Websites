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
        Podaj liczbę:<input type="text" name="Liczba1"><br>
        Podaj liczbę:<input type="text" name="Liczba2"><br>
        <input type="submit" value="wyświetl">
    </form>
    <?php
    $Liczba1=$_POST["Liczba1"];
    $Liczba2=$_POST["Liczba2"];
    $Wynik=0;
    if(preg_match("/[^0-9]/", $Liczba1) || preg_match("/[^0-9]/", $Liczba2) || $Liczba1>$Liczba2)
    {
        echo("Podaj liczby, przy czym pierwsza liczba ma ma być mniejsza od drugiej");
    }
    else
    {
        for ($i=$Liczba1; $i<=$Liczba2; $i++)
        {
            if ($i!=$Liczba2)
            {
                echo("$i+");
                $Wynik=$Wynik+$i; 
            }
            else
            {
                $Wynik=$Wynik+$i;
                echo("$i=$Wynik");
            }
        }
        $Plik=fopen("liczby.txt", "a");
        fwrite($Plik, "$Wynik;");
        fclose($Plik);
    }
    ?>
</body>
</html>