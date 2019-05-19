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
        $this->Cell(98, 8, 'HOJA DE TRABAJO 6 COLUMNAS', 0, 1, 'C');
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
        $this->Cell(70, 10, 'Cuenta', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Deudor', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Acreedor', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Gastos', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Ingresos', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Activos', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Pasivos y Pr.', 1, 1, 'C', 1);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

include_once '../controller/readResultados.php';

$pdf = new PDF('L', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetDrawColor(113, 135, 172);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
for ($i = 0; $i < count($arrayResultado); $i++) {
    $pdf->Cell(10, 10, $i + 1, 1, 0, 'R', 0);
    $pdf->Cell(70, 10, $arrayResultado[$i]['nombre'], 1, 0, 'L', 0);
    $pdf->Cell(30, 10, $arrayResultado[$i]['deudor'], 1, 0, 'R', 0);
    $pdf->Cell(30, 10, $arrayResultado[$i]['acreedor'], 1, 0, 'R', 0);
    $pdf->Cell(30, 10, $arrayResultado[$i]['gastos'], 1, 0, 'R', 0);
    $pdf->Cell(30, 10, $arrayResultado[$i]['ingresos'], 1, 0, 'R', 0);
    $pdf->Cell(30, 10, $arrayResultado[$i]['activos'], 1, 0, 'R', 0);
    $pdf->Cell(30, 10, $arrayResultado[$i]['pasivos'], 1, 1, 'R', 0);
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, "", 0, 0, 'R', 0);
$pdf->Cell(70, 10, "Totales", 0, 0, 'R', 0);
$pdf->Cell(30, 10, $totalDeudor, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $totalAcreedor, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $totalGastos, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $totalIngresos, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $totalActivos, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $totalPasivos, 1, 1, 'R', 0);

$pdf->Cell(10, 10, "", 0, 0, 'R', 0);
$pdf->Cell(70, 10, "Utilidad del Periodo", 0, 0, 'R', 0);
$pdf->Cell(30, 10, "", 0, 0, 'R', 0);
$pdf->Cell(30, 10, "", 0, 0, 'R', 0);
$pdf->Cell(30, 10, $gastosAux, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $ingresosAux, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $activosAux, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $pasivosAux, 1, 1, 'R', 0);

$pdf->Cell(10, 10, "", 0, 0, 'R', 0);
$pdf->Cell(70, 10, "", 0, 0, 'R', 0);
$pdf->Cell(30, 10, "", 0, 0, 'R', 0);
$pdf->Cell(30, 10, "", 0, 0, 'R', 0);
$pdf->Cell(30, 10, $gastosAux + $totalGastos, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $ingresosAux + $totalIngresos, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $activosAux + $totalActivos, 1, 0, 'R', 0);
$pdf->Cell(30, 10, $pasivosAux + $totalPasivos, 1, 1, 'R', 0);

$pdf->Output();
?>
