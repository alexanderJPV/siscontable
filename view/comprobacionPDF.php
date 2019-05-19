<?php

include_once('../controller/fpdf.php');
include_once ('../controller/functions.php');
class PDF extends FPDF {

    function Header() {
        $this->Image('../images/logo_conta3163.jpg', 10, 8, 40);
        $this->SetFont('Arial', 'B', 14);

        $this->Cell(100);
        $this->Cell(60, 6, 'COROICO S.R.L. "ELECTRODOMESTICOS"', 0, 1, 'C');
        $this->SetFont('Arial', '', 14);
        $this->Cell(80);
        $this->Cell(90, 8, 'BALANCE DE COMPROBACION  DE SUMAS Y SALDOS', 0, 1, 'C');
        $this->Cell(100);
        $this->Cell(60, 6, 'Al '.  getDateStringPDF(), 0, 1, 'C');
        $this->Cell(95);
        $this->Cell(70, 6, 'Expresado en Bolivianos', 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(113, 135, 172);
        $this->SetDrawColor(113, 135, 172);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(10, 10, 'No.', 1, 0, 'C', 1);
        $this->Cell(80, 10, 'Cuenta', 1, 0, 'C', 1);
        $this->Cell(40, 10, 'Debe', 1, 0, 'C', 1);
        $this->Cell(40, 10, 'Haber', 1, 0, 'C', 1);
        $this->Cell(40, 10, 'Deudor', 1, 0, 'C', 1);
        $this->Cell(40, 10, 'Acreedor', 1, 1, 'C', 1);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

include_once '../controller/readComprobacion.php';

$pdf = new PDF('L', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetDrawColor(113, 135, 172);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
for ($i = 0; $i < count($arrayComprobacion); $i++) {
    $pdf->Cell(10, 10, $i + 1, 1, 0, 'R', 0);
    $pdf->Cell(80, 10, $arrayComprobacion[$i]['nombre'], 1, 0, 'L', 0);
    $pdf->Cell(40, 10, $arrayComprobacion[$i]['sumdebe'], 1, 0, 'R', 0);
    $pdf->Cell(40, 10, $arrayComprobacion[$i]['sumhaber'], 1, 0, 'R', 0);
    $pdf->Cell(40, 10, $arrayComprobacion[$i]['deudor'], 1, 0, 'R', 0);
    $pdf->Cell(40, 10, $arrayComprobacion[$i]['acreedor'], 1, 1, 'R', 0);
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, "", 0, 0, 'R', 0);
$pdf->Cell(80, 10, "Totales", 0, 0, 'R', 0);
$pdf->Cell(40, 10, $totalDebe, 1, 0, 'R', 0);
$pdf->Cell(40, 10, $totalHaber, 1, 0, 'R', 0);
$pdf->Cell(40, 10, $totalDeudor, 1, 0, 'R', 0);
$pdf->Cell(40, 10, $totalAcreedor, 1, 1, 'R', 0);
$pdf->Output();
?>
