<?php

include_once '../dao/resultadoDAO.php';
include_once '../controller/functions.php';
$arrayResultado = ResultadoDao::recoverAll();

$totalActivos = 0.00;
$totalPasivos = 0.00;
$totalPatrimonios = 0.00;
$totalIngresos = 0.00;
$totalEgresos = 0.00;

$arrayActivos = array();
$arrayPasivos = array();
$arrayPatrimonios = array();
$arrayIngresos = array();
$arrayEgresos = array();

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
    if ($arrayResultado[$i]['tipo'] == "ACTIVO") {
        $totalActivos +=$arrayResultado[$i]['deudor'] + $arrayResultado[$i]['acreedor'];
        array_push($arrayActivos, $arrayResultado[$i]);
    }
    if ($arrayResultado[$i]['extra'] == "D") {
        $totalActivos +=$arrayResultado[$i]['deudor'] - $arrayResultado[$i]['acreedor'];
        $arrayResultado[$i]['acreedor'] = -$arrayResultado[$i]['acreedor'];
        array_push($arrayActivos, $arrayResultado[$i]);
    }
    if ($arrayResultado[$i]['tipo'] == "PASIVO" && $arrayResultado[$i]['extra'] != "D") {
        $totalPasivos += $arrayResultado[$i]['deudor'] + $arrayResultado[$i]['acreedor'];
        array_push($arrayPasivos, $arrayResultado[$i]);
    }

    if ($arrayResultado[$i]['tipo'] == "INGRESO") {
        $totalIngresos += $arrayResultado[$i]['deudor'] + $arrayResultado[$i]['acreedor'];
        array_push($arrayIngresos, $arrayResultado[$i]);
    }
    if ($arrayResultado[$i]['tipo'] == "EGRESO") {
        $totalEgresos += $arrayResultado[$i]['deudor'] + $arrayResultado[$i]['acreedor'];
        array_push($arrayEgresos, $arrayResultado[$i]);
    }
    if ($arrayResultado[$i]['tipo'] == "PATRIMONIO") {
        $totalPatrimonios += $arrayResultado[$i]['deudor'] + $arrayResultado[$i]['acreedor'];
        array_push($arrayPatrimonios, $arrayResultado[$i]);
    }
}
if ($totalIngresos > $totalEgresos) {
    $totalPatrimonios += ($totalIngresos - $totalEgresos);
    $mensajeResultado = "Utilidad : " . ($totalIngresos - $totalEgresos);
    array_push($arrayPatrimonios, array("nombre" => "Utilidad", "deudor" => 0.00, "acreedor" => ($totalIngresos - $totalEgresos)));
} else {
    $totalPatrimonios += ($totalIngresos - $totalEgresos);
    $mensajeResultado = "Perdida : " . ($totalEgresos - $totalIngresos);
    array_push($arrayPatrimonios, array("nombre" => "Perdida", "deudor" => 0.00, "acreedor" => ($totalIngresos - $totalEgresos)));
}
?>




