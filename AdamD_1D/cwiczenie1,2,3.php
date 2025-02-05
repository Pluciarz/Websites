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
        Imię: <input type="text" name="Imie"><br>
        Nazwisko: <input type="text" name="Nazwisko"><br>
        <select name="Klasa">
            <option value="Pierwsza">Pierwsza</option>
            <option value="Druga">Druga</option>
            <option value="Trzecia">Trzecia</option>
        </select><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Czyść"><br>
        Zobacz<input type="checkbox" name="Zobacz">
    </form>
    <?php
    $Imie=$_POST["Imie"];
    $Nazwisko=$_POST["Nazwisko"];
    $Klasa=$_POST["Klasa"];
    $Zobacz=$_POST["Zobacz"];
    echo("Witaj $Imie $Nazwisko jesteś uczniem klasy $Klasa<br>");
    $Plik=fopen("cwiczenie1,2,3.txt", "w");
    fwrite($Plik, "$Imie $Nazwisko $Klasa");
    fclose($Plik);
    $Plik=fopen("cwiczenie1,2,3.txt", "r");
    $Rozmiar=filesize("cwiczenie1,2,3.txt");
    $Zawartosc=fread($Plik, $Rozmiar);
    if($Zobacz=="on")
    {
        echo("$Zawartosc");
    }
    fclose($Plik);
    ?>
</body>
</html>