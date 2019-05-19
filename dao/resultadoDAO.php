<?php

/*
 * @autor A66 
 */

include_once ('configRedBeanPHP.php');

class ResultadoDao {

    public static function recoverAll() {
        $sql = "SELECT c.nombre,c.tipo,c.extra,c.id AS idCuenta, sum(ldd.debe) AS sumdebe,sum(ldd.haber) AS sumhaber FROM librodiariodetalle AS ldd, librodiario AS ld, cuenta AS c WHERE ldd.id_cuenta=c.id AND ldd.id_diario=ld.id GROUP BY id_cuenta ORDER BY c.tipo";
        $arrayResultado = R::getAll($sql);
        return($arrayResultado);
    }

    public static function recoverAllByTipoAsiento($tipoAsiento) {
        $sql = "SELECT c.nombre,c.tipo,c.id AS idCuenta, sum(ldd.debe) AS sumdebe,sum(ldd.haber) AS sumhaber FROM librodiariodetalle AS ldd, librodiario AS ld, cuenta AS c WHERE ldd.id_cuenta=c.id AND ldd.id_diario=ld.id AND ld.tipo_asiento='".$tipoAsiento."' GROUP BY id_cuenta ORDER BY c.tipo";
        $arrayResultado = R::getAll($sql);
        return($arrayResultado);
    }

}

?>
