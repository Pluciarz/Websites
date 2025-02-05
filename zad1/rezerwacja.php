<?php
if (isset($_POST["submit"]))
{
    echo ("Dodano rezerwację do bazy");
    $con = mysqli_connect("localhost", "root", "", "baza");
    $data = $_POST["data"];
    $osoby = $_POST["osoby"];
    $telefon = $_POST["telefon"];
    $zgoda = $_POST["zgoda"];
    $query = "INSERT INTO `rezerwacje` VALUES ('', NULL, '$data', '$osoby', '$telefon');";
    mysqli_query($con, $query);
    mysqli_close($con);
}
?>