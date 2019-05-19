<?php

/*
 * @autor A66 
 */

include_once 'session.php';
include_once '../dao/diarioDAO.php';
include_once '../dao/diarioDetalleDAO.php';
include_once 'functions.php';

$diario = R::dispense("librodiario");

$diario->fecha = convertDateToMySQL($_POST['fecha']);
$diario->descripcion = $_POST['glosa'];
$diario->tipo_asiento = $_POST['tipoAsiento'];

if (DiarioDao::addupdate($diario)) {
    $idDiario = DiarioDao::getMaxId();
    $numReg = explode("---", $_POST['comboCuentaParams']);
    for ($i = 0; $i < count($numReg); $i++) {
        $diarioDetalle = R::dispense("librodiariodetalle");
        $diarioDetalle->id_cuenta = $numReg[$i];
        $diarioDetalle->debe = $_POST['debe' . ($i + 1)];
        $diarioDetalle->haber = $_POST['haber' . ($i + 1)];
        $diarioDetalle->id_diario = $idDiario;
        DiarioDetalleDao::addupdate($diarioDetalle);
    }
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




