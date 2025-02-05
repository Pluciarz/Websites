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
        Nick <input type="text" name="Nick"><br>
        Tekst <br><textarea name="Tekst" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść">
    </form>
    <?php
    $Nick=$_POST["Nick"];
    $Tekst=$_POST["Tekst"];
    $Data=date("Y-m-d H:i");
    $FajneZadanie=fopen("FajneZadanie.txt", "a");
    fwrite($FajneZadanie, "<b>$Nick $Data</b><br><i>$Tekst</i><hr>");
    fclose($FajneZadanie);
    $FajneZadanie=fopen("FajneZadanie.txt", "r");
    $Rozmiar=filesize("FajneZadanie.txt");
    $Zawartosc=fread($FajneZadanie, $Rozmiar);
    echo("$Zawartosc");
    fclose($FajneZadanie);
    ?>
</body>
</html>