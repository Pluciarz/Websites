<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <style>
      .Usun
      {
        display: inline;
      }  
    </style>
</head>
<body>
    <h1>Koszyk</h1>
    <?php
    error_reporting(0);
    session_start();
    $LacznieKroliczek = $_SESSION["kroliczek"] * $_SESSION["CenaKroliczek"];
    if(isset($_SESSION["kroliczek"]))
    {
        echo ("Króliczek: $_SESSION[kroliczek]");
        ?>
        <form method="POST" class="Usun">
            <input type="number" name="UsuńLiczbaKroliczek" min="1" max="<?php echo $_SESSION["kroliczek"];?>">
            <input type="submit" value="Usuń" name="UsunKroliczek">
            <input type="submit" value="Usuń wszystkie" name="UsunWszystkieKroliczek">
        </form>
        <?php
        echo("Cena za jedną sztukę: $_SESSION[CenaKroliczek] zł, Łącznie: $LacznieKroliczek zł<br>");
        if(isset($_POST["UsunKroliczek"]))
        {
            $_SESSION["kroliczek"] -= $_POST["UsuńLiczbaKroliczek"];
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if(isset($_POST["UsunWszystkieKroliczek"]))
        {
            unset($_SESSION["kroliczek"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if($_SESSION["kroliczek"]==0)
        {
            unset($_SESSION["kroliczek"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
    ?>
    <?php
    error_reporting(0);
    session_start();
    $LacznieMisio = $_SESSION["misio"] * $_SESSION["CenaMisio"];
    if(isset($_SESSION["misio"]))
    {
        echo ("Misio: $_SESSION[misio]");
        ?>
        <form method="POST" class="Usun">
            <input type="number" name="UsuńLiczbaMisio" min="1" max="<?php echo $_SESSION["misio"];?>">
            <input type="submit" value="Usuń" name="UsunMisio">
            <input type="submit" value="Usuń wszystkie" name="UsunWszystkieMisio">
        </form>
        <?php
        echo("Cena za jedną sztukę: $_SESSION[CenaMisio] zł, Łącznie: $LacznieMisio zł<br>");
        if(isset($_POST["UsunMisio"]))
        {
            $_SESSION["misio"] -= $_POST["UsuńLiczbaMisio"];
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if(isset($_POST["UsunWszystkieMisio"]))
        {
            unset($_SESSION["misio"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if($_SESSION["misio"]==0)
        {
            unset($_SESSION["misio"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
    ?>
    <?php
    error_reporting(0);
    session_start();
    $LacznieMalpka = $_SESSION["malpka"] * $_SESSION["CenaMalpka"];
    if(isset($_SESSION["malpka"]))
    {
        echo ("Małpka: $_SESSION[malpka]");
        ?>
        <form method="POST" class="Usun">
            <input type="number" name="UsuńLiczbaMalpka" min="1" max="<?php echo $_SESSION["malpka"];?>">
            <input type="submit" value="Usuń" name="UsunMalpka">
            <input type="submit" value="Usuń wszystkie" name="UsunWszystkieMalpka">
        </form>
        <?php
        echo("Cena za jedną sztukę: $_SESSION[CenaMalpka] zł, Łącznie: $LacznieMalpka zł<br>");
        if(isset($_POST["UsunMalpka"]))
        {
            $_SESSION["malpka"] -= $_POST["UsuńLiczbaMalpka"];
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if(isset($_POST["UsunWszystkieMalpka"]))
        {
            unset($_SESSION["malpka"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if($_SESSION["malpka"]==0)
        {
            unset($_SESSION["malpka"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
    ?>
    <?php
    error_reporting(0);
    session_start();
    $LacznieSlonik = $_SESSION["slonik"] * $_SESSION["CenaSlonik"];
    if(isset($_SESSION["slonik"]))
    {
        echo ("Słonik: $_SESSION[slonik]");
        ?>
        <form method="POST" class="Usun">
            <input type="number" name="UsuńLiczbaSlonik" min="1" max="<?php echo $_SESSION["slonik"];?>">
            <input type="submit" value="Usuń" name="UsunSlonik">
            <input type="submit" value="Usuń wszystkie" name="UsunWszystkieSlonik">
        </form>
        <?php
        echo("Cena za jedną sztukę: $_SESSION[CenaSlonik] zł, Łącznie: $LacznieSlonik zł<br>");
        if(isset($_POST["UsunSlonik"]))
        {
            $_SESSION["slonik"] -= $_POST["UsuńLiczbaSlonik"];
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if(isset($_POST["UsunWszystkieSlonik"]))
        {
            unset($_SESSION["slonik"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if($_SESSION["slonik"]==0)
        {
            unset($_SESSION["slonik"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
    ?>
    <?php
    error_reporting(0);
    session_start();
    $LacznieZyrafa = $_SESSION["zyrafa"] * $_SESSION["CenaZyrafa"];
    if(isset($_SESSION["zyrafa"]))
    {
        echo ("Żyrafa: $_SESSION[zyrafa]");
        ?>
        <form method="POST" class="Usun">
            <input type="number" name="UsuńLiczbaZyrafa" min="1" max="<?php echo $_SESSION["zyrafa"];?>">
            <input type="submit" value="Usuń" name="UsunZyrafa">
            <input type="submit" value="Usuń wszystkie" name="UsunWszystkieZyrafa">
        </form>
        <?php
        echo("Cena za jedną sztukę: $_SESSION[CenaZyrafa] zł, Łącznie: $LacznieZyrafa zł<br>");
        if(isset($_POST["UsunZyrafa"]))
        {
            $_SESSION["zyrafa"] -= $_POST["UsuńLiczbaZyrafa"];
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if(isset($_POST["UsunWszystkieZyrafa"]))
        {
            unset($_SESSION["zyrafa"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if($_SESSION["zyrafa"]==0)
        {
            unset($_SESSION["zyrafa"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
    ?>
    <?php
    error_reporting(0);
    session_start();
    $LacznieJednorozec = $_SESSION["jednorozec"] * $_SESSION["CenaJednorozec"];
    if(isset($_SESSION["jednorozec"]))
    {
        echo ("Jednorożec: $_SESSION[jednorozec]");
        ?>
        <form method="POST" class="Usun">
            <input type="number" name="UsuńLiczbaJednorozec" min="1" max="<?php echo $_SESSION["jednorozec"];?>">
            <input type="submit" value="Usuń" name="UsunJednorozec">
            <input type="submit" value="Usuń wszystkie" name="UsunWszystkieJednorozec">
        </form>
        <?php
        echo("Cena za jedną sztukę: $_SESSION[CenaJednorozec] zł, Łącznie: $LacznieJednorozec zł<br>");
        if(isset($_POST["UsunJednorozec"]))
        {
            $_SESSION["jednorozec"] -= $_POST["UsuńLiczbaJednorozec"];
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if(isset($_POST["UsunWszystkieJednorozec"]))
        {
            unset($_SESSION["jednorozec"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
        if($_SESSION["jednorozec"]==0)
        {
            unset($_SESSION["jednorozec"]);
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
    }
    ?>
    <form method="POST">
        <input type="submit" value="Kup" name="Kup">
        <input type="submit" value="Opróżnij wszystko" name="Kosz">
    </form>
    <form action="sklep.php" method="POST">
        <input type="submit" value="Sklep">
    </form>
    <?php
        session_start();
        $LacznieWszystko = $LacznieKroliczek + $LacznieMisio + $LacznieMalpka + $LacznieSlonik + $LacznieZyrafa + $LacznieJednorozec;
        echo("Wartość koszyka: $LacznieWszystko zł<br>");
        if(isset($_POST["Kup"]))
        {
            if(isset($_SESSION["kroliczek"]) || isset($_SESSION["misio"]) || isset($_SESSION["malpka"]) || isset($_SESSION["slonik"]) || isset($_SESSION["zyrafa"]) || isset($_SESSION["jednorozec"]))
            {
                echo ("Kupiono:<br>");
                if(isset($_SESSION["kroliczek"]))
                {
                    echo ("Króliczek: $_SESSION[kroliczek]<br>");
                }
                if(isset($_SESSION["misio"]))
                {
                    echo ("Misio: $_SESSION[misio]<br>");
                }
                if(isset($_SESSION["malpka"]))
                {
                    echo ("Małpka: $_SESSION[malpka]<br>");
                }
                if(isset($_SESSION["slonik"]))
                {
                    echo ("Słonik: .$_SESSION[slonik]<br>");
                }
                if(isset($_SESSION["zyrafa"]))
                {
                    echo ("Żyrafa: $_SESSION[zyrafa]<br>");
                }
                if(isset($_SESSION["jednorozec"]))
                {
                    echo ("Jednorożec: $_SESSION[jednorozec]<br>");
                }
                echo("Zapłacono: $LacznieWszystko zł<br>");
                $_SESSION=array();
                echo("Przenoszenie na stronę sklepu...");
                header("Refresh:10 ; URL=sklep.php");
            }
            else
            {
                echo("Masz pusty koszyk");
            }
        }
        if(isset($_POST["Kosz"]))
        {
            $_SESSION=array();
            header("Location: ". $_SERVER["HTTP_REFERER"]);
        }
    ?>
</body>
</html>