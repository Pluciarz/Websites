<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administracyjny</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    error_reporting(0);
    session_start();
    if ($_SESSION["login"] != "admin")
    {
        header("Location:index.php");
    }
    ?>
    <header>
        <h1>Panel administracyjny</h1>
    </header>
    <nav>
        <a href="index.php">Strona główna</a>
        <form action="" method="POST">
            <input type="submit" value="Wyloguj" name="Wyloguj" class="Wyloguj">
        </form>
        <?php
        if(isset($_POST["Wyloguj"]))
        {
            session_destroy();
            header("Location:logowanie.php");
        }
        ?>
    </nav>
    <main class="admin-main">
        <a href="uzytkownicy.php" class="admin-link">Zarządzanie użytkownikami</a>
        <a href="samochody.php" class="admin-link">Zarządzanie samochodami</a>
    </main>
    <footer>
        <p>Stronę wykonał: Adam Dąbrowski</p>
    </footer>
</body>
</html>