<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </header>
    <section id="lewy">
        <h3>W naszych zbiorach znajdziesz dzieła następujących autorów:</h3>
        <ul>
            <?php
            $con = mysqli_connect("localhost", "root", "", "biblioteka");
            $query = "SELECT `imie`, `nazwisko` FROM `autorzy`;";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result))
            {
                echo ("<li>$row[imie] $row[nazwisko]</li>");
            }
            ?>
        </ul>
    </section>
    <section id="srodkowy">
        <h3>Dodaj nowego czytelnika</h3>
        <form action="" method="POST">
            imię: <input type="text" name="imie" id="imie"><br>
            nazwisko: <input type="text" name="nazwisko" id="nazwisko"><br>
            rok urodzenia: <input type="number" name="rok" id="rok"><br>
            <input type="submit" value="DODAJ" name="submit">
        </form>
        <?php
        if (isset($_POST["submit"]))
        {
            $imie = $_POST["imie"];
            $nazwisko = $_POST["nazwisko"];
            $rok = $_POST["rok"];
            echo ("Czytelnik $imie $nazwisko został dodany do bazy danych");
            $kod = mb_strtoupper($imie[0]).mb_strtoupper($imie[1]).mb_strtoupper($nazwisko[0]).mb_strtoupper($nazwisko[1]).$rok[2].$rok[3];
            $query = "INSERT INTO `czytelnicy` VALUES ('', '$imie', '$nazwisko', '$kod');";
            mysqli_query($con, $query);
        }
        mysqli_close($con);
        ?>
    </section>
    <section id="prawy">
        <img src="biblioteka.png" alt="książki">
        <h4>ul. Czytelnicza 25<br>12-120 Książkowice<br>tel.: 123123123<br>e-mail: <a href="mailto:biuro@biblioteka.pl">biuro@biblioteka.pl</a></h4>
    </section>
    <footer>
        <p>Projekt strony: Adam Dąbrowski</p>
    </footer>
</body>
</html>