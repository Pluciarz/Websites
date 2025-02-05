<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <main>
        <section class="Lewy">
            <img src="obraz.jpg" alt="foksterier">
        </section>
        <div>
            <section class="Prawy" id="Gorny">
                <h2>Zapisz się</h2>
                <form action="" method="POST">
                    login: <input type="text" name="login" id="login"><br>
                    hasło: <input type="password" name="haslo" id="haslo"><br>
                    powtórz hasło: <input type="password" name="phaslo" id="phaslo"><br>
                    <input type="submit" value="Zapisz">
                </form>
                <?php
                $login = $_POST["login"];
                $haslo = $_POST["haslo"];
                $phaslo = $_POST["phaslo"];
                $con = mysqli_connect("localhost", "root", "", "psy");
                if(empty($login) || empty($haslo) || empty($phaslo))
                {
                    echo("<p>wypełnij wszystkie pola</p>");
                }
                else
                {
                    $query = "SELECT `login` FROM `uzytkownicy`;";
                    $result = mysqli_query($con, $query);
                    $req = 1;
                    while ($row = mysqli_fetch_array($result))
                    {
                        if ($login == $row["login"])
                        {
                            echo("<p>login występuje w bazie danych, konto nie zostało dodane</p>");
                            $req = 0;
                        }
                    }
                    if ($req == 1)
                    {
                        if($haslo != $phaslo)
                        {
                            echo("<p>hasła nie są takie same, konto nie zostało dodane</p>");
                        }
                        else
                        {
                            $shahaslo = sha1($haslo);
                            $query1 = "INSERT INTO `uzytkownicy` VALUES ('', '$login', '$shahaslo');";
                            $result1 = mysqli_query($con, $query1);
                            echo("<p>Konto zostało dodane</p>");
                        }
                    }
                }
                mysqli_close($con);
                ?>
            </section>
            <section class="Prawy" id="Dolny">
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                </ol>
                <a href="regulamin.html">Przeczytaj regulamin forum</a>
            </section>
        </div>
    </main>
    <footer>
        Stronę wykonał: Adam Dąbrowski
    </footer>
</body>
</html>