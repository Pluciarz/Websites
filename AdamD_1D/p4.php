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
        Podaj datę swoich urodzin<input type="text" name="DataUrodzin"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść">
    </form>
    <?php
    $Data=Date("m-d");
    $DataUrodzin = $_POST["DataUrodzin"];
    $Dzien = Date("j");
    $Miesiac = Date("n");
    $Rok= Date("Y");
    $DzienTygodnia= Date("w");
    if ($_POST["DataUrodzin"] == $Data) 
    {
        echo ("Wszystkiego Najlepszego!<br>");
    } 
    else 
    {
        echo ("Przykro mi, nie dostaniesz prezentu<br>");
    }
    switch($Miesiac)
    {
        case 1:
            $Miesiac="stycznia";
            break;
        case 2:
            $Miesiac="lutego";
            break;
        case 3:
            $Miesiac="marca";
            break;
        case 4:
            $Miesiac="kwietnia";
            break;
        case 5:
            $Miesiac="maja";
            break;
        case 6:
            $Miesiac="czerwca";
            break;
        case 7:
            $Miesiac="lipca";
            break;
        case 8:
            $Miesiac="sierpnia";
            break;
        case 9:
            $Miesiac="września";
            break;
        case 10:
            $Miesiac="października";
            break;
        case 11:
            $Miesiac="listopada";
            break;
        case 12:
            $Miesiac="grudnia";
            break;
    }
    switch($DzienTygodnia)
    {
        case 1:
            $DzienTygodnia="poniedziałek";
            break;
        case 2:
            $DzienTygodnia="wtorek";
            break;
        case 3:
             $DzienTygodnia="środa";
            break;
        case 4:
            $DzienTygodnia="czwartek";
            break;
        case 5:
            $DzienTygodnia="piątek";
            break;
        case 6:
            $DzienTygodnia="sobota";
            break;
        case 7:
            $DzienTygodnia="niedziela";
            break;
    }
    echo ("Dziś jest $Dzien $Miesiac $Rok, $DzienTygodnia");
    ?>
</body>

</html>