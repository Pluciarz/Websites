<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <section id="pierwszy">
            <h2>MÓJ ORGANIZER</h2>
        </section>
        <section id="drugi">
            <form action="" method="POST">
                <label for="wpis">Wpis wydarzenia:</label>
                <input type="text" name="wpis" id="wpis">
                <input type="submit" value="ZAPISZ" name="submit">
            </form>
        </section>
        <section id="trzeci">
            <img src="logo2.png" alt="Mój organizer">
        </section>
    </header>
    <main>
        <?php
        $con = mysqli_connect("localhost", "root", "", "egzamin6");
        if (isset($_POST["submit"]))
        {
            $wpis = $_POST["wpis"];
            $query = "UPDATE `zadania` SET `wpis`='$wpis' WHERE `dataZadania`='2020-08-27';";
            mysqli_query($con, $query);
        }
        $query = "SELECT `dataZadania`, `miesiac`, `wpis` FROM `zadania` WHERE `miesiac`='sierpien';";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result))
        {
            echo ("<section class='dzien'><h6>$row[dataZadania], $row[miesiac]</h6><p>$row[wpis]</p></section>");
        }
        ?>
    </main>
    <footer>
        <?php
        $query = "SELECT `miesiac`, `rok` FROM `zadania` WHERE `dataZadania`='2020-08-01';";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        echo ("<h1>miesiąc: $row[miesiac], rok: $row[rok]</h1>");
        mysqli_close($con);
        ?>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>