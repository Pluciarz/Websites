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
        Podaj pesel<input type="text" name="Pesel"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść"><br>
    </form>
    <?php
    $Pesel=$_POST["Pesel"];
    if(preg_match("/^[0-9]{11}$/", $Pesel))
    {
        echo("Podany PESEL jest poprawny");
    }
    else
    {
        echo("Podany PESEL jest niepoprawny");
    }
    ?>
</body>
</html>