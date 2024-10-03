<?php 

use modelo\PropietarioModelo as Propietario;
$propietario = new Propietario();
session_start();
if (file_exists(views.'dashboard'.VISTA)){
    date_default_timezone_set('America/Caracas');
    $dia_actual = date("d");
    $mes_actual = date("m");
    $fecha_desde = '2024-'.$mes_actual.'-01' ;
    $fecha_hasta = '2024-'.$mes_actual.'-30' ;
    if($dia_actual === '03' && $_SESSION['usuario']["rol"]== 'propietario'){
        $respuesta = $propietario->mostrar_cuota($fecha_desde, $fecha_hasta, $_SESSION['usuario']["id"]);
    }
    else{
        $respuesta = null;
    }
    require_once views .'dashboard'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>