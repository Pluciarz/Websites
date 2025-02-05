<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator kodów kreskowych</title>
</head>
<body>
    <h1>Generator kodów kreskowych</h1>
    <img src="Obrazek.php" alt="Kod kreskowy">
    <form action="" method="POST">
        <label for="text">Ciąg znaków: </label>
        <input type="text" name="text" id="text"><br>
        <input type="submit" value="Generuj">
        <input type="reset" value="Czyść">
    </form>
    <?php
    session_start();
    $_SESSION["text"] = $_POST["text"];
    ?>
</body>
</html>