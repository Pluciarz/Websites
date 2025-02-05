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
        Imię<input type="text" name="Imie"><br>
        Nazwisko<input type="text" name="Nazwisko"><br>
        <input type="submit" value="Wyślij">
    </form>
    <?php
    $Imie=$_POST["Imie"];
    $Nazwisko=$_POST["Nazwisko"];
    $Login="$Imie[0]$Nazwisko";
    if (empty("$Imie") || empty($Nazwisko))
    {
        echo("Wpisz swoje dane");
    }
    else
    {
        if (preg_match("/[0-9]/", $Imie) || preg_match("/[0-9]/", $Nazwisko))
        {
            echo("Nie wpisuj cyfr");
        }
        else
        {
            if (preg_match("/^[a-z]/", $Imie) || preg_match("/^[a-z]/", $Nazwisko))
            {
                echo("Imię i Nazwisko muszą być z dużej litery");
            }
            else
                {
                    echo("Witaj $Imie $Nazwisko. Twój login: $Login");
                }
        }
    }
    ?>
</body>
</html>