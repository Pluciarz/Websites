<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <section class="header">
        <header class="lewy">
            <h2>Odloty z lotniska</h2>
        </header>
        <header class="prawy">
            <img src="zad6.png" alt="logotyp">
        </header>
    </section>
    <main>
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "egzamin");
            $query = "SELECT `id`, `nr_rejsu`, `czas`, `kierunek`, `status_lotu` FROM `odloty` ORDER BY `czas` DESC;";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($result))
            {
                echo ("<tr><td>$row[id]</td><td>$row[nr_rejsu]</td><td>$row[czas]</td><td>$row[kierunek]</td><td>$row[status_lotu]</td></tr>");
            }
            mysqli_close($con);
            ?>
        </table>
    </main>
    <section class="footer">
        <footer class="lewo">
            <a href="kw1.jpg" target="_blank">Pobierz obraz</a>
        </footer>
        <footer class="srodek">
            <?php
            setcookie("Ciasteczko", "Ciasteczko", time() + 60 * 60);
            if(!isset($_COOKIE["Ciasteczko"]))
            {
                echo ("<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>");
            }
            else
            {
                echo ("<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>");
            }
            ?>
        </footer>
        <footer class="prawo">
            Autor: Adam Dąbrowski
        </footer>
    </section>
</body>
</html>