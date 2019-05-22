<?php

include_once 'session.php';
include_once '../dao/cuentaDAO.php';
include_once '../dao/diarioDetalleDAO.php';
include_once 'functions.php';
$arrayCuenta = CuentaDao::recoverAllOrderCuenta();
$arrayLibroMayor=array();
for ($i = 0; $i < count($arrayCuenta); $i++) {
    $arrayAsientos = DiarioDetalleDao::recoverMayorByIdCuenta($arrayCuenta[$i]['id']);        
    array_push($arrayLibroMayor, array("cuenta"=>$arrayCuenta[$i]['nombre'],"asientos"=>$arrayAsientos));   
}


?>




