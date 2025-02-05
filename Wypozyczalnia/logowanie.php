<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Logowanie</h1>
    </header>
    <nav>
        <a href="index.php">Strona główna</a>
        <a href="rejestracja.php">Rejestracja</a>
    </nav>
    <main class="logowanie-main">
        <form action="" method="POST">
            <label for="login" class="logowanie-label">Login:</label><br>
            <input type="text" name="login" id="login" class="logowanie-input"><br>
            <label for="haslo" class="logowanie-label">Hasło:</label><br>
            <input type="password" name="haslo" id="haslo" class="logowanie-input">
            <input type="button" name="pokaz" id="pokaz" value="Pokaż" onclick="pokazhaslo()" class="logowanie-button"><br>
            <input type="reset" value="Czyść" class="logowanie-button">
            <input type="image" src="img_submit.png" alt="submit" value="Zaloguj">
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
            session_start();
            $login=$_POST["login"];
            $con=mysqli_connect("localhost", "root", "", "wypozyczalnia");
            $haslo=sha1($_POST["haslo"]);
            $query="SELECT * FROM `uzytkownicy` WHERE `login` = '$login' AND `haslo` = '$haslo';";
            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_array($result);
            if(isset($row["login"]))
            {
                $_SESSION["login"]=$login;
                if ($login == "admin")
                {
                    header("Location:admin.php");
                }
                else
                {
                    header("Location:index.php");
                }
            }
            else
            {
                echo("<p class='blad'>Nieprawidłowy login lub hasło</p>");
            }
            if(isset($_SESSION["login"]))
            {
                header("Location:index.php");
            }
            mysqli_close($con);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>