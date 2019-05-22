<?php

include_once('../controller/fpdf.php');
include_once ('../controller/functions.php');
$num=0;

class PDF extends FPDF {

    function Header() {
        $this->Image('../images/logo_conta3163.jpg', 10, 8, 40);
        $this->SetFont('Arial', 'B', 14);

        $this->Cell(100);
        $this->Cell(60, 6, 'COROICO S.R.L. "ELECTRODOMESTICOS"', 0, 1, 'C');
        $this->SetFont('Arial', '', 14);
        $this->Cell(80);
        $this->Cell(98, 8, 'HOJA DE TRABAJO 10 COLUMNAS', 0, 1, 'C');
        $this->Cell(100);
        $this->Cell(60, 6, 'Al '.  getDateStringPDF(), 0, 1, 'C');
        $this->Cell(95);
        $this->Cell(70, 6, 'Expresado en Bolivianos', 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(113, 135, 172);
        $this->SetDrawColor(113, 135, 172);
        $this->SetTextColor(255, 255, 255);

        $this->Cell(8, 10, '', 1, 0, 'C', 1);
        $this->Cell(60, 10, '', 1, 0, 'C', 1);
        $this->Cell(40, 10, 'Saldos', 1, 0, 'C', 1);
        $this->Cell(36, 10, 'Ajustes', 1, 0, 'C', 1);
        $this->Cell(38, 10, 'Saldos Ajustados', 1, 0, 'C', 1);
        $this->Cell(36, 10, 'Estado de Resultados', 1, 0, 'C', 1);
        $this->Cell(38, 10, 'Balance General', 1, 1, 'C', 1);

        $this->Cell(8, 10, 'No.', 1, 0, 'C', 1);
        $this->Cell(60, 10, 'Detalle', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Deudor', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Acreedor', 1, 0, 'C', 1);
        $this->Cell(18, 10, 'Debe', 1, 0, 'C', 1);
        $this->Cell(18, 10, 'Haber', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Deudor', 1, 0, 'C', 1);
        $this->Cell(18, 10, 'Acreedor', 1, 0, 'C', 1);
        $this->Cell(18, 10, 'Gastos', 1, 0, 'C', 1);
        $this->Cell(18, 10, 'Ingresos', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Activos', 1, 0, 'C', 1);
        $this->Cell(18, 10, 'Pasivos Pr.', 1, 1, 'C', 1);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

include_once '../controller/readColumnas10.php';

$pdf = new PDF('L', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(6);
$pdf->SetDrawColor(113, 135, 172);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);

for ($i = 0; $i < count($arrayResultado); $i++) {
      $num=$i;
    $pdf->Cell(8, 10, $i + 1, 1, 0, 'R', 0);
    $pdf->Cell(60, 10, $arrayResultado[$i]['nombre'], 1, 0, 'L', 0);
    $pdf->Cell(20, 10, $arrayResultado[$i]['deudor'], 1, 0, 'R', 0);
    $pdf->Cell(20, 10, $arrayResultado[$i]['acreedor'], 1, 0, 'R', 0);
    $pdf->Cell(18, 10, $arrayResultado[$i]['ajusteDebe'], 1, 0, 'R', 0);
    $pdf->Cell(18, 10, $arrayResultado[$i]['ajusteHaber'], 1, 0, 'R', 0);
    $pdf->Cell(20, 10, $arrayResultado[$i]['deudor'], 1, 0, 'R', 0);
    $pdf->Cell(18, 10, $arrayResultado[$i]['acreedor'], 1, 0, 'R', 0);
    $pdf->Cell(18, 10, $arrayResultado[$i]['gastos'], 1, 0, 'R', 0);
    $pdf->Cell(18, 10, $arrayResultado[$i]['ingresos'], 1, 0, 'R', 0);
    $pdf->Cell(20, 10, $arrayResultado[$i]['activos'], 1, 0, 'R', 0);
    $pdf->Cell(18, 10, $arrayResultado[$i]['pasivos'], 1, 1, 'R', 0);

}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 10, "", 0, 0, 'R', 0);
$pdf->Cell(60, 10, "Totales", 1, 0, 'R', 0);
//para imprimir la parte de los totales:
$pdf->Cell(20, 10,$totalDeudor, 1, 0, 'R', 0);
$pdf->Cell(20, 10, $totalAcreedor, 1, 1, 'R', 0);
$num+=1;
/*para imprimir depresiaciones:*/
for ($i=0; $i < count($arrayAjustesMostrar); $i++) {
  $num+=1;
  $pdf->Cell(8, 10,$num, 1, 0, 'R', 0);
  if($arrayAjustesMostrar[$i]['nombre']=='Depreciacion de muebles y enseres de oficina'){
      $pdf->Cell(60, 10,'Dep. de muebles y enseres de of.', 1, 0, 'L', 0);
  }elseif ($arrayAjustesMostrar[$i]['nombre']=='Depreciacion acumulada Muebles y enseres de oficina') {
    $pdf->Cell(60, 10,'Dep. acum. de muebles y enseres de of.', 1, 0, 'L', 0);
  }else {
    $pdf->Cell(60, 10,$arrayAjustesMostrar[$i]['nombre'], 1, 0, 'L', 0);
  }
  $pdf->Cell(20, 10,$arrayAjustesMostrar[$i]['deudor'], 1, 0, 'R', 0);
  $pdf->Cell(20, 10,$arrayAjustesMostrar[$i]['acreedor'], 1, 0, 'R', 0);
  $pdf->Cell(18, 10,$arrayAjustesMostrar[$i]['ajusteDebe'], 1, 0, 'R', 0);
  $pdf->Cell(18, 10,$arrayAjustesMostrar[$i]['ajusteHaber'], 1, 0, 'R', 0);
  $pdf->Cell(20, 10,$arrayAjustesMostrar[$i]['deudor'], 1, 0, 'R', 0);
  $pdf->Cell(18, 10,$arrayAjustesMostrar[$i]['acreedor'], 1, 0, 'R', 0);
  $pdf->Cell(18, 10,$arrayAjustesMostrar[$i]['gastos'], 1, 0, 'R', 0);
  $pdf->Cell(18, 10,$arrayAjustesMostrar[$i]['ingresos'], 1, 0, 'R', 0);
  $pdf->Cell(20, 10,$arrayAjustesMostrar[$i]['activos'], 1, 0, 'R', 0);
  $pdf->Cell(18, 10,$arrayAjustesMostrar[$i]['pasivos'], 1, 1, 'R', 0);

}
$pdf->Cell(8, 10, '', 'R', 0);
$pdf->Cell(60, 10, 'Totales', 1, 0, 'L', 0);
$pdf->Cell(20, 10, $totalDeudorAJ, 1, 0, 'R', 0);
$pdf->Cell(20, 10, $totalAcreedorAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $totalAjustesDebeAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $totalAjustesHaberAJ, 1, 0, 'R', 0);
$pdf->Cell(20, 10, $totalAjustesDebeSaldoAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $totalAjustesHaberSaldoAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $totalGastosAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $totalIngresosAJ, 1, 0, 'R', 0);
$pdf->Cell(20, 10, $totalActivosAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $totalPasivosAJ, 1, 1, 'R', 0);

$pdf->Cell(8, 10, '', 'R', 0);
$pdf->Cell(60, 10, 'Utilidad del Periodo', 1, 0, 'L', 0);
$pdf->Cell(20, 10, '', 1, 0, 'R', 0);
$pdf->Cell(20, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, '', 1, 0, 'R', 0);
$pdf->Cell(20, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, $gastosAuxAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $ingresosAuxAJ, 1, 0, 'R', 0);
$pdf->Cell(20, 10, $activosAuxAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $pasivosAuxAJ, 1, 1, 'R', 0);

$pdf->Cell(8, 10, '', 'R', 0);
$pdf->Cell(60, 10, 'Total Final', 1, 0, 'L', 0);
$pdf->Cell(20, 10, '', 1, 0, 'R', 0);
$pdf->Cell(20, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, '', 1, 0, 'R', 0);
$pdf->Cell(20, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, '', 1, 0, 'R', 0);
$pdf->Cell(18, 10, $gastosAuxAJ+$totalGastosAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $ingresosAuxAJ+$totalIngresosAJ, 1, 0, 'R', 0);
$pdf->Cell(20, 10, $activosAuxAJ+$totalActivosAJ, 1, 0, 'R', 0);
$pdf->Cell(18, 10, $pasivosAuxAJ+$totalPasivosAJ, 1, 1, 'R', 0);

$pdf->Output();
?>
