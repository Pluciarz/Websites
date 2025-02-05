<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<h1>Kalkulator równania kwadratowego</h1>
	<form method="post" action="">
		a:<input type="number" name="a" step="any" required><br>
		b:<input type="number" name="b" step="any" required><br>
		c:<input type="number" name="c" step="any" required><br>
		<input type="submit" name="oblicz" value="Oblicz">
	</form>
	<?php
		if(isset($_POST['oblicz']))
        {
			$a = $_POST['a'];
			$b = $_POST['b'];
			$c = $_POST['c'];
			
			$delta = $b*$b - 4*$a*$c;
			
			if($delta < 0)
            {
				echo "Brak rozwiązań rzeczywistych";
			}
			elseif($delta == 0)
            {
				$x = -$b/(2*$a);
				echo "Jedno rozwiązanie: x = ".$x;
			}
			else
            {
				$x1 = (-$b-sqrt($delta))/(2*$a);
				$x2 = (-$b+sqrt($delta))/(2*$a);
				echo "Dwa rozwiązania: x1 = ".$x1.", x2 = ".$x2;
			}
		}
	?>
	</body>
</html>
