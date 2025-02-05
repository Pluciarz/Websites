<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KINO Za rogiem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <header>
            <img src="baner.jpg" alt="baner">
        </header>
        <section id="lewy">
            <ul>
                <li><a href="index.html">Strona główna</a></li>
            </ul>
            <hr>
            <form action="" method="POST">
                Data i godzina seansu<br>
                <input type="date" name="data" id="data">
                <input type="time" name="godzina" id="godzina">
                <input type="submit" value="Pokaż" name="pokaz">
            </form>
        </section>
        <section id="prawy">
            <?php
            if (isset($_POST["pokaz"]))
            {
                $con = mysqli_connect("localhost", "root", "", "kino");
                mysqli_set_charset($con, "utf8");
                $data = $_POST["data"];
                $godzina = $_POST["godzina"];
                $query = "SELECT `Rzad`, `Miejsce` FROM `rezerwacje` WHERE `Data`='$data' AND `Godzina`='$godzina';";
                if (!empty($data) && !empty($godzina))
                {
                    echo ("<p>EKRAN</p><table>");
                    $result = mysqli_query($con, $query);
                    $seats = array_fill(0, 15, array_fill(0, 20, 0));
                    while ($row = mysqli_fetch_array($result))
                    {
                        $rzad = $row["Rzad"] - 1;
                        $miejsce = $row["Miejsce"] - 1;
                        $seats[$rzad][$miejsce] = 1;
                    }    
                    for ($i = 0; $i < 15; $i++)
                    {
                        echo ("<tr><th>".($i + 1)."</th>");
                        for ($j = 0; $j < 20; $j++)
                        {
                            if ($seats[$i][$j] == 1)
                            {
                                $class = "zajete";
                            }
                            else
                            {
                                $class = "wolne";
                            }
                            echo ("<td class = '$class'>".($j + 1)."</td>");
                        }
                        echo ("</tr>");
                    }
                    echo ("</table>");
                }
                else
                {
                    echo ("<p>Podaj poprawną datę i godzinę seansu</p>");
                }
                mysqli_close($con);
            }
            ?>
        </section>
    </main>
    <footer>
        <h5>Egzamin INF.03 - AUTOR: Adam Dąbrowski</h5>
    </footer>
</body>
</html>