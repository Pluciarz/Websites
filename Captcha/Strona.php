<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
</head>
<body>
    <img src="Obrazek.php" alt="Captcha">
    <form action="" method="POST">
        <input type="text" name="test" id="test"><br>
        <input type="submit" value="Sprawdź">
    </form>
    <?php
    $test = $_POST["test"];
    if ($test == $_SESSION["tekst"])
    {
        echo ("Pomyślnie zweryfikowano");
    }
    else
    {
        echo ("Spróbuj ponownie");
    }
    ?>
</body>
</html>