<?php

include_once 'session.php';
include_once '../dao/cuentaDAO.php';
include_once 'functions.php';
$arrayCuenta = CuentaDao::recoverAll();
$arrayComboCuenta = array();
$palabra = $_POST['palabra'];

for ($i = 0; $i < count($arrayCuenta); $i++) {
    if (strtoupper($palabra) == strtoupper(substr($arrayCuenta[$i]['nombre'], 0, strlen($palabra)))) {
        array_push($arrayComboCuenta, array('valueS' => $arrayCuenta[$i]['id'], 'nameS' => $arrayCuenta[$i]['nombre']));
    }
}

$resultado = array(
    'num' => count($arrayComboCuenta),
    'data' => $arrayComboCuenta
);
echo json_encode($resultado);
?>