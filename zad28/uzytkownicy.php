<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section class="h_lewy">
            <h2>Nasze osiedle</h2>
        </section>
        <section class="h_prawy">
            <?php
            $con = mysqli_connect("localhost", "root", "", "portal");
            $query = "SELECT COUNT(*) FROM `dane`;";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            echo ("<h5>Liczba użytkowników portalu: $row[0]</h5>");
            ?>
        </section>
    </header>
    <main>
        <section class="m_lewy">
            <h3>Logowanie</h3>
            <form action="" method="POST">
                <label for="login">login</label><br>
                <input type="text" name="login" id="login"><br>
                <label for="haslo">hasło</label><br>
                <input type="password" name="haslo" id="haslo"><br>
                <input type="submit" value="Zaloguj" name="submit">
            </form>
        </section>
        <section class="m_prawy">
            <h3>Wizytówka</h3>
            <section class="wizytowka">
                <?php
                $login = $_POST["login"];
                $haslo = $_POST["haslo"];
                if (!empty($login) && !empty($haslo))
                {
                    $query = "SELECT `haslo` FROM `uzytkownicy` WHERE `login`='$login';";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($result);
                    if (!empty($row[0]))
                    {
                        $haslo1 = sha1($haslo);
                        if ($row["haslo"] == $haslo1)
                        {
                            $query = "SELECT `login`, `rok_urodz`, `przyjaciol`, `hobby`, `zdjecie` FROM `uzytkownicy` INNER JOIN `dane` ON `uzytkownicy`.`id`=`dane`.`id` WHERE `login`='$login';";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_array($result);
                            $year = date("Y");
                            $wiek = $year - $row["rok_urodz"];
                            echo ("<img src='$row[zdjecie]' alt='osoba'><h4>$row[login]($wiek)</h4><p>hobby: $row[hobby]</p><h1><img src='icon-on.png' alt='serce'>$row[przyjaciol]</h1><br><form action='dane.html' method='POST'><input type='submit' class='button' value='Więcej informacji'></form>");
                        }
                        else
                        {
                            echo ("hasło nieprawidłowe");
                        }
                    }
                    else
                    {
                        echo ("login nie istnieje");
                    }
                }
                ?>
            </section>
        </section>
    </main>
    <footer>
        Stronę wykonał: Adam Dąbrowski
    </footer>
</body>
</html>