<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia samochodów</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Wypożyczalnia samochodów</h1>
    </header>
    <nav>
        <a href="rejestracja.php">Rejestracja</a>
        <?php
        error_reporting(0);
        session_start();
        if (isset($_SESSION["login"]))
        {
            if ($_SESSION["login"] == "admin")
            {
                echo ("<a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form>");
            }
            else
            {
                echo ("<a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form>");
            }
        }
        else
        {
            echo ("<a href='logowanie.php'>Logowanie</a>");
        }
        if(isset($_POST["Wyloguj"]))
        {
            session_destroy();
            header("Location:logowanie.php");
        }
        ?>
    </nav>
    <main>
        <section class="powitanie">
            <?php
            setcookie("powitanie", "1");
            if (isset($_COOKIE["powitanie"]))
            {
                echo ("<p>Witaj ponownie!</p>");
            }
            else
            {
                echo ("<p>Witaj nowy użytkowniku</p>");
            }
            ?>
        </section>
        <section class="oferty-tytul">
            <h2>Oferty:</h2>
        </section>
        <section class="oferty">
            <?php
            $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
            $query = "SELECT * FROM `samochody` LEFT JOIN `wypozyczenia` ON `samochody`.`nr_VIN`=`wypozyczenia`.`nr_VIN_samochodu` WHERE `nr_VIN_samochodu` IS NULL;";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result))
            {
                echo("<article><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie' class='oferta-zdjecie'><p class='oferta-model'>$row[model]</p><p class='oferta-koszt'>Koszt wypożyczenia na 1 dzień: $row[koszt_na_1_dzien] zł</p><form action='' method='POST' class='oferta-form'><input type='submit' value='Zobacz szczegóły' name='dane$row[nr_VIN]' id='dane$row[nr_VIN]' class='oferta-dane'></form></article>");
                if (isset($_POST["dane$row[nr_VIN]"]))
                {
                    $_SESSION["vin"] = $row["nr_VIN"];
                    header("Location:dane.php");
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>