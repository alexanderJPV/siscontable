<?php

/*
 * @autor A66 
 */

include_once ('configRedBeanPHP.php');

class UsuarioDao {
    
    public static function recoverLoginPassword($user, $password) {
        $arrayUsuario = R::getAll("SELECT *,usuario.id AS idUsuario FROM usuario,rol WHERE login='".$user."' AND password='".$password."' AND usuario.rol_id=rol.id;");
        return($arrayUsuario);
    }
}

?>
