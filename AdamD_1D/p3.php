<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Podaj a<input type="number" name="a"><br>
        Podaj b<input type="number" name="b"><br>
        <select name="Działanie">
            <option value="Wybierz">Wybierz działanie</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="submit" value="Oblicz"><br>
    </form>
    <?php
        $a=$_POST["a"];
        $b=$_POST["b"];
        if (empty($a) || empty($b))
            {
                echo("Uzupełnij dane");
            }
        else
            {
                if ($_POST["Działanie"]=="Wybierz")
                    {
                    echo("Musisz wybrać działanie");
                    }
            
        else
            {
                if ($_POST["Działanie"]=="+")
                    {
                        $suma=$a+$b;
                        echo("$a+$b=$suma<br>");
                    }
                if ($_POST["Działanie"]=="-")
                    {
                        $roznica=$a-$b;
                        echo("$a-$b=$roznica<br>");
                    }
                if ($_POST["Działanie"]=="*")
                    {
                        $iloczyn=$a*$b;
                        echo("$a*$b=$iloczyn<br>");
                    }
                if ($_POST["Działanie"]=="/")
                    {
                        if($b=="0")
                            {
                                echo("Nie można dzielić przez zero");
                            }
                        else
                            {    
                                $iloraz=$a/$b;
                                echo("$a/$b=$iloraz<br>");
                            }
                    }
                }
            }
    ?>
</body>
</html>