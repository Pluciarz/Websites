<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Rejestracja</h1>
    </header>
    <nav>
        <a href="index.php">Strona główna</a>
        <a href="logowanie.php">Logowanie</a>
    </nav>
    <main class="rejestracja-main">
        <form action="" method="POST" ENCTYPE="multipart/form-data">
            <label for="imie" class="rejestracja-label">Imię: </label><br>
            <input type="text" name="imie" id="imie" class="rejestracja-input"><br>
            <label for="nazwisko" class="rejestracja-label">Nazwisko: </label><br>
            <input type="text" name="nazwisko" id="nazwisko" class="rejestracja-input"><br>
            <label for="data" class="rejestracja-label">Data urodzenia: </label><br>
            <input type="date" name="data" id="data" class="rejestracja-input"><br>
            <label for="tel" class="rejestracja-label">Numer telefonu: </label><br>
            <input type="tel" name="tel" id="tel" class="rejestracja-input"><br>
            <label for="email" class="rejestracja-label">E-mail: </label><br>
            <input type="email" name="email" id="email" class="rejestracja-input"><br>
            <label for="login" class="rejestracja-label">Login: </label><br>
            <input type="text" name="login" id="login" class="rejestracja-input"><br>
            <label for="haslo" class="rejestracja-label">Hasło: </label><br>
            <input type="password" name="haslo" id="haslo" class="rejestracja-input">
            <input type="button" name="pokaz" id="pokaz" value="Pokaż" onclick="pokazhaslo()" class="rejestracja-button"><br>
            <label for="plik" class="rejestracja-label">Dodaj zdjęcie profilowe: </label><br>
            <input type="file" name="plik" id="plik" class="rejestracja-input"><br>
            <input type="reset" value="Czyść" class="rejestracja-button">
            <input type="submit" value="Zarejestruj" class="rejestracja-button">
        </form>
        <script>
            function pokazhaslo()
            {
                let haslo = document.getElementById("haslo");
                let pokaz = document.getElementById("pokaz");
                if (haslo.type === "password")
                {
                    haslo.type = "text";
                    pokaz.value = "Ukryj";
                } 
                else 
                {
                    haslo.type = "password";
                    pokaz.value = "Pokaż";
                }
            }
        </script>
        <section>
            <?php
            error_reporting(0);
            $imie=$_POST["imie"];
            $nazwisko=$_POST["nazwisko"];
            $data=$_POST["data"];
            $tel=$_POST["tel"];
            $email=$_POST["email"];
            $login=$_POST["login"];
            $haslo=$_POST["haslo"];
            if (empty($imie) || empty($nazwisko) || empty($data) || empty($tel) || empty($email) || empty($login) || empty($haslo))
            {
                echo("<p class='blad'>Uzupełnij dane</p>");
            }
            else
            {
                if(preg_match(('/^[A-Za-zĘÓŁŚĄŻŹĆŃzęółśążźćń]*$/'), $imie))
                {
                    if(preg_match(('/^[A-Za-zĘÓŁŚĄŻŹĆŃzęółśążźćń]*$/'), $nazwisko))
                    {
                        if(preg_match(('/^([A-Z]|[a-z]|[0-9]){2,20}(@)([A-Z]|[a-z]|[0-9]){2,10}(.pl|.com)$/'), $email))
                        {
                            if(preg_match(('/^[0-9]{9}$/'), $tel))
                            {
                                if(isset($_FILES['plik'])) 
                                {
                                    if ($_FILES['plik']['error'] != 0) 
                                    {
                                        echo ("<p class='blad'>Błąd wysyłania pliku</p>");
                                    }
                                    else
                                    {
                                        if ($_FILES['plik']['size'] == 0) 
                                        {
                                            echo ("<p class='blad'>Brak pliku</p>");
                                        }
                                        else
                                        {
                                            $dozwolonepliki  = array('jpg', 'jpeg', 'png', 'gif');
                                            $plikrozszerzenie  = pathinfo(strtolower($_FILES['plik']['name']), PATHINFO_EXTENSION);
                                            if(!in_array($plikrozszerzenie, $dozwolonepliki, true))
                                            {
                                                echo ("<p class='blad'>Nieprawidłowe rozszerzenie pliku</p>");
                                            }
                                            else
                                            {
                                                move_uploaded_file($_FILES['plik']['tmp_name'],
                                                $_SERVER['DOCUMENT_ROOT'].'/wypozyczalnia/zdjecia/'.$_FILES['plik']['name']);
                                                $plik=$_FILES['plik']['name'];
                                                $login1=mb_convert_case($login, MB_CASE_LOWER);
                                                $haslo1=sha1($haslo);
                                                //mysqli_connect łączy z serwerem i wybiera bazę danych
                                                $con=mysqli_connect("localhost", "root", "", "wypozyczalnia");
                                                //$con - identyfikator połączenia
                                                $query = "SELECT * FROM `uzytkownicy`;";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($result))
                                                {
                                                    if ($row["login"] == $login1)
                                                    {
                                                        echo ("<p class='blad'>Użytkownik o takim loginie już istnieje wybierz inny</p>");
                                                        break;
                                                    }
                                                    else
                                                    {
                                                        //Tworzymy zapytanie
                                                        $query="INSERT INTO `uzytkownicy` VALUES ('', '$imie', '$nazwisko', '$data', '$tel', '$email', '$login1', '$haslo1', '$plik')";
                                                        //Wysłanie zapytania na serwer
                                                        mysqli_query($con, $query);
                                                        //Zamykamy połączenie
                                                        mysqli_close($con);
                                                        echo("<p class='blad'>Rejestracja udana</p>");
                                                        $_SESSION["login"]=$login;
                                                        header("Refresh:5; URL=index.php");
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }   
                            else
                            {
                                echo("<p class='blad'>Podany numer telefonu jest niepoprawny</p>");
                            }
                        }
                        else
                        {
                            echo("<p class='blad'>Podany email jest niepoprawny</p>");
                        }
                    }
                    else
                    {
                        echo("<p class='blad'>Podane nazwisko jest niepoprawne</p>");
                    }
                }
                else
                {
                    echo("<p class='blad'>Podane imię jest niepoprawne</p>");
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