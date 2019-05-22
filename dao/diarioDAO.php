<?php

/*
 * @autor A66 
 */

include_once ('configRedBeanPHP.php');

class DiarioDao {

    public static function recoverAll() {
        $sql = "SELECT * FROM librodiario ORDER BY fecha ASC";
        $arrayDiario = R::getAll($sql);
        return($arrayDiario);
    }

    public static function addupdate($diario) {
        $exito = R::store($diario);
        return $exito;
    }

    public static function getMaxId() {
        $sql = "SELECT MAX(id) AS maximo FROM librodiario";
        $arrayDiario = R::getAll($sql);
        return($arrayDiario[0]['maximo']);
    }    
}

?>
