<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generowanie PDF</title>
    <style>
        table, th, td
        {
            border: 3px solid black;
            border-collapse: collapse;
        }
        form
        {
            display: inline;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="imie">Imie</label>
        <input type="text" name="imie" id="imie"><br>
        <label for="nazwisko">Nazwisko</label>
        <input type="text" name="nazwisko" id="nazwisko"><br>
        <input type="submit" value="Dodaj" id="dodaj" name="dodaj">
    </form>
    <form action="Tabela.php" method="POST">
        <input type="submit" value="Generuj" id="generuj" name="generuj">
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Imie</th>
            <th>Nazwisko</th>
        </tr>
    <?php
    $con=mysqli_connect("localhost", "root", "", "firma");
    $query="SELECT `id`, `imie`, `nazwisko` FROM `pracownicy`;";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
        echo ("<tr><td>$row[id]</td><td>$row[imie]</td><td>$row[nazwisko]</td></tr>");
    }
    if(isset($_POST["dodaj"]))
    {
        if(!empty($_POST["imie"]) || !empty($_POST["nazwisko"]))
        {
            mysqli_query($con, "SET NAMES 'utf8'");
            $query1="INSERT INTO `pracownicy` VALUES ('', '$_POST[imie]', '$_POST[nazwisko]', '');";
            $result1=mysqli_query($con, $query1);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        else
        {
            echo ("<p>Wypełnij dane</p>");
        }
    }
    ?>
    </table>
</body>
</html>