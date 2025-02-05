<?php
if (isset($_POST["submit"]))
{
    $con = mysqli_connect("localhost", "root", "", "dane");
    $tytul = $_POST["tytul"];
    $gatunek = $_POST["gatunek"];
    $rok = $_POST["rok"];
    $ocena = $_POST["ocena"];
    $query = "INSERT INTO `filmy`(`gatunki_id`, `tytul`, `rok`, `ocena`) VALUES ('$gatunek', '$tytul', '$rok', '$ocena');";
    mysqli_query($con, $query);
    echo ("Film $tytul został dodany do bazy");
    mysqli_close($con);
}
?>