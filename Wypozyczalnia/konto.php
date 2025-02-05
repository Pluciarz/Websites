<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie kontem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Zarządzanie kontem</h1>
    </header>
    <nav>
        <a href="index.php">Strona główna</a>
        <a href="rejestracja.php">Rejestracja</a>
        <form action="" method="POST">
            <input type="submit" value="Wyloguj" name="Wyloguj" class="Wyloguj">
        </form>
    </nav>
    <main class="konto-main">
        <section>
            <?php
            error_reporting(0);
            session_start();
            if(isset($_POST["Wyloguj"]))
            {
                session_destroy();
                header("Location:logowanie.php");
            }
            if(isset($_SESSION["login"]))
            {
                if ($_SESSION["login"] == "admin")
                {
                    header("Location:admin.php");
                }
                $login=$_SESSION["login"];
                $con=mysqli_connect("localhost", "root", "", "wypozyczalnia");
                $query = "SELECT * FROM `uzytkownicy` WHERE `login`='$login';";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);
                echo ("<p><b>Imię: </b>$row[imie] <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Imię' name='imie' class='zmien-input'></form></p><p><b>Nazwisko: </b>$row[nazwisko] <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Nazwisko' name='nazwisko' class='zmien-input'></form></p><p><b>Data urodzenia: </b>$row[data_urodzenia] <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Datę urodzenia' name='data' class='zmien-input'></form></p><p><b>Numer telefonu: </b>$row[nr_telefonu] <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Numer telefonu' name='tel' class='zmien-input'></form></p><p><b>Email: </b>$row[email] <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Email' name='email' class='zmien-input'></form></p><p><b>Login: </b>$row[login] <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Login' name='login' class='zmien-input'></form></p><p><b>Hasło: </b>***** <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Hasło' name='haslo' class='zmien-input'></form><p><b>Zdjęcie: </b></p><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie' class='konto-zdjecie'> <form action='' method='POST' class='zmien-form'> <input type='submit' value='Zmień Zdjęcie' name='zdjecie' class='zmien-input'></form><form action='' method='POST' class='usun-form'><input type='submit' value='Usuń konto' name='usun' id='usun' class='usun-input'></form>");
                if (isset($_POST["imie"]))
                {
                    $_SESSION["zmiana"] = "imie";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["nazwisko"]))
                {
                    $_SESSION["zmiana"] = "nazwisko";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["data"]))
                {
                    $_SESSION["zmiana"] = "data";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["tel"]))
                {
                    $_SESSION["zmiana"] = "tel";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["email"]))
                {
                    $_SESSION["zmiana"] = "email";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["login"]))
                {
                    $_SESSION["zmiana"] = "login";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["haslo"]))
                {
                    $_SESSION["zmiana"] = "haslo";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["zdjecie"]))
                {
                    $_SESSION["zmiana"] = "zdjecie";
                    header("Location:zmiana.php");
                }
                if (isset($_POST["usun"]))
                {
                    $query = "DELETE FROM `uzytkownicy` WHERE `login` = '$login';";
                    mysqli_query($con, $query);
                    header("Location:index.php");
                }
            }
            else
            {
                header("Location:logowanie.php");
            }
            ?>
        </section>
        <section>
            <?php
            $query1 = "SELECT * FROM `wypozyczenia` WHERE `id_uzytkownika` = '$row[id]'";
            $result1 = mysqli_query($con, $query1);
            $row1 = mysqli_fetch_array($result1);
            if ($row["id"] == $row1["id_uzytkownika"])
            {
                $query2 = "SELECT * FROM `samochody` INNER JOIN `wypozyczenia` ON `samochody`.`nr_VIN`=`wypozyczenia`.`nr_VIN_samochodu` WHERE `id_uzytkownika` = '$row[id]';";
                $result2 = mysqli_query($con, $query2);
                $row2 = mysqli_fetch_array($result2);
                echo("<article class='konto-pojazd'><h2>Twój wypożyczony pojazd</h2><img src='/wypozyczalnia/zdjecia/$row2[zdjecie]' alt='Zdjęcie' class='oferta-zdjecie'><p class='oferta-model'>$row2[model]</p><p class='oferta-koszt'>Koszt wypożyczenia na 1 dzień: $row2[koszt_na_1_dzien] zł</p><form action='' method='POST' class='oferta-form'><input type='submit' value='Zobacz szczegóły' name='dane$row2[nr_VIN]' id='dane$row2[nr_VIN]' class='oferta-dane'></article>");
                if (isset($_POST["dane$row2[nr_VIN]"]))
                {
                    $_SESSION["vin"] = $row2["nr_VIN"];
                    header("Location:dane.php");
                }
            }
            mysqli_close($con);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>