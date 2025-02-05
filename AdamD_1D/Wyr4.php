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
        Podaj imię<input type="text" name="Imie"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść"><br>
    </form>
    <?php
    $Imie=$_POST["Imie"];
    if(preg_match("/^([A-ZŁŻ]{1}[a-ząęśżńłó])+/", $Imie))
    {
        echo("Podane imię jest poprawne");
    }
    else
    {
        echo("Podane imię jest niepoprawne");
    }
    ?>
</body>
</html>