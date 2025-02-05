<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauracja Wszystkie Smaki</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <header>
        <h1>Witamy w restauracji "Wszystkie Smaki"</h1>
    </header>
    <section id="lewy">
       <img src="menu.jpg" alt="Nasze danie"> 
    </section>
    <section id="prawy">
        <h4>U nas dobrze zjesz!</h4>
        <ul>
            <li>Obiady od 40 zł</li>
            <li>Przekąski od 10 zł</li>
            <li>Kolacje od 20 zł</li>
        </ul>
    </section>
    <section id="dolny">
        <h2>Zarezerwuj stolik on-line</h2>
        <form action="rezerwacja.php" method="POST">
            <label for="data">Data (format rrrr-mm-dd):</label><br>
            <input type="text" name="data" id="data"><br>
            <label for="osoby">Ile osób?:</label><br>
            <input type="number" name="osoby" id="osoby"><br>
            <label for="telefon">Twój numer telefonu:</label><br>
            <input type="text" name="telefon" id="telefon"><br>
            <input type="checkbox" name="zgoda" id="zgoda">
            <label for="zgoda">Zgadzam się na przetwarzanie moich danych osobowych</label><br>
            <input type="reset" value="WYCZYŚĆ">
            <input type="submit" value="REZERWUJ" name="submit">
        </form>
    </section>
    <footer>
        Stronę internetową opracował: <em>Adam Dąbrowski</em>
    </footer>
</body>
</html>