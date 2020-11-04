<?php
    include('conexion.php');

    $obj = new Conexion;

    $usuario = $_POST['inputUser'];
    $pass    = $_POST['inputPassword'];

    //$text   = "Nombre : " . $usuario . "Contraseña : " . $pass;

    $res = $obj->buscarUsuario($usuario, $pass);

    if($ress == 1){
        $datos = array('dato' => 'ok');
    }else{
        $datos = array('dato' => 'no');
    }

    echo json_encode($datos, JSON_FORCE_OBJECT);
 
?>

