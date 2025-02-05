<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
function convert_to_utf8($text)
{
    return iconv('utf-8', 'iso-8859-2', $text);
}
$pdf->AddFont('arialpl', '', 'fpdf\font\arialpl.php');
$pdf->SetFont('arialpl','B',30);
$text='Polskie znaki: ąćęłńóśźż';
$pdf->Cell(40, 10, convert_to_utf8($text));
$pdf->Output();
?>