<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rejestracja</title>
</head>
<body>
    <nav>
        <a href="logowanie.php">Logowanie</a>
    </nav>
    <header>
        <h1>Rejestracja</h1>
    </header>
    <main>
        <form action="" method="POST" ENCTYPE="multipart/form-data" class="form">
            <label for="imie">Imie</label>
            <input type="text" name="imie" id="imie">
            <label for="nazwisko">Nazwisko</label>
            <input type="text" name="nazwisko" id="nazwisko">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
            <label for="haslo">Hasło</label>
            <input type="password" name="haslo" id="haslo">
            <label for="plik">Dodaj zdjęcie profilowe</label>
            <input type="file" name="plik" id="plik">
            <input type="reset" value="Czyść" class="reset">
            <input type="submit" value="Zarejestruj" class="submit">
        </form>
    </main>
    <section>
    <?php
    error_reporting(0);
    $imie=$_POST["imie"];
    $nazwisko=$_POST["nazwisko"];
    $email=$_POST["email"];
    $login=$_POST["login"];
    $haslo=$_POST["haslo"];
    if (empty($imie) || empty($nazwisko) || empty($email) || empty($login) || empty($haslo))
        {
            echo("<p>Uzupełnij dane</p>");
        }
    else
        {
            if(preg_match(('/^[A-Za-zĘÓŁŚĄŻŹĆŃzęółśążźćń]*$/'), $imie))
            {
                if(preg_match(('/^[A-Za-zĘÓŁŚĄŻŹĆŃzęółśążźćń]*$/'), $nazwisko))
                {
                    if(preg_match(('/^([A-Z]|[a-z]|[0-9]){2,20}(@)([A-Z]|[a-z]|[0-9]){2,10}(.pl|.com)$/'), $email))
                    {
                        if(isset($_FILES['plik'])) 
                        {
                            if ($_FILES['plik']['error'] != 0) 
                            {
                                echo ("<p>Błąd wysyłania pliku</p>");
                            }
                            else
                            {
                                if ($_FILES['plik']['size'] == 0) 
                                {
                                    echo ("<p>Brak pliku</p>");
                                }
                                else
                                {
                                    $dozwolonepliki  = array('jpg', 'jpeg', 'png', 'gif');
                                    $plikrozszerzenie  = pathinfo(strtolower($_FILES['plik']['name']), PATHINFO_EXTENSION);
                                    if(!in_array($plikrozszerzenie, $dozwolonepliki, true))
                                    {
                                        echo ("<p>Nieprawidłowe rozszerzenie pliku</p>");
                                    }
                                    else
                                    {
                                        move_uploaded_file($_FILES['plik']['tmp_name'],
                                        $_SERVER['DOCUMENT_ROOT'].'/AdamD_2D/zdjecia/'.$_FILES['plik']['name']);
                                    }
                                }
                            }
                        }
                        $plik=$_FILES['plik']['name'];
                        $login1=mb_convert_case($login, MB_CASE_LOWER);
                        $haslo1=sha1($haslo);
                       //mysqli_connect łączy z serwerem i wybiera bazę danych
                        $con=mysqli_connect("localhost", "root", "", "czat2d1");
                        //$con - identyfikator połączenia
                        //Tworzymy zapytanie
                        $query="INSERT INTO `uzytkownicy` VALUES ('', '$imie', '$nazwisko', '$email', '$login1', '$haslo1', '$plik')";
                        //Wysłanie zapytania na serwer
                        mysqli_query($con, $query);
                        //Zamykamy połączenie
                        mysqli_close($con);
                        echo("<p>Rejestracja udana</p>");
                        $_SESSION["login"]=$login;
                        header("Refresh:5; URL=wiadomosci.php");
                    }
                    else
                    {
                        echo("<p>Podany email jest niepoprawny</p>");
                    }
                }
                else
                {
                    echo("<p>Podane nazwisko jest niepoprawne</p>");
                }
            }
            else
            {
                echo("<p>Podane imię jest niepoprawne</p>");
            }
        }
    ?>
    </section>
</body>
</html>