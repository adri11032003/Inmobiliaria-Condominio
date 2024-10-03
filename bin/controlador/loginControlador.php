<?php 
use modelo\UsuarioModelo as usuario;
use modelo\PropietarioModelo as propietario;
if (file_exists(views.'login'.VISTA)){
    $usuario = new usuario();
    $propietario = new propietario();
    $modulo = 'Iniciar Sesion:';
    session_start();
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'acceder') {   
            if($_POST['usuario']=="" || $_POST['clave']==""){
                echo json_encode([
                    'estatus' => '3',
                    'message' => "Complete los datos solicitados."
                ]);   
            }       
            $responseU = $usuario->verificarU($_POST['usuario'], $_POST['clave']);
            $responseP = $propietario->verificarU($_POST['usuario'], $_POST['clave']);
            if($responseU != 'false') {
                foreach ($responseU as $datos) {
                    $_SESSION['usuario'] = array('id' => $datos['id'], 'nombre' => $datos['usuario'],'ultimo_acceso' => $datos['ultimo_acceso'], 'rol' => $datos['rol']);
                }
                echo json_encode([
                    'estatus' => '1',
                    'message' => 'Incio exitoso'
                ]);  
                return 0;
            }
            else
            if($responseP != 'false') {
                foreach ($responseP as $datos) {
                    $_SESSION['usuario'] = array('id' => $datos['id_propietario'], 'nombre' => $datos['nombre'].' '.$datos['apellido'],'ultimo_acceso' => $datos['ultimo_acceso'], 'rol' => 'propietario');
                }
                echo json_encode([
                    'estatus' => '1',
                    'message' => 'Incio exitoso'
                ]);  
                return 0;
            }
            else
            {   
                echo json_encode([
                    'estatus' => '2',
                    'message' => 'Credenciales incorrectas, intente nuevamente'
                ]);  
                return 0;        
            }
        }
    }else {
        session_destroy();
    }
    require_once views .'login'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>