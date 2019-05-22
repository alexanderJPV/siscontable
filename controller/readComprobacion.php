<?php

include_once 'session.php';
include_once '../dao/comprobacionDAO.php';
include_once 'functions.php';
$arrayComprobacion = ComprobacionDao::recoverAll();
for ($i = 0; $i < count($arrayComprobacion); $i++) {
    if ($arrayComprobacion[$i]['sumdebe'] != $arrayComprobacion[$i]['sumhaber']) {
        if ($arrayComprobacion[$i]['sumdebe'] > $arrayComprobacion[$i]['sumhaber']) {
            $arrayComprobacion[$i]['deudor'] = $arrayComprobacion[$i]['sumdebe'] - $arrayComprobacion[$i]['sumhaber'];
            $arrayComprobacion[$i]['acreedor'] = "0.00";
        } else {
            $arrayComprobacion[$i]['acreedor'] = $arrayComprobacion[$i]['sumhaber'] - $arrayComprobacion[$i]['sumdebe'];
            $arrayComprobacion[$i]['deudor'] = "0.00";
        }
    } else {
        $arrayComprobacion[$i]['deudor'] = "0.00";
        $arrayComprobacion[$i]['acreedor'] = "0.00";
    }
}
$totalDebe = 0.00;
$totalHaber = 0.00;
$totalDeudor = 0.00;
$totalAcreedor = 0.00;

for ($i = 0; $i < count($arrayComprobacion); $i++) {

    $totalDebe+=$arrayComprobacion[$i]['sumdebe'];
    $totalHaber+=$arrayComprobacion[$i]['sumhaber'];
    $totalDeudor+=$arrayComprobacion[$i]['deudor'];
    $totalAcreedor+=$arrayComprobacion[$i]['acreedor'];
}
?>




