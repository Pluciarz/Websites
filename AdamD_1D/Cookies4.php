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
        <input type="submit" value="KLIKNIJ MNIE" name="Guzik">
    </form>
    <?php
    $Liczba=$_COOKIE["Liczba"];
    $Guzik=$_POST["Guzik"];
    if($Guzik)
    {
        $Guzik++;
        setcookie("Liczba", $Liczba);//nie skończone
    }
    echo($Guzik)
    ?>
</body>
</html>