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
        imie :<input type="text" name="imie"><br>
        klasa:<br><select name="klasa">
            <option value="technik programista">technik programista</option>
            <option value="technik informatyk">technik informatyk</option>
            <option value="technik teleinformatyk">technik teleinformatyk</option>
        </select><br><br>
        <input type="reset" value="czysc">
        <input type="submit" value="wybierz">
    </form>
    <?php
    $imie=$_POST["imie"];
    $klasa=$_POST["klasa"];
    if (empty($imie) || preg_match("/[^A-Za-z]/", $imie) || isset($_COOKIE["Wybor"]))
    {
        echo("Wpisz odpowiednie dane (w polu imię wpisz swoje imię lub usuń ze swojego imienia cyfry lub wypełniłeś już formularz)");
    }
    else
    {
    setcookie("Wybor", "1", time()+600);
    echo("Jestem <i>$imie</i>, jestem w klasie <i>$klasa</i>");
    }
    ?>
</body>
</html>