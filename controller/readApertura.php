<?php

include_once 'session.php';
include_once '../dao/diarioDetalleDAO.php';
include_once 'functions.php';
$arrayApertura = DiarioDetalleDao::recoverAsientoById(1);

$totalActivos = 0.00;
$totalPasivos = 0.00;
$totalPatrimonios = 0.00;

$arrayActivos = array();
$arrayPasivos = array();
$arrayPatrimonios = array();

for ($i = 0; $i < count($arrayApertura); $i++) {

    if ($arrayApertura[$i]['tipo'] == "ACTIVO") {
        $totalActivos +=$arrayApertura[$i]['debe'];
        array_push($arrayActivos, array('cuenta' => $arrayApertura[$i]['nombre'], 'saldo' => $arrayApertura[$i]['debe']));
    }
    if ($arrayApertura[$i]['tipo'] == "PASIVO") {
        $totalPasivos += $arrayApertura[$i]['haber'];;
        array_push($arrayPasivos, array('cuenta' => $arrayApertura[$i]['nombre'], 'saldo' => $arrayApertura[$i]['haber']));
    }
    if ($arrayApertura[$i]['tipo'] == "PATRIMONIO") {
        
        array_push($arrayPatrimonios, array('cuenta' => $arrayApertura[$i]['nombre'], 'saldo' => $arrayApertura[$i]['haber']));
    }
}
$totalPatrimonios = $totalActivos - $totalPasivos;
?>




