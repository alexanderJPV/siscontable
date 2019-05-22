<?php

include_once('../controller/fpdf.php');
include_once('../controller/functions.php');

class PDF extends FPDF {

    function Header() {

        $this->Image('../images/logo_conta3163.jpg', 10, 8, 40);
        $this->SetFont('Arial', 'B', 14);

        $this->Cell(75);
        $this->Cell(60, 6, 'COROICO S.R.L "ELECTRODOMESTICOS"', 0, 1, 'C');
        $this->SetFont('Arial', '', 14);
        $this->Cell(55);
        $this->Cell(100, 8, 'LIBRO DIARIO', 0, 1, 'C');
        $this->Cell(75);
        $this->Cell(60, 6, 'al ' . getDateStringPDF(), 0, 1, 'C');
        $this->Cell(70);
        $this->Cell(70, 6, 'Expresado en Bolivianos', 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(113, 135, 172);
        $this->SetDrawColor(113, 135, 172);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(10, 10, '', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Fecha', 1, 0, 'C', 1);
        $this->Cell(100, 10, 'Cuenta', 1, 0, 'C', 1);
        $this->Cell(15, 10, 'Cod.', 1, 0, 'C', 1);
        $this->Cell(26, 10, 'Debe', 1, 0, 'C', 1);
        $this->Cell(26, 10, 'Haber', 1, 1, 'C', 1);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

include_once '../controller/readDiariosPrint.php';

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetDrawColor(113, 135, 172);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
$totalDebe = 0.00;
$totalHaber = 0.00;
for ($i = 0; $i < count($arrayDetalle); $i++) {
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(10, 10, ($i + 1), 1, 0, 'R', 0);
    $pdf->Cell(20, 10, convertDateMySQLToExt($arrayDetalle[$i]['fecha']), 1, 0, 'C', 0);
    $detalle = $arrayDetalle[$i]['detalle'];
    $sumDebe = 0.00;
    $sumHaber = 0.00;
    for ($j = 0; $j < count($detalle['asiento']); $j++) {
        //$pdf->SetFont('Arial', 'U', 10);
        if ($detalle['asiento'][$j]['debe'] > 0)
            $pdf->Cell(100, 10, $detalle['asiento'][$j]['nombre'], 1, 0, 'L', 0);
        else
            $pdf->Cell(100, 10, "      " . $detalle['asiento'][$j]['nombre'], 1, 0, 'L', 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(15, 10, $detalle['asiento'][$j]['codigo'], 1, 0, 'R', 0);
        $pdf->Cell(26, 10, $detalle['asiento'][$j]['debe'], 1, 0, 'R', 0);
        $pdf->Cell(26, 10, $detalle['asiento'][$j]['haber'], 1, 1, 'R', 0);
        if (($j + 1) != count($detalle['asiento'])) {
            $pdf->Cell(30, 10, "", 0, 0, 'R', 0);
        }
        $sumDebe += $detalle['asiento'][$j]['debe'];
        $sumHaber += $detalle['asiento'][$j]['haber'];
    }
    $totalDebe+=$sumDebe;
    $totalHaber+=$sumHaber;
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->Cell(20, 10, "", 0, 0, '', 0);
    $pdf->Cell(180, 10, "G: " . $detalle['glosa'], 1, 1, 'L', 0);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 10, "", 0, 0, '', 0);
    $pdf->Cell(115, 10, "Total: ", 1, 0, 'R', 0);
    $pdf->Cell(26, 10, toDecimal($sumDebe), 1, 0, 'R', 0);
    $pdf->Cell(26, 10, toDecimal($sumHaber), 1, 1, 'R', 0);
    $pdf->Ln(5);
}

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 10, "", 0, 0, '', 0);
$pdf->Cell(115, 10, "Total Libro Diario: ", 1, 0, 'R', 0);
$pdf->Cell(26, 10, toDecimal($totalDebe), 1, 0, 'R', 0);
$pdf->Cell(26, 10, toDecimal($totalHaber), 1, 1, 'R', 0);
$pdf->Output();
?>
