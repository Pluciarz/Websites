<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane osobowe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dane osobowe pracowników</h1>
    </header>
    <main>
        <section class="lewy">
            <ul>
                <li><a href="index.php">Wyświetl dane</a></li>
                <li><a href="formularz.php">Wpisz dane</a></li>
            </ul>
        </section>
        <section class="prawy">
            <h2>Dane osobowe</h2>
            <table>
                <?php
                $con = mysqli_connect("localhost", "root", "", "firma");
                $query = "SELECT * FROM `pracownicy`;";
                $result = mysqli_query($con, $query);
                echo ("<tr><th>Id</th><th>Nazwisko</th><th>Imię</th><th>PESEL</th></tr>");
                while ($row = mysqli_fetch_array($result))
                {
                    echo ("<tr><td>$row[id]</td><td>$row[nazwisko]</td><td>$row[imie]</td><td>$row[PESEL]</td></tr>");
                }
                mysqli_close($con);
                ?>
            </table>
        </section>
    </main>
    <footer>
        <h5>AUTOR strony: Adam Dąbrowski</h5>
    </footer>
</body>
</html>