<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wiadomosci</title>
</head>
<body>
    <nav>
        <form action="" method="POST">
            <input type="submit" value="Wyloguj" name="Wyloguj" class="Wyloguj">
        </form>
    </nav>
    <header>
        <h1>Wiadomości</h1>
    </header>
    <main>
        <form action="" method="POST" class="form">
            <label for="wiadomosc">Wiadomość</label>
            <textarea name="wiadomosc" id="wiadomosc" cols="30" rows="10"></textarea>
            <input type="reset" value="Czyść" class="reset">
            <input type="submit" value="Wyślij" name="Wyslij" class="submit">
        </form>
    </main>
    <section>
    <?php
        error_reporting(0);
        session_start();
        if(isset($_POST["Wyloguj"]))
            {
                session_destroy();
                header("Location:logowanie.php");
            }
        if(isset($_SESSION["login"]))
        {
            $login=$_SESSION["login"];
            $wiadomosc=$_POST["wiadomosc"];
            $con=mysqli_connect("localhost", "root", "", "czat2d1");
            $query="SELECT `id` FROM `uzytkownicy` WHERE `login`='$login'";
            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_array($result);
            if(!empty($wiadomosc))
            {
                echo ("<p>Pomyślnie wysłano wiadomość</p>");
                if(!empty($row["id"]))
                {
                    $data=date("y-m-d");
                    $query1="INSERT INTO `wiadomosci` VALUES ('', '$row[id]', '$wiadomosc', '$data')";
                    mysqli_query($con, $query1);
                }
                else
                {
                    echo("<p>Nie ma użytkownika o loginie $login</p>");
                }
            }
            else
            {
                echo("<p>Wiadomość nie może być pusta</p>");
            }
            $query2="SELECT `login`, `wiadomosc`, `data`, `zdjecia` FROM `uzytkownicy` INNER JOIN `wiadomosci` ON `uzytkownicy`.`id`=`wiadomosci`.`id`";
            $result1=mysqli_query($con, $query2);
            //W jaki sposób zwraca
            while($row=mysqli_fetch_array($result1))
            {
                if(!empty($row["zdjecia"]))
                {
                    echo("<div><p class='info'><img src='/AdamD_2D/Zdjecia/$row[zdjecia]' alt='Zdjęcie profilowe'> $row[login] $row[data]</p><p class='wiadomosc'>$row[wiadomosc]</p></div>");
                }
                else
                {
                    echo("<div><p class='info'>$row[login] $row[data]</p><p class='wiadomosc'>$row[wiadomosc]</p></div>");
                }
            }
            //Ta funkcja zwraca odpowiedź z serwera
            mysqli_close($con);
        }  
        else
        {
            header("Location:logowanie.php");
        }
    ?>
    </section>
</body>
</html>