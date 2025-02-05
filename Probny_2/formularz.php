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
            <h2>Podaj dane</h2>
            <form action="" method="POST">
                <label for="nazwisko">Nazwisko</label><br>
                <input type="text" name="nazwisko" id="nazwisko"><br>
                <label for="imie">Imię</label><br>
                <input type="text" name="imie" id="imie"><br>
                <label for="pesel">PESEL</label><br>
                <input type="number" name="pesel" id="pesel"><br>
                <input type="submit" value="Sprawdź i zapisz">
            </form>
            <section class="panel">
                <?php
                error_reporting(0);
                $con = mysqli_connect("localhost", "root", "", "firma");
                $nazwisko = $_POST["nazwisko"];
                $imie = $_POST["imie"];
                $pesel = $_POST["pesel"];
                if (empty($nazwisko))
                {
                    echo ("brak nazwiska<br>");
                }
                if (empty($imie))
                {
                    echo ("brak imienia<br>");
                }
                if (empty($pesel))
                {
                    echo ("brak numeru PESEL");
                }
                if (!empty($nazwisko) && !empty($imie) && !empty($pesel))
                {
                    $wagi = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
                    $suma = 0;
                    for ($i = 0; $i < 10; $i++)
                    {
                        $suma += $pesel[$i] * $wagi[$i];
                    }
                    $reszta = $suma % 10;
                    if ($reszta == 0)
                    {
                        $cyfraKontrolna = 0;
                    }
                    else
                    {
                        $cyfraKontrolna = 10 - $reszta;
                    }
                    if($pesel[10] == $cyfraKontrolna)
                    {
                        echo ("Zapisuję do bazy $nazwisko $imie $pesel");
                        $query = "INSERT INTO `pracownicy` VALUES('', '$nazwisko', '$imie', '$pesel');";
                        mysqli_query($con, $query);
                    }
                    else
                    {
                        echo ("Niepoprawny pesel");
                    }
                }
                mysqli_close($con);
                ?>
            </section>
        </section>
    </main>
    <footer>
        <h5>AUTOR strony: Adam Dąbrowski</h5>
    </footer>
</body>
</html>