<?php

include_once '../dao/resultadoDAO.php';
include_once '../controller/functions.php';
$arrayResultado = ResultadoDao::recoverAll();
for ($i = 0; $i < count($arrayResultado); $i++) {
    if ($arrayResultado[$i]['sumdebe'] != $arrayResultado[$i]['sumhaber']) {
        if ($arrayResultado[$i]['sumdebe'] > $arrayResultado[$i]['sumhaber']) {
            $arrayResultado[$i]['deudor'] = $arrayResultado[$i]['sumdebe'] - $arrayResultado[$i]['sumhaber'];
            $arrayResultado[$i]['acreedor'] = "0.00";
        } else {
            $arrayResultado[$i]['acreedor'] = $arrayResultado[$i]['sumhaber'] - $arrayResultado[$i]['sumdebe'];
            $arrayResultado[$i]['deudor'] = "0.00";
        }
    } else {
        $arrayResultado[$i]['deudor'] = "0.00";
        $arrayResultado[$i]['acreedor'] = "0.00";
    }
}

for ($i = 0; $i < count($arrayResultado); $i++) {
    if ($arrayResultado[$i]['tipo'] == "INGRESO") {
        $arrayResultado[$i]['ingresos'] = $arrayResultado[$i]['deudor']+ $arrayResultado[$i]['acreedor'];
        $arrayResultado[$i]['gastos'] ="0.00";
        $arrayResultado[$i]['activos'] = "0.00";
        $arrayResultado[$i]['pasivos'] = "0.00";
    }
    if ($arrayResultado[$i]['tipo'] == "EGRESO") {
        $arrayResultado[$i]['ingresos'] = "0.00";
        $arrayResultado[$i]['gastos'] = $arrayResultado[$i]['acreedor']+$arrayResultado[$i]['deudor'];
        $arrayResultado[$i]['activos'] = "0.00";
        $arrayResultado[$i]['pasivos'] = "0.00";
    }
    if ($arrayResultado[$i]['tipo'] == "ACTIVO") {
        $arrayResultado[$i]['ingresos'] = "0.00";
        $arrayResultado[$i]['gastos'] = "0.00";
        $arrayResultado[$i]['activos'] =  $arrayResultado[$i]['acreedor']+$arrayResultado[$i]['deudor'];
        $arrayResultado[$i]['pasivos'] = "0.00";
    }
    if ($arrayResultado[$i]['tipo'] == "PASIVO" || $arrayResultado[$i]['tipo'] == "PATRIMONIO") {
        $arrayResultado[$i]['ingresos'] = "0.00";
        $arrayResultado[$i]['gastos'] = "0.00";
        $arrayResultado[$i]['activos'] = "0.00";
        $arrayResultado[$i]['pasivos'] = $arrayResultado[$i]['acreedor']+$arrayResultado[$i]['deudor'];
    }
}

$totalDeudor = 0.00;
$totalAcreedor = 0.00;
$totalGastos = 0.00;
$totalIngresos = 0.00;
$totalActivos = 0.00;
$totalPasivos = 0.00;



for ($i = 0; $i < count($arrayResultado); $i++) {

    $totalDeudor+=$arrayResultado[$i]['deudor'];
    $totalAcreedor+=$arrayResultado[$i]['acreedor'];
    $totalGastos +=$arrayResultado[$i]['gastos'];
    $totalIngresos +=$arrayResultado[$i]['ingresos'];
    $totalActivos +=$arrayResultado[$i]['activos'];
    $totalPasivos +=$arrayResultado[$i]['pasivos'];
}

$utilidadResultados = 0.00;
$utilidadBalance = 0.00;
$gastosAux = 0.00;
$ingresosAux = 0.00;
$activosAux = 0.00;
$pasivosAux = 0.00;
if (($totalIngresos - $totalGastos) >= 0.00) {
    $gastosAux = $totalIngresos - $totalGastos;
} else {
    $ingresosAux = $totalGastos - $totalIngresos;
}
if ($gastosAux > 0.00) {
    $pasivosAux=$gastosAux;
} else {
    $activosAux=$ingresosAux;
}
?>




