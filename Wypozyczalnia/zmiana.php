<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmiana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    error_reporting(0);
    session_start();
    $zmiana = $_SESSION["zmiana"];
    switch ($zmiana)
    {
        case "imie":
            {
                echo("<header><h1>Zmiana Imienia</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST'><label for='nowy' class='zmiana-label'>Nowe Imię: </label><br><input type='text' name='nowy' class='zmiana-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $login = $_SESSION["login"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    if(preg_match(('/^[A-Za-zĘÓŁŚĄŻŹĆŃzęółśążźćń]*$/'), $nowy))
                    {
                        $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                        $query = "UPDATE `uzytkownicy` SET `imie` = '$nowy' WHERE `login` = '$login';";
                        mysqli_query($con, $query);
                        mysqli_close($con);
                        header("Location:konto.php");
                    }
                    else
                    {
                        echo ("<p class='blad'>Podane imię jest niepoprawne</p>");
                    }
                }
                echo ("</main>");
                break;
            }
        case "nazwisko":
            {
                echo("<header><h1>Zmiana Nazwiska</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST'><label for='nowy' class='zmiana-label'>Nowe Nazwisko: </label><br><input type='text' name='nowy' class='zmiana-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $login = $_SESSION["login"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    if(preg_match(('/^[A-Za-zĘÓŁŚĄŻŹĆŃzęółśążźćń]*$/'), $nowy))
                    {
                        $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                        $query = "UPDATE `uzytkownicy` SET `nazwisko` = '$nowy' WHERE `login` = '$login';";
                        mysqli_query($con, $query);
                        mysqli_close($con);
                        header("Location:konto.php");
                    }
                    else
                    {
                        echo ("<p class='blad'>Podane nazwisko jest niepoprawne</p>");
                    }
                }
                echo ("</main>");
                break;
            }
        case "data":
            {
                echo("<header><h1>Zmiana Daty urodzenia</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST'><label for='nowy' class='zmiana-label'>Nowa Data urodzenia: </label><br><input type='date' name='nowy' class='zmiana-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $login = $_SESSION["login"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `uzytkownicy` SET `data_urodzenia` = '$nowy' WHERE `login` = '$login';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:konto.php");
                }
                echo ("</main>");
                break;
            }
        case "tel":
            {
                echo("<header><h1>Zmiana Numeru telefonu</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST'><label for='nowy' class='zmiana-label'>Nowy Numer telefonu: </label><br><input type='tel' name='nowy' class='zmiana-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $login = $_SESSION["login"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    if(preg_match(('/^[0-9]{9}$/'), $nowy))
                    {
                        $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                        $query = "UPDATE `uzytkownicy` SET `nr_telefonu` = '$nowy' WHERE `login` = '$login';";
                        mysqli_query($con, $query);
                        mysqli_close($con);
                        header("Location:konto.php");
                    }
                    else
                    {
                        echo ("<p class='blad'>Podany numer telefonu jest niepoprawny</p>");
                    }
                }
                echo ("</main>");
                break;
            }
        case "email":
            {
                echo("<header><h1>Zmiana Emaila</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST'><label for='nowy' class='zmiana-label'>Nowy Email: </label><br><input type='email' name='nowy' class='zmiana-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $login = $_SESSION["login"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    if(preg_match(('/^([A-Z]|[a-z]|[0-9]){2,20}(@)([A-Z]|[a-z]|[0-9]){2,10}(.pl|.com)$/'), $nowy))
                    {
                        $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                        $query = "UPDATE `uzytkownicy` SET `email` = '$nowy' WHERE `login` = '$login';";
                        mysqli_query($con, $query);
                        mysqli_close($con);
                        header("Location:konto.php");
                    }
                    else
                    {
                        echo ("<p class='blad'>Podany Email jest niepoprawny</p>");
                    }
                }
                echo ("</main>");
                break;
            }
        case "login":
            {
                echo("<header><h1>Zmiana Loginu</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST'><label for='nowy' class='zmiana-label'>Nowy Login: </label><br><input type='text' name='nowy' class='zmiana-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $login = $_SESSION["login"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $login1 = mb_convert_case($nowy, MB_CASE_LOWER);
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `uzytkownicy` SET `login` = '$login1' WHERE `login` = '$login';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:konto.php");
                }
                echo ("</main>");
                break;
            }
        case "haslo":
            {
                echo("<header><h1>Zmiana Hasła</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST'><label for='stary' class='zmiana-label'>Stare Hasło: </label><br><input type='password' name='stary' class='zmiana-input' id='stary'><br><label for='nowy' class='zmiana-label'>Nowe Hasło: </label><br><input type='password' name='nowy' class='zmiana-input' id='nowy'><input type='button' name='pokaz' id='pokaz' value='Pokaż' onclick='pokazhaslo()' class='zmiana-button'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                ?>
                <script>
                    function pokazhaslo()
                    {
                        let stary = document.getElementById("stary");
                        let nowy = document.getElementById("nowy");
                        let pokaz = document.getElementById("pokaz");
                        if (stary.type === "password")
                        {
                            stary.type = "text";
                            nowy.type = "text";
                            pokaz.value = "Ukryj";
                        } 
                        else 
                        {
                            stary.type = "password";
                            nowy.type = "password";
                            pokaz.value = "Pokaż";
                        }
                    }
                </script>
                <?php
                $stary = sha1($_POST["stary"]);
                $login = $_SESSION["login"];
                $nowy = $_POST["nowy"];
                if (empty($stary) || empty($nowy))
                {
                    echo ("<p class='blad'>Pola nie mogą być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "SELECT * FROM `uzytkownicy` WHERE `login` = '$login';";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_array($result);
                    if ($stary == $row["haslo"])
                    {
                        $haslo = sha1($nowy);
                        $query = "UPDATE `uzytkownicy` SET `imie` = '$haslo' WHERE `login` = '$login';";
                        mysqli_query($con, $query);
                        mysqli_close($con);
                        header("Location:konto.php");
                    }
                    else
                    {
                        echo ("<p class='blad'>Stare hasło jest niepoprawne</p>");
                    }
                }
                echo ("</main>");
                break;
            }
      case "zdjecie":
            {
                echo("<header><h1>Zmiana Zdjęcia</h1></header><nav><a href='index.php'>Strona główna</a><a href='konto.php'>Zarządzanie kontem</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='zmiana-main'><form action='' method='POST' ENCTYPE='multipart/form-data'><label for='nowy' class='zmiana-label'>Nowe Zdjęcie: </label><br><input type='file' name='plik' class='plik' id='plik'><br><input type='submit' value='Zmień' name='zmien' class='zmiana-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $login = $_SESSION["login"];
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
                                $plik = $_FILES['plik']['name'];
                                $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                                $query = "UPDATE `uzytkownicy` SET `zdjecie` = '$plik' WHERE `login` = '$login';";
                                mysqli_query($con, $query);
                                mysqli_close($con);
                                header("Location:konto.php");
                            }
                        }
                    }
                }
                else
                {
                    echo ("<p class='blad'>Musisz wybrać plik</p>");
                }
                echo ("</main>");
                break;
            }
      default: header("Location:konto.php");
      break;  
    }
    ?>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>