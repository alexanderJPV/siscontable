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
        $this->Cell(60, 8, 'LIBRO MAYOR', 0, 1, 'C');
        $this->Cell(85);
        $this->Cell(30, 6, 'Al ' . getDateStringPDF(), 0, 1, 'C');
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

include_once '../controller/readMayor.php';

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(113, 135, 172);
$pdf->SetDrawColor(113, 135, 172);
$pdf->SetTextColor(255, 255, 255);

for ($i = 0; $i < count($arrayLibroMayor); $i++) {
    $asientos = $arrayLibroMayor[$i]['asientos'];
    if (count($asientos) > 0) {
        $sumDebe = 0.00;
        $sumHaber = 0.00;
        $pdf->Cell(20);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(170, 10, $arrayLibroMayor[$i]['cuenta'], 1, 1, 'C', 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20);
        $pdf->Cell(10, 10, '', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Fecha', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Nro. Asiento', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Debe', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Haber', 1, 1, 'C', 1);
        $pdf->SetFont('Arial', '', 10);
        for ($k = 0; $k < count($asientos); $k++) {

            $pdf->Cell(20);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->Cell(10, 10, ($k + 1), 1, 0, 'C', 1);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(40, 10, convertDateMySQLToExt($asientos[$k]['fecha']), 1, 0, 'C', 0);
            $pdf->Cell(40, 10, $asientos[$k]['iddiario'], 1, 0, 'R', 0);
            $pdf->Cell(40, 10, toDecimal($asientos[$k]['debe']), 1, 0, 'R', 0);
            $pdf->Cell(40, 10, toDecimal($asientos[$k]['haber']), 1, 1, 'R', 0);

            $sumDebe+=$asientos[$k]['debe'];
            $sumHaber+=$asientos[$k]['haber'];
        }
        $totalSaldoDebe = "";
        $totalSaldoHaber = "";
        if ($sumDebe > $sumHaber)
            $totalSaldoDebe = toDecimal($sumDebe - $sumHaber);
        if ($sumDebe < $sumHaber)
            $totalSaldoHaber = toDecimal($sumHaber - $sumDebe);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30);
        $pdf->Cell(80, 10, "Totales", 0, 0, 'R', 0);
        $pdf->Cell(40, 10, toDecimal($sumDebe), 1, 0, 'R', 0);
        $pdf->Cell(40, 10, toDecimal($sumHaber), 1, 1, 'R', 0);
        $pdf->Cell(30);
        $pdf->Cell(80, 10, "Saldo", 0, 0, 'R', 0);
        $pdf->Cell(40, 10, $totalSaldoDebe, 0, 0, 'R', 0);
        $pdf->Cell(40, 10, $totalSaldoHaber, 0, 1, 'R', 0);
        $pdf->Ln(15);
    }
}

$pdf->Output();
?>
