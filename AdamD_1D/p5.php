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
        <input type="radio" name="Profil" value="Technik Informatyk">Technik Informatyk<br>
        <input type="radio" name="Profil" value="Technik Teleinformatyk">Technik Teleinformatyk<br>
        <input type="radio" name="Profil" value="Technik Programista">Technik Programista<br>
        <input type="checkbox" name="Zgoda" checked>Wyrażam zgodę
        <textarea name="Uwagi" cols="205" rows="10"></textarea><br>
        <input type="submit" value="Wyślij"><br>
    </form>
    <?php
    $Profil=$_POST["Profil"];
    $Uwagi=$_POST["Uwagi"];
    $Zgoda=$_POST["Zgoda"];
    echo("$Profil<br>");
    echo("$Uwagi<br>");
    if ($Zgoda=="on")
    {
        echo("Wyrażano zgodę");
    }
    else
    {
        echo("Nie wyrażano zgody");
    }
    ?>
</body>
</html>