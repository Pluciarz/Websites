<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" ENCTYPE="multipart/form-data">
   <input type="file" name="plik"/><br/>
   <input type="submit" value="Wyslij plik"/>
 </form>
 <?php 
    if(isset($_FILES['plik'])) 
    {
        if ($_FILES['plik']['error'] != 0) 
        {
            echo ("Błąd wysyłania pliku");
        }
        else
        {
            if ($_FILES['plik']['size'] == 0) 
            {
                echo ("Brak pliku");
            }
            else
            {
                $dozwolonepliki  = array('jpg', 'jpeg', 'png', 'gif');
                $plikrozszerzenie  = pathinfo(strtolower($_FILES['plik']['name']), PATHINFO_EXTENSION);
                if(!in_array($plikrozszerzenie, $dozwolonepliki, true))
                {
                    echo "Nieprawidłowe rozszerzenie pliku";
                }
                else
                {
                    move_uploaded_file($_FILES['plik']['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'].'/AdamD_2D/zdjecia/'.$_SESSION['login'].$_FILES['plik']['name']);
                }
            }
        }
    }
?>       
</body>
</html>