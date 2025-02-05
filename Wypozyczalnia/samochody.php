<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie samochodami</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    error_reporting(0);
    session_start();
    if ($_SESSION["login"] != "admin")
    {
        header("Location:index.php");
    }
    ?>
    <header>
        <h1>Zarządzanie samochodami</h1>
    </header>
    <nav>
        <a href="index.php">Strona główna</a>
        <a href="admin.php">Panel administracyjny</a>
        <a href="dodawanie.php">Dodawanie samochodu</a>
        <form action="" method="POST">
            <input type="submit" value="Wyloguj" name="Wyloguj" class="Wyloguj">
        </form>
        <?php
        if(isset($_POST["Wyloguj"]))
        {
            session_destroy();
            header("Location:logowanie.php");
        }
        ?>
    </nav>
    <main class="samochody-main">
        <table>
            <tr>
                <th>Nr VIN</th>
                <th>Model</th>
                <th>Koszt na 1 dzień</th>
                <th>Liczba miejsc</th>
                <th>Liczba bagaży</th>
                <th>Liczba drzwi</th>
                <th>Klimatyzacja</th>
                <th>Skrzynia biegów</th>
                <th>Zdjęcie</th>
                <th>Edytowanie</th>
                <th>Usuwanie</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
            $query = "SELECT * FROM `samochody`;";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result))
            {
                echo ("<tr><td>$row[nr_VIN]</td><td>$row[model]</td><td>$row[koszt_na_1_dzien] zł</td><td>$row[liczba_miejsc]</td><td>$row[liczba_bagazy]</td><td>$row[liczba_drzwi]</td><td>$row[klimatyzacja]</td><td>$row[skrzynia_biegow]</td><td><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie' class='samochody-zdjecie'></td><td><form action='' method='POST'><input type='submit' value='Edytuj' name='edytuj$row[nr_VIN]' id='edytuj$row[nr_VIN]' class='samochody-button'></form></td><td><form action='' method='POST'><input type='submit' value='Usuń' name='usun$row[nr_VIN]' id='usun$row[nr_VIN]' class='samochody-usun'></form></td></tr>");
                if (isset($_POST["edytuj$row[nr_VIN]"]))
                {
                    $_SESSION["vin"] = $row["nr_VIN"];
                    header("Location:dane.php");
                }
                if (isset($_POST["usun$row[nr_VIN]"]))
                {
                    $vin = $row["nr_VIN"];
                    $query = "DELETE FROM `samochody` WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                }
            }
            mysqli_close($con);
            ?>
        </table>
    </main>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>