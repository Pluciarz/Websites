<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for ($i=0; $i<10; $i++)
    {
        $tab[$i]=rand(0,100);
    }
    for ($i=0; $i<10; $i++)
    {
        echo("$tab[$i] ");
    }
    echo("<br>");
    $min=$tab[0];
    $max=$tab[0];
    for ($i=0; $i<10; $i++)
    {
       if($min>$tab[$i])
        {
            $min=$tab[$i];
        }
    if($max<$tab[$i])
        {
            $max=$tab[$i];
        }
    }
    echo("Minimalna wartość wynosi $min<br>");
    echo("Maksymalna wartość wynosi $max<br>");
    $pom=$tab[0];
    do
    {
    $x=1;
    for($i=0; $i<9; $i++)
    {
        for($i=0; $i<9; $i++)
        {
            if($tab[$i]>$tab[$i+1])
            {
            $pom=$tab[$i];
            $tab[$i]=$tab[$i+1];
            $tab[$i+1]=$pom;
            $x=$x+1;
            }
        }
    }
    }
    while($x!=1);
    for($i=0; $i<10; $i++)
    {
        echo("$tab[$i] ");
    }
    ?>
</body>
</html>