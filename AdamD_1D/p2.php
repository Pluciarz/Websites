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
        Podaj imie<input type="text" name="imie"><br> 
        <!-- // są rozne typy np: password zagwiazdkowuje, date to data, hidden będzie ukryte itp. -->
        <input type="submit" value="Wyślij"><br>
        <input type="reset" value="Czyść">
    </form>
    <?php
    $imie=$_POST["imie"];
    echo("Witaj $imie");
    ?>
</body>
</html>