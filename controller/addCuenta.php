<?php

/*
 * @autor A66 
 */

include_once 'session.php';
include_once '../dao/cuentaDAO.php';
include_once 'functions.php';

$cuenta = R::dispense("cuenta");

$cuenta->codigo = $_POST['codigo'];
$cuenta->nombre = $_POST['nombre'];
$cuenta->descripcion = $_POST['descripcion'];
$cuenta->tipo = $_POST['tipo'];
$cuenta->status = "publicado";

if (CuentaDao::addupdate($cuenta)) {
    $info = array(
        'success' => true,
        'msg' => 'Nuevo Registro almacenado satisfactoriamente'
    );
} else {
    $info = array(
        'success' => false,
        'msg' => 'Los datos NO han sido almacenados, intentelo de nuevo'
    );
}
echo json_encode($info);
?>




