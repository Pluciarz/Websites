<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section class="lewy">
            <h2>KONTAKT</h2>
            <a href="biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 555666777</p>
        </section>
        <section class="srodkowy">
            <h2>GALERIA</h2>
            <?php
            $con = mysqli_connect("localhost", "root", "", "egzamin3");
            $query = "SELECT `nazwaPliku`, `podpis` FROM `zdjecia` ORDER BY `podpis`;";
            $result = mysqli_query($con, $query);
            $suma = 0;
            while ($row = mysqli_fetch_array($result))
            {
                echo ("<img src='$row[nazwaPliku]' alt='$row[podpis]'>");
                $suma++;
                if ($suma % 3 == 0)
                {
                    echo ("<br>");
                }
            }
            mysqli_close($con);
            ?>
        </section>
        <section class="prawy">
            <h2>PROMOCJE</h2>
            <table>
                <tr>
                    <td>Jesień</td>
                    <td>Grupa 4+</td>
                    <td>Grupa 10+</td>
                </tr>
                <tr>
                    <td>5%</td>
                    <td>10%</td>
                    <td>15%</td>
                </tr>
            </table>
        </section>
    </main>
    <section class="dane">
        <h2 class="lista">LISTA WYCIECZEK</h2>
        <?php
        $con = mysqli_connect("localhost", "root", "", "egzamin3");
        $query = "SELECT `id`, `dataWyjazdu`, `cel`, `cena` FROM `wycieczki` WHERE `dostepna` = '1';";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result))
        {
            echo ("$row[id]. $row[dataWyjazdu], $row[cel], cena: $row[cena]<br>");
        }
        mysqli_close($con);
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>