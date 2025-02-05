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
        Podaj Email<input type="text" name="Email"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść"><br>
    </form>
    <?php
    $Email=$_POST["Email"];
    if(preg_match("/^([A-Z]|[a-z]|[0-9]){4,20}@([A-Z]|[a-z]|[0-9]){2,10}(.pl|.com)$/", $Email))
    {
        echo("Podany email jest poprawny");
    }
    else
    {
        echo("Podany email jest niepoprawny");
    }
    ?>
</body>
</html>