<?php
// fpdf
require_once '../fpdf/fpdf.php';

// Path: process\generate.php
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->Ln(20);
$pdf->Cell(40, 10, 'probando!');
//save pdf file
$pdf->Output('../pdf/example.pdf', 'F');


?>