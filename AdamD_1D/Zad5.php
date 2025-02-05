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
        Podaj liczbę<input type="text" name="Liczba">
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść">
    </form>
    <?php
    $Liczba=$_POST["Liczba"];
    $x=strlen($Liczba);
    for($i=0; $i<$x; $i++)
    {
        switch($Liczba[$i])
        {
            case 0:
                echo("zero ");
                break;
            case 1:
                echo("jeden ");
                break;
            case 2:
                echo("dwa ");
                break;
            case 3:
                echo("trzy ");
                break;
            case 4:
                echo("cztery ");
                break; 
            case 5:
                echo("pięć ");
                break; 
            case 6:
                echo("sześć ");
                break; 
            case 7:
                echo("siedem ");
                break; 
            case 8:
                echo("osiem ");
                break; 
            case 9:
                echo("dziewięć ");
                break;
            }
    }
    ?>
</body>
</html>