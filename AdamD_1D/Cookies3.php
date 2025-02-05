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
        Podaj wartość<input type="text" name="Wartosc"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść">
    </form>
    <?php
    $Wartosc=$_POST["Wartosc"];
    setcookie("Odwiedziny", $Wartosc, time()+60*5);
    ?>
</body>
</html>