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
        Podaj klasę<input type="text" name="Klasa"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść"><br>
    </form>
    <?php
    $Klasa=$_POST["Klasa"];
    if(preg_match("/^[1-5][a-i]$/", $Klasa))
    {
        echo("Podana klasa jest poprawna");
    }
    else
    {
        echo("Podana klasa jest niepoprawna");
    }
    ?>
</body>
</html>