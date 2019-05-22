<?php

/*
 * @autor A66 
 */

include_once ('configRedBeanPHP.php');

class DiarioDetalleDao {

    public static function recoverAll() {
        $sql = "SELECT * FROM librodiariodetalle ORDER BY id ASC";
        $arrayDiario = R::getAll($sql);
        return($arrayDiario);
    }

    public static function addupdate($diario) {
        $exito = R::store($diario);
        return $exito;
    }

    public static function recoverAsientoById($id) {
        $sql = "SELECT * FROM librodiariodetalle AS ldd, cuenta AS c";
        $sql.=" WHERE c.id=ldd.id_cuenta AND ldd.id_diario = " . $id ." ORDER BY ldd.id";
        $arrayDiarioDetalle = R::getAll($sql);
        return($arrayDiarioDetalle);
    }
     public static function recoverMayorByIdCuenta($id) {
        $sql = "SELECT *,ld.id AS iddiario FROM librodiariodetalle AS ldd, librodiario AS ld";
        $sql.=" WHERE ld.id=ldd.id_diario AND ldd.id_cuenta = " . $id ." ORDER BY ld.fecha ASC";
        $arrayAsientosDiarioDetalle = R::getAll($sql);
        return($arrayAsientosDiarioDetalle);
    }

}

?>
