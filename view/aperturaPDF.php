<?php

include_once('../controller/fpdf.php');
include_once ('../controller/functions.php');

class PDF extends FPDF {

    function Header() {
        $this->Image('../images/logo_conta3163.jpg', 10, 8, 40);
        $this->SetFont('Arial', 'B', 14);

        $this->Cell(85);
        $this->Cell(25, 6, 'COROICO S.R.L "ELECTRODOMESTICOS"', 0, 1, 'C');
        $this->SetFont('Arial', '', 14);
        $this->Cell(70);
        $this->Cell(60, 8, 'BALANCE DE APERTURA', 0, 1, 'C');
        $this->Cell(85);
        $this->Cell(30, 6, 'Al '.  getDateStringPDF(), 0, 1, 'C');
        $this->Cell(80);
        $this->Cell(40, 6, 'Expresado en Bolivianos', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        $this->Cell(0, 10, 'Pagina' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

include_once '../controller/readApertura.php';

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(113, 135, 172);
$pdf->SetDrawColor(113, 135, 172);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20);
$pdf->Cell(100, 10, 'Activos', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Saldo', 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
for ($i = 0; $i < count($arrayActivos); $i++) {
    $pdf->Cell(20);
    $pdf->Cell(100, 10, $arrayActivos[$i]['cuenta'], 1, 0, 'L', 0);
    $pdf->Cell(50, 10, $arrayActivos[$i]['saldo'], 1, 1, 'R', 0);
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20);
$pdf->Cell(100, 10, "Total Activos", 0, 0, 'R', 0);
$pdf->Cell(50, 10, toDecimal($totalActivos), 1, 0, 'R', 0);
$pdf->Ln(15);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20);
$pdf->Cell(100, 10, 'Pasivos', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Saldo', 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
for ($i = 0; $i < count($arrayPasivos); $i++) {
    $pdf->Cell(20);
    $pdf->Cell(100, 10, $arrayPasivos[$i]['cuenta'], 1, 0, 'L', 0);
    $pdf->Cell(50, 10, $arrayPasivos[$i]['saldo'], 1, 1, 'R', 0);
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20);
$pdf->Cell(100, 10, "Total Pasivos", 0, 0, 'R', 0);
$pdf->Cell(50, 10, toDecimal($totalPasivos), 1, 0, 'R', 0);
$pdf->Ln(15);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20);
$pdf->Cell(100, 10, 'Patrimonios', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'Saldo', 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
for ($i = 0; $i < count($arrayPatrimonios); $i++) {
    $pdf->Cell(20);
    $pdf->Cell(100, 10, $arrayPatrimonios[$i]['cuenta'], 1, 0, 'L', 0);
    $pdf->Cell(50, 10, $arrayPatrimonios[$i]['saldo'], 1, 1, 'R', 0);
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20);
$pdf->Cell(100, 10, "Total Patrimonios", 0, 0, 'R', 0);
$pdf->Cell(50, 10, toDecimal($totalPatrimonios), 1, 0, 'R', 0);
$pdf->Ln(15);
$pdf->Cell(20);
$pdf->Cell(100, 10, "Total Pasivos y Patrimonios", 0, 0, 'R', 0);
$pdf->Cell(50, 10, toDecimal($totalPatrimonios + $totalPasivos), 1, 0, 'R', 0);
$pdf->Output();
?>
