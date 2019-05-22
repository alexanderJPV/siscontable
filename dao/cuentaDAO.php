<?php

/*
 * @autor A66 
 */

include_once ('configRedBeanPHP.php');

class CuentaDao {

    public static function recoverAll() {
        $arrayCuenta = R::getAll("SELECT * FROM cuenta WHERE status='publicado' ORDER BY tipo ASC");
        return($arrayCuenta);
    }
     public static function recoverAllOrderCuenta() {
        $arrayCuenta = R::getAll("SELECT * FROM cuenta WHERE status='publicado' ORDER BY nombre ASC");
        return($arrayCuenta);
    }

    public static function addupdate($cuenta) {
        $exito = R::store($cuenta);
        return $exito;
    }

}

?>
