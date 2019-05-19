<?php

include_once 'session.php';
include_once '../dao/cuentaDAO.php';
include_once 'functions.php';
$arrayCuenta = CuentaDao::recoverAll();

$start = 0;
$limit = count($arrayCuenta);
$resultado = array(
    'success' => true,
    'total' => count($arrayCuenta),
    'data' => array_splice($arrayCuenta, $start, $limit)
);
echo json_encode($resultado);

?>




