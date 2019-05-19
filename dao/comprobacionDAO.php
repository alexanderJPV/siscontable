<?php

/*
 * @autor A66 
 */

include_once ('configRedBeanPHP.php');

class ComprobacionDao {

    public static function recoverAll() {
        $sql = "SELECT c.nombre, sum(ldd.debe) AS sumdebe,sum(ldd.haber) AS sumhaber FROM librodiariodetalle AS ldd, cuenta AS c WHERE ldd.id_cuenta=c.id GROUP BY id_cuenta ORDER BY c.tipo";
        $arrayComprobacion = R::getAll($sql);
        return($arrayComprobacion);
    }  
      
}

?>
