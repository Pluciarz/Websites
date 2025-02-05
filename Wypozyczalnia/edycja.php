<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja</title>
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
    $edycja = $_SESSION["edycja"];
    switch($edycja)
    {
        case "vin":
            {
                echo("<header><h1>Edycja Nr VIN</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><label for='nowy' class='edycja-label'>Nowy Nr VIN: </label><br><input type='text' name='nowy' class='edycja-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    if(preg_match(('/^[A-HJ-NPR-Z0-9]{17}$/'), $nowy))
                    {
                        $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                        $query = "UPDATE `samochody` SET `nr_VIN` = '$nowy' WHERE `nr_VIN` = '$vin';";
                        mysqli_query($con, $query);
                        mysqli_close($con);
                        $_SESSION["vin"] = $nowy;
                        header("Location:dane.php");
                    }
                    else
                    {
                        echo ("<p class='blad'>Podany Nr VIN jest niepoprawny</p>");
                    }
                }
                echo ("</main>");
                break;
            }
        case "model":
            {
                echo("<header><h1>Edycja Modelu</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><label for='nowy' class='edycja-label'>Nowy Model: </label><br><input type='text' name='nowy' class='edycja-input' id='nowy'><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `samochody` SET `model` = '$nowy' WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:dane.php");
                }
                echo ("</main>");
                break;
            }
        case "koszt":
            {
                echo("<header><h1>Edycja Kosztu wypożyczenia na 1 dzień</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><label for='nowy' class='edycja-label'>Nowy Koszt wypożyczenia na 1 dzień: </label><br><input type='number' name='nowy' class='edycja-input' id='nowy' min='0' step='0.01'><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `samochody` SET `koszt_na_1_dzien` = '$nowy' WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:dane.php");
                }
                echo ("</main>");
                break;
            }
        case "liczba_miejsc":
            {
                echo("<header><h1>Edycja Liczby miejsc</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><label for='nowy' class='edycja-label'>Nowa Liczba miejsc: </label><br><input type='number' name='nowy' class='edycja-input' id='nowy' min='1' max='9'><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `samochody` SET `liczba_miejsc` = '$nowy' WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:dane.php");
                }
                echo ("</main>");
                break;
            }
        case "liczba_bagazy":
            {
                echo("<header><h1>Edycja Liczby bagaży</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><label for='nowy' class='edycja-label'>Nowa Liczba bagaży: </label><br><input type='number' name='nowy' class='edycja-input' id='nowy' min='1' max='9'><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `samochody` SET `liczba_bagazy` = '$nowy' WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:dane.php");
                }
                echo ("</main>");
                break;
            }
        case "liczba_drzwi":
            {
                echo("<header><h1>Edycja Liczby drzwi</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><label for='nowy' class='edycja-label'>Nowa Liczba drzwi: </label><br><input type='number' name='nowy' class='edycja-input' id='nowy' min='1' max='9'><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `samochody` SET `liczba_drzwi` = '$nowy' WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:dane.php");
                }
                echo ("</main>");
                break;
            }
        case "klimatyzacja":
            {
                echo("<header><h1>Edycja Klimatyzacji</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><input type='radio' name='nowy' id='tak' value='tak' class='edycja-input'><label for='tak' class='edycja-label'>Tak</label><br><input type='radio' name='nowy' id='nie' value='nie' class='edycja-input'><label for='nie' class='edycja-label'>Nie</label><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Musisz wybrać jedną z opcji</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `samochody` SET `klimatyzacja` = '$nowy' WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:dane.php");
                }
                
                echo ("</main>");
                break;
            }
        case "skrzynia_biegow":
            {
                echo("<header><h1>Edycja Skrzyni biegów</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST'><label for='nowy' class='edycja-label'>Nowa Skrzynia biegów: </label><br><select name='nowy' id='nowy' class='edycja-input'><option value='ręczna'>ręczna</option><option value='automatyczna'>automatyczna</option></select><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $nowy = $_POST["nowy"];
                $vin = $_SESSION["vin"];
                if (empty($nowy))
                {
                    echo ("<p class='blad'>Pole nie może być puste</p>");
                }
                else
                {
                    $con = mysqli_connect("localhost", "root", "", "wypozyczalnia");
                    $query = "UPDATE `samochody` SET `skrzynia_biegow` = '$nowy' WHERE `nr_VIN` = '$vin';";
                    mysqli_query($con, $query);
                    mysqli_close($con);
                    header("Location:dane.php");
                }
                echo ("</main>");
                break;
            }
        case "zdjecie":
            {
                echo("<header><h1>Zmiana Zdjęcia</h1></header><nav><a href='index.php'>Strona główna</a><a href='admin.php'>Panel administracyjny</a><form action='' method='POST'><input type='submit' value='Wyloguj' name='Wyloguj' class='Wyloguj'></form></nav><main class='edycja-main'><form action='' method='POST' ENCTYPE='multipart/form-data'><label for='plik' class='edycja-label'>Nowe Zdjęcie: </label><br><input type='file' name='plik' class='plik' id='plik' class='edycja-input'><br><input type='submit' value='Zmień' name='zmien' class='edycja-button'></form>");
                if(isset($_POST["Wyloguj"]))
                {
                    session_destroy();
                    header("Location:logowanie.php");
                }
                $vin = $_SESSION["vin"];
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
                                $query = "UPDATE `samochody` SET `zdjecie` = '$plik' WHERE `login` = '$login';";
                                mysqli_query($con, $query);
                                mysqli_close($con);
                                header("Location:dane.php");
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
        default: header("Location:dane.php");
        break;
    }
    ?>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>