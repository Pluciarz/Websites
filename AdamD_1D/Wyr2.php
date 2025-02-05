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
        Podaj kod pocztowy<input type="text" name="KodPocztowy"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść"><br>
    </form>
    <?php
    $KodPocztowy=$_POST["KodPocztowy"];
    if(preg_match("/^[0-9]{2}(-)[0-9]{3}$/", $KodPocztowy))
    {
        echo("Podany kod jest poprawny");
    }
    else
    {
        echo("Podany kod jest niepoprawny");
    }
    ?>
</body>
</html>