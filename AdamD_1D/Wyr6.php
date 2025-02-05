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
        Podaj datę<input type="text" name="Data"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść"><br>
    </form>
    <?php
    $Data=$_POST["Data"];
    if (preg_match("/^[0-9]{4}-([1-9]|0[1-9]|1[0-2])-([1-9]|0[1-9]|[1-2][0-9]|3[0-1])$/", $Data))
    {
        echo ("Podana data jest poprawna");
    } 
    else 
    {
        echo ("Podana data jest niepoprawna");
    }
    ?>
</body>
</html>