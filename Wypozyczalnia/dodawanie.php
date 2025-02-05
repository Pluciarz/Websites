<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie samochodu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dodawanie samochodu</h1>
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
    <main class="dodawanie-main">
        <form action="" method="POST" ENCTYPE="multipart/form-data">
        <label for='vin' class="dodawanie-label">Nr VIN: </label><br>
        <input type='text' name='vin' class='dodawanie-input' id='vin'><br>
        <label for='model' class="dodawanie-label">Model: </label><br>
        <input type='text' name='model' class='dodawanie-input' id='model'><br>
        <label for='koszt' class="dodawanie-label">Koszt wypożyczenia na 1 dzień: </label><br>
        <input type='number' name='koszt' class='dodawanie-input' id='koszt' min='0' step='0.01'><br>
        <label for='liczba_miejsc' class="dodawanie-label">Liczba miejsc: </label><br>
        <input type='number' name='liczba_miejsc' class='dodawanie-input' id='liczba_miejsc' min='1' max='9'><br>
        <label for='liczba_bagazy' class="dodawanie-label">Liczba bagaży: </label><br>
        <input type='number' name='liczba_bagazy' class='dodawanie-input' id='liczba_bagazy' min='1' max='9'><br>
        <label for='liczba_drzwi' class="dodawanie-label">Liczba drzwi: </label><br>
        <input type='number' name='liczba_drzwi' class='dodawanie-input' id='liczba_drzwi' min='1' max='9'><br>
        <label for="klimatyzacja" class="dodawanie-label">Klimatyzacja: </label><br>
        <input type='radio' name='klimatyzacja' id='tak' value='tak' class='dodawanie-input'>
        <label for='tak' class="dodawanie-label">Tak</label><br>
        <input type='radio' name='klimatyzacja' id='nie' value='nie' class='dodawanie-input'>
        <label for='nie' class="dodawanie-label">Nie</label><br>
        <label for='skrzynia_biegow' class="dodawanie-label">Skrzynia biegów: </label><br>
        <select name='skrzynia_biegow' id='skrzynia_biegow' class='dodawanie-input'>
            <option value='ręczna'>ręczna</option>
            <option value='automatyczna'>automatyczna</option>
        </select><br>
        <label for='plik' class="dodawanie-label">Zdjęcie: </label><br>
        <input type='file' name='plik' class='plik' id='plik' class='dodawanie-input'><br>
        <input type="reset" value="Czyść" class="dodawanie-button">
        <input type="submit" value="Dodaj" class="dodawanie-button">
        </form>
        <?php
        error_reporting(0);
        session_start();
        if ($_SESSION["login"] != "admin")
        {
            header("Location:index.php");
        }
        $vin = $_POST["vin"];
        $model = $_POST["model"];
        $koszt = $_POST["koszt"];
        $liczba_miejsc = $_POST["liczba_miejsc"];
        $liczba_bagazy = $_POST["liczba_bagazy"];
        $liczba_drzwi = $_POST["liczba_drzwi"];
        $klimatyzacja = $_POST["klimatyzacja"];
        $skrzynia_biegow = $_POST["skrzynia_biegow"];
        if (empty($vin) || empty($model) || empty($koszt) || empty($liczba_miejsc) || empty($liczba_bagazy) || empty($liczba_drzwi) || empty($klimatyzacja) || empty($skrzynia_biegow))
        {
            echo("<p class='blad'>Uzupełnij dane</p>");
        }
        else
        {
            if(preg_match(('/^[A-HJ-NPR-Z0-9]{17}$/'), $vin))
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
                                //mysqli_connect łączy z serwerem i wybiera bazę danych
                                $con=mysqli_connect("localhost", "root", "", "wypozyczalnia");
                                //$con - identyfikator połączenia
                                //Tworzymy zapytanie
                                $query="INSERT INTO `samochody` VALUES ('$vin', '$model', '$koszt', '$liczba_miejsc', '$liczba_bagazy', '$liczba_drzwi', '$klimatyzacja', '$skrzynia_biegow', '$plik')";
                                //Wysłanie zapytania na serwer
                                mysqli_query($con, $query);
                                //Zamykamy połączenie
                                mysqli_close($con);
                                echo("<p class='blad'>Dodano samochód</p>");
                            }
                        }
                    }
                }
            }
            else
            {
                echo ("<p class='blad'>Niepoprawyny nr VIN</p>");
            }
        }
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>