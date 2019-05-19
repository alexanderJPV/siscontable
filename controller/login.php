<?php

session_start();
include_once ('../dao/usuarioDAO.php');
$user = addslashes(trim($_POST['user']));
$password = addslashes(trim($_POST['password']));

$arrayUsuario = UsuarioDao::recoverLoginPassword($user, $password);

if (count($arrayUsuario) > 0) {
    $_SESSION['user'] = $arrayUsuario[0]['login'];
    $_SESSION['user_id'] = $arrayUsuario[0]['idUsuario'];
    $_SESSION['cod_rol'] = $arrayUsuario[0]['codigo'];
    $respuesta = array(
        'success' => true
    );
} else {
    $respuesta = array(
        'success' => false,
        'msg' => 'No existe el usuario o su password es incorrecta'
    );
}
echo json_encode($respuesta);
?>