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
        Login<input type="text" name="Login"><br>
        Hasło<input type="password" name="Haslo"><br>
        Powtórz hasło<input type="password" name="PHaslo"><br>
        <input type="submit" value="Rejestruj">
    </form>
    <?php
    $Login=$_POST["Login"];
    $Haslo=$_POST["Haslo"];
    $PHaslo=$_POST["PHaslo"];
    if ($Haslo!=$PHaslo)
    {
        echo("Hasła niepoprawne");
    }
    else
    {
        $PlikLogin=fopen("login.txt", "w");
        fwrite($PlikLogin, "$Login");
        fclose($PlikLogin);
        $PlikHaslo=fopen("haslo.txt", "w");
        fwrite($PlikHaslo, "$Haslo");
        fclose($PlikHaslo);
        echo("");
    }
    ?>
</body>
</html>