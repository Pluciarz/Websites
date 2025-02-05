<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie użytkownikami</title>
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
        <h1>Zarządzanie użytkownikami</h1>
    </header>
    <nav>
        <a href="index.php">Strona główna</a>
        <a href="admin.php">Panel administracyjny</a>
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
    <main class="uzytkownicy-main">
        <table>
            <tr>
                <th>Id</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Data urodzenia</th>
                <th>Nr Telefonu</th>
                <th>Email</th>
                <th>Login</th>
                <th>Haslo</th>
                <th>Zdjęcie</th>
                <th>Banowanie</th>
            </tr>
            <?php
            $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
            $query = "SELECT * FROM `uzytkownicy`;";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result))
            {
                if ($row["login"] != "admin")
                {
                    echo ("<tr><td>$row[id]</td><td>$row[imie]</td><td>$row[nazwisko]</td><td>$row[data_urodzenia]</td><td>$row[nr_telefonu]</td><td>$row[email]</td><td>$row[login]</td><td>$row[haslo]</td><td><img src='/wypozyczalnia/zdjecia/$row[zdjecie]' alt='Zdjęcie' class='uzytkownicy-zdjecie'></td><td><form action='' method='POST'><input type='submit' value='Zbanuj' name='$row[login]' id='$row[login]' class='uzytkownicy-button'></form></td></tr>");
                    if (isset($_POST[$row["login"]]))
                    {
                        $login = $row["login"];
                        $query = "DELETE FROM `uzytkownicy` WHERE `login` = '$login';";
                        mysqli_query($con, $query);
                    }
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