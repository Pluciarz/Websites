<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane pojazdu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    error_reporting(0);
    session_start();
    if (isset($_SESSION["vin"]))
    {
        $vin = $_SESSION["vin"];
    }
    else
    {
        header("Location:index.php");
    }
    ?>
    <header>
        <h1>Dane pojazdu <?php echo ("$vin"); ?></h1>
    </header>
    <nav>
        <a href="index.php">Strona główna</a>
        <?php
        if (isset($_SESSION["login"]))
        {
            echo ("<form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form>");
            if(isset($_POST["Wyloguj"]))
            {
                session_destroy();
                header("Location:logowanie.php");
            }
        }
        ?>
    </nav>
    <main class="dane-main">
        <?php
        if (isset($_SESSION["login"]))
        {
            $login = $_SESSION["login"];
            $con=mysqli_connect("localhost", "root", "", "wypozyczalnia");
            $query = "SELECT * FROM `samochody` WHERE `nr_VIN`='$vin';";
            $query1 = "SELECT * FROM `wypozyczenia` WHERE `nr_VIN_samochodu` = '$vin';";
            $query2 = "SELECT * FROM `uzytkownicy` WHERE `login` = '$login';";
            $result = mysqli_query($con, $query);
            $result1 = mysqli_query($con, $query1);
            $result2 = mysqli_query($con, $query2);
            $row = mysqli_fetch_array($result);
            $row1 = mysqli_fetch_array($result1);
            $row2 = mysqli_fetch_array($result2);
            $query3 = "SELECT * FROM `wypozyczenia` WHERE `id_uzytkownika`='$row2[id]'";
            $result3 = mysqli_query($con, $query3);
            $row3 = mysqli_fetch_array($result3);
            if ($login == "admin")
            {
                echo ("<p><b>Nr VIN: </b>$row[nr_VIN] <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Nr VIN' name='vin' class='dane-button'></form></p><p><b>Model: </b>$row[model] <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Model' name='model' class='dane-button'></form></p><p><b>Koszt wypożyczenia na 1 dzień: </b>$row[koszt_na_1_dzien] zł <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Koszt wypożyczenia na 1 dzień' name='koszt' class='dane-button'></form></p><p><b>Liczba miejsc: </b>$row[liczba_miejsc] <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Liczbę miejsc' name='liczba_miejsc' class='dane-button'></form></p><p><b>Liczba bagaży: </b>$row[liczba_bagazy] <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Liczbę bagaży' name='liczba_bagazy' class='dane-button'></form></p><p><b>Liczba drzwi: </b>$row[liczba_drzwi] <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Liczbę drzwi' name='liczba_drzwi' class='dane-button'></form></p><p><b>Klimatyzacja: </b>$row[klimatyzacja] <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Klimatyzację' name='klimatyzacja' class='dane-button'></form></p><p><b>Skrzynia biegów: </b>$row[skrzynia_biegow] <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Skrzynię biegów' name='skrzynia_biegow' class='dane-button'></form></p><p><b>Zdjęcie: </b></p><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie' class='dane-zdjecie'> <form action='' method='POST' class='dane-form'> <input type='submit' value='Zmień Zdjęcie' name='zdjecie' class='dane-button'></form><form action='' method='POST' class='usun-form1'><input type='submit' value='Usuń pojazd' name='usun' id='usun' class='usun-input1'></form>");
                if (isset($_POST["vin"]))
                {
                    $_SESSION["edycja"] = "vin";
                    header("Location:edycja.php");
                }
                if (isset($_POST["model"]))
                {
                    $_SESSION["edycja"] = "model";
                    header("Location:edycja.php");
                }
                if (isset($_POST["koszt"]))
                {
                    $_SESSION["edycja"] = "koszt";
                    header("Location:edycja.php");
                }
                if (isset($_POST["liczba_miejsc"]))
                {
                    $_SESSION["edycja"] = "liczba_miejsc";
                    header("Location:edycja.php");
                }
                if (isset($_POST["liczba_bagazy"]))
                {
                    $_SESSION["edycja"] = "liczba_bagazy";
                    header("Location:edycja.php");
                }
                if (isset($_POST["liczba_drzwi"]))
                {
                    $_SESSION["edycja"] = "liczba_drzwi";
                    header("Location:edycja.php");
                }
                if (isset($_POST["klimatyzacja"]))
                {
                    $_SESSION["edycja"] = "klimatyzacja";
                    header("Location:edycja.php");
                }
                if (isset($_POST["skrzynia_biegow"]))
                {
                    $_SESSION["edycja"] = "skrzynia_biegow";
                    header("Location:edycja.php");
                }
                if (isset($_POST["zdjecie"]))
                {
                    $_SESSION["edycja"] = "zdjecie";
                    header("Location:edycja.php");
                }
                if (isset($_POST["usun"]))
                {
                    $query = "DELETE FROM `samochody` WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    header("Location:index.php");
                }
                mysqli_close($con);
            }
            else if ($row1["nr_VIN_samochodu"] != $vin)
            {
                if ($row2["id"] != $row3["id_uzytkownika"])
                {
                    echo ("<p><b>Nr VIN: </b>$row[nr_VIN]</p><p><b>Koszt wypożyczenia na 1 dzień: </b>$row[koszt_na_1_dzien] zł</p><p><b>Liczba miejsc: </b>$row[liczba_miejsc]</p><p><b>Liczba bagaży: </b>$row[liczba_bagazy]</p><p><b>Liczba drzwi: </b>$row[liczba_drzwi]</p><p><b>Klimatyzacja: </b>$row[klimatyzacja]</p><p><b>Skrzynia biegów: </b>$row[skrzynia_biegow]</p><p><b>Zdjęcie: </b></p><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie'><form action='' method='POST' class='dane-form'><input type='submit' value='Wypożycz' name='wypozyczenie' id='wypozyczenie' class='dane-button'></form>");
                    if (isset($_POST["wypozyczenie"]))
                    {
                        $query = "SELECT * FROM `uzytkownicy` WHERE `login` = '$login';";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);
                        $query = "INSERT INTO `wypozyczenia` VALUES ('', '$row[id]', '$vin');";
                        mysqli_query($con, $query);
                        mysqli_close($con);
                        header("Location: ". $_SERVER["HTTP_REFERER"]);
                    }
                }
                else
                {
                    echo ("<p><b>Nr VIN: </b>$row[nr_VIN]</p><p><b>Koszt wypożyczenia na 1 dzień: </b>$row[koszt_na_1_dzien] zł</p><p><b>Liczba miejsc: </b>$row[liczba_miejsc]</p><p><b>Liczba bagaży: </b>$row[liczba_bagazy]</p><p><b>Liczba drzwi: </b>$row[liczba_drzwi]</p><p><b>Klimatyzacja: </b>$row[klimatyzacja]</p><p><b>Skrzynia biegów: </b>$row[skrzynia_biegow]</p><p><b>Zdjęcie: </b></p><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie'><p>Jeżeli chcesz wypożyczyć ten pojazd najpierw zwróc obecnie wypożyczony pojazd</p>");
                }
            }
            else
            {
                echo ("<p><b>Nr VIN: </b>$row[nr_VIN]</p><p><b>Koszt wypożyczenia na 1 dzień: </b>$row[koszt_na_1_dzien] zł</p><p><b>Liczba miejsc: </b>$row[liczba_miejsc]</p><p><b>Liczba bagaży: </b>$row[liczba_bagazy]</p><p><b>Liczba drzwi: </b>$row[liczba_drzwi]</p><p><b>Klimatyzacja: </b>$row[klimatyzacja]</p><p><b>Skrzynia biegów: </b>$row[skrzynia_biegow]</p><p><b>Zdjęcie: </b></p><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie'><form action='' method='POST' class='dane-form'><input type='submit' value='Zwróć' name='zwroc' id='zwroc' class='dane-button'></form>");
                if (isset($_POST["zwroc"]))
                {
                    $query = "DELETE FROM `wypozyczenia` WHERE `nr_VIN_samochodu` = '$vin'";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location: ". $_SERVER["HTTP_REFERER"]);
                }
            }
        }
        else
        {
            $con=mysqli_connect("localhost", "root", "", "wypozyczalnia");
            $query = "SELECT * FROM `samochody` WHERE `nr_VIN`='$vin';";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            echo ("<p><b>Nr VIN: </b>$row[nr_VIN]</p><p><b>Koszt wypożyczenia na 1 dzień: </b>$row[koszt_na_1_dzien] zł</p><p><b>Liczba miejsc: </b>$row[liczba_miejsc]</p><p><b>Liczba bagaży: </b>$row[liczba_bagazy]</p><p><b>Liczba drzwi: </b>$row[liczba_drzwi]</p><p><b>Klimatyzacja: </b>$row[klimatyzacja]</p><p><b>Skrzynia biegów: </b>$row[skrzynia_biegow]</p><p><b>Zdjęcie: </b></p><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie'><p>Jeżeli chcesz wypożyczać pojazdy musisz <a href='logowanie.php'>zalogować się</a></p>");
            mysqli_close($con);
        }
        echo ("<section class='dane-pobierz-section'><a href='pdf.php' class='dane-pobierz-a'>Pobierz dane o tym pojeździe</a></section>");
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>