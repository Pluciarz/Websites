<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFillColor(255,0,0);
$pdf->Rect(0,0,210,297,'F');
$pdf->SetTextColor(0,255,0);
$pdf->SetFont('Arial','B',30);
$pdf->Cell(190,10,'Wesolych Swiat!',0,2,'C');
$pdf->SetTextColor(255,165,0);
$pdf->Cell(190,40,'I dobrych prezentow!',0,2,'C');
$pdf->Image('Zdjecia/107222970-projekt-wektora-gwiazdy.png',80,50,50);
$randR = rand(0,255);
$randG = rand(0,255);
$randB = rand(0,255);
$pdf->SetFillColor($randR,$randG,$randB);
$c=85;
$w=20;
$h=15;
$pdf->Ln(32);
for($i = 0; $i < 10; $i++)
{
    for($j = 0; $j < 10; $j++)
    {
        $randR = rand(0,255);
        $randG = rand(0,255);
        $randB = rand(0,255);
        $pdf->SetFillColor($randR,$randG,$randB);
    }
    $pdf->Cell($c);
    $pdf->Cell($w,$h,'',0,1,'C',(true));
    $w += 10;
    $c -= 5;
}
$pdf->SetFillColor(150,0,0);
$pdf->Cell(88,15,'',0,0,'C',(false));
$pdf->Cell(15,15,'',0,0,'C',(true));
$pdf->Output();
?>