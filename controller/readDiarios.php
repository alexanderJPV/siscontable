<?php

include_once 'session.php';
include_once '../dao/diarioDAO.php';
include_once '../dao/diarioDetalleDAO.php';
include_once 'functions.php';
$arrayDiario = DiarioDao::recoverAll();

$arrayDetalle=array();
for ($i = 0; $i < count($arrayDiario); $i++) {       
    $arrayDiarioDetalle = DiarioDetalleDao::recoverAsientoById($arrayDiario[$i]['id']);
    array_push($arrayDetalle, array('id'=>$arrayDiario[$i]['id'],'fecha'=>  convertDateMySQLToExt($arrayDiario[$i]['fecha']),'detalle'=>array('glosa'=>$arrayDiario[$i]['descripcion'],'asiento'=>$arrayDiarioDetalle)));
}
$start = 0;
$limit = count($arrayDetalle);
$resultado = array(
    'success' => true,
    'total' => count($arrayDetalle),
    'data' => array_splice($arrayDetalle, $start, $limit)
);
echo json_encode($resultado);

?>




