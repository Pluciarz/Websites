<?php
session_start();
$vin = $_SESSION["vin"];
$con=mysqli_connect("localhost", "root", "", "wypozyczalnia");
$query = "SELECT * FROM `samochody` WHERE `nr_VIN`='$vin';";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row["skrzynia_biegow"] == "ręczna")
{
    $row["skrzynia_biegow"] = "reczna";
}
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',30);
$pdf->Cell(190,40,"Dane pojazdu $row[nr_VIN]",0,2,'C');
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30, 10, "Nr VIN: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, $row['nr_VIN'], 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30, 10, "Model: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, $row['model'], 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(85, 10, "Koszt wypozyczenia na 1 dzien: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, "$row[koszt_na_1_dzien] zl", 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(50, 10, "Liczba miejsc: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, $row['liczba_miejsc'], 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(50, 10, "Liczba bagazy: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, $row['liczba_bagazy'], 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(50, 10, "Liczba drzwi: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, $row['liczba_drzwi'], 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(49, 10, "Klimatyzacja: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, $row['klimatyzacja'], 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(50, 10, "Skrzynia biegow: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(0, 10, $row['skrzynia_biegow'], 0, 1);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30, 40, "Zdjecie: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 15);
$pdf->Image("zdjecia/$row[zdjecie]",50,140,50);
$pdf->Output();
?>