<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <section id="lewy">
        <img src="Avatar.png" alt="Użytkownik forum">
        <?php
        $con = mysqli_connect("localhost", "root", "", "forumpsy");
        $query = "SELECT `nick`, `postow`, `pytanie` FROM `konta` INNER JOIN `pytania` ON `konta`.`id`=`pytania`.`konta_id` WHERE `pytania`.`id`='1';";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        echo ("<h4>Użytkownik: $row[nick]</h4><p>$row[postow] postów na forum</p><p>$row[pytanie]</p>");
        ?>
        <video src="video.mp4" controls loop></video>
    </section>
    <section id="prawy">
        <form action="" method="POST">
            <textarea name="odpowiedz" id="odpowiedz" rows="4" cols="40"></textarea><br>
            <button type="submit" name="submit">Dodaj odpowiedź</button>
        </form>
        <?php
        if (isset($_POST["submit"]))
        {
            $odpowiedz = $_POST["odpowiedz"];
            if (!empty($odpowiedz))
            {
                $query = "INSERT INTO `odpowiedzi` VALUES ('', '1', '5', '$odpowiedz');";
                mysqli_query($con, $query);
            }
        }
        ?>
        <h2>Odpowiedzi na pytanie</h2>
        <ol>
            <?php
            $query = "SELECT `odpowiedzi`.`id`, `odpowiedz`, `nick` FROM `odpowiedzi` INNER JOIN `konta` ON `odpowiedzi`.`konta_id`=`konta`.`id` WHERE `Pytania_id`='1';";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result))
            {
                echo ("<li>$row[odpowiedz] <em>$row[nick]</em><hr></li>");
            }
            mysqli_close($con);
            ?>
        </ol>
    </section>
    <footer>
        Autor: Adam Dąbrowski, <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>