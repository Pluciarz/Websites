<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zgłoszenie na konkurs</h1>
    <form method="POST">
        Imię<input type="text" name="Imie"><br>
        Nazwisko<input type="text" name="Nazwisko"><br>
        <select name="Klasa">
            <option value="Wybierz">Wybierz klasę</option>
            <option value="1a">1a</option>
            <option value="1b">1b</option>
            <option value="2a">2a</option>
            <option value="2b">2b</option>
            <option value="3a">3a</option>
            <option value="3b">3b</option>
        </select><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść">
    </form>
    <?php
        $Imie=$_POST["Imie"];
        $Nazwisko=$_POST["Nazwisko"];
        $Klasa=$_POST["Klasa"];
        if (empty($Imie) || empty($Nazwisko) || ($_POST["Klasa"]=="Wybierz"))
            {
                echo("Musisz podać imię, nazwisko i klasę");
            }
        else
            {
                echo("Zgłoszenie przyjęte<br>");
                echo("$Imie $Nazwisko<br>");
                echo("Klasa $Klasa");
            }
    ?>
</body>
</html>