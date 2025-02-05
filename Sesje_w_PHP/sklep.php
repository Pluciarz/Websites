<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
</head>
<body>
    <h1>Sklep z pluszakami</h1>
    <form method="POST">
        <label for="kroliczek">Króliczek</label>
        <input type="number" name="kroliczek" id="kroliczek" min="1"><br>
        <label for="misio">Misio</label>
        <input type="number" name="misio" id="misio" min="1"><br>
        <label for="malpka">Małpka</label>
        <input type="number" name="malpka" id="malpka" min="1"><br>
        <label for="slonik">Słonik</label>
        <input type="number" name="slonik" id="slonik" min="1"><br>
        <label for="zyrafa">Żyrafa</label>
        <input type="number" name="zyrafa" id="zyrafa" min="1"><br>
        <label for="jednorozec">Jednorożec</label>
        <input type="number" name="jednorozec" id="jednorozec" min="1"><br>
        <input type="submit" value="Dodaj" name="Dodaj"><br>
    </form>
    <form action="koszyk.php" method="POST">
        <input type="submit" value="Koszyk">
    </form>
    <?php
    error_reporting(0);
    $CenaKroliczek=19.99;
    $CenaMisio=29.99;
    $CenaMalpka=24.99;
    $CenaSlonik=14.99;
    $CenaZyrafa=34.99;
    $CenaJednorozec=39.99;
    echo("Ceny:<br>Króliczek: $CenaKroliczek zł<br>Misio: $CenaMisio zł<br>Małpka: $CenaMalpka zł<br>Słonik: $CenaSlonik zł<br>Żyrafa: $CenaZyrafa zł<br>Jednorożec: $CenaJednorozec zł<br>");
    session_start();
    $kroliczek=$_POST["kroliczek"];
    $misio=$_POST["misio"];
    $malpka=$_POST["malpka"];
    $slonik=$_POST["slonik"];
    $zyrafa=$_POST["zyrafa"];
    $jednorozec=$_POST["jednorozec"];
    $_SESSION["CenaKroliczek"] = $CenaKroliczek;
    $_SESSION["CenaMisio"] = $CenaMisio;
    $_SESSION["CenaMalpka"] = $CenaMalpka;
    $_SESSION["CenaSlonik"] = $CenaSlonik;
    $_SESSION["CenaZyrafa"] = $CenaZyrafa;
    $_SESSION["CenaJednorozec"] = $CenaJednorozec;
    if(!empty($_POST['kroliczek']))
    {
    $_SESSION["kroliczek"] += $kroliczek;
    }
    if(!empty($_POST['misio']))
    {
    $_SESSION["misio"] += $misio;
    }
    if(!empty($_POST['malpka']))
    {
    $_SESSION["malpka"] += $malpka;
    }
    if(!empty($_POST['slonik']))
    {
    $_SESSION["slonik"] += $slonik;
    }
    if(!empty($_POST['zyrafa']))
    {
    $_SESSION["zyrafa"] += $zyrafa;
    }
    if(!empty($_POST['jednorozec']))
    {
    $_SESSION["jednorozec"] += $jednorozec;
    }     
    if(isset($_POST["Dodaj"]))
    {
        echo("Dodano do koszyka");
    }
    ?>
</body>
</html>