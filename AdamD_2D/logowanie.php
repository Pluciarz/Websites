<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Logowanie</title>
</head>
<body>
    <nav>
        <a href="rejestracje.php">Rejestracja</a>
    </nav>
    <header>
        <h1>Logowanie</h1>
    </header>
    <main>
        <form action="" method="POST" class="form">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
            <label for="haslo">Hasło</label>
            <input type="password" name="haslo" id="haslo">
            <input type="reset" value="Czyść" class="reset">
            <input type="submit" value="Zaloguj" class="submit">
        </form>
    </main>
    <section>
    <?php
    error_reporting(0);
    session_start();
    $login=$_POST["login"];
    $con=mysqli_connect("localhost", "root", "", "czat2d1");
    $haslo=sha1($_POST["haslo"]);
    $query="SELECT * FROM `uzytkownicy` WHERE `login` = '$login' AND `haslo` = '$haslo';";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    if(isset($row["login"]))
    {
        $_SESSION["login"]=$login;
        header("Location:wiadomosci.php");
    }
    else
    {
        echo("<p>Nieprawidłowy login lub hasło</p>");
    }
    if(isset($_SESSION["login"]))
    {
        header("Location:wiadomosci.php");
    }
    mysqli_close($con);
    ?>
    </section>
</body>
</html>