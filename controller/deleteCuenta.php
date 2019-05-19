<?php

include_once 'session.php';
include_once ('../dao/cuentaDAO.php');
$cuenta = R::dispense("cuenta");
$cuenta->id = $_POST['id'];
$cuenta->status = "eliminado";
if (CuentaDao::addupdate($cuenta)) {
    $info = array(
        'success' => true,
        'msg' => 'Registro eliminado'
    );
} else {
    $info = array(
        'success' => false,
        'msg' => 'Eliminacion fallida, intentelo de nuevo'
    );
}
echo json_encode($info);
?>




