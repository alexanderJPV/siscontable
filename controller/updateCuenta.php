<?php

include_once 'session.php';
include_once '../dao/cuentaDAO.php';
include_once 'functions.php';
$cuenta = R::dispense("cuenta");

$cuenta->id = $_POST['idf'];
$cuenta->codigo = $_POST['codigof'];
$cuenta->nombre = $_POST['nombref'];
$cuenta->descripcion = $_POST['descripcionf'];
$cuenta->tipo = $_POST['tipof'];

if (CuentaDao::addupdate($cuenta)) {
    $info = array(
        'success' => true,
        'msg' => 'Los datos han sido actualizados satisfactoriamente'
    );
} else {
    $info = array(
        'success' => false,
        'msg' => 'Los datos NO han sido almacenados, intentelo de nuevo'
    );
}
echo json_encode($info);
?>




