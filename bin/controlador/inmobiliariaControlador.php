<?php 
use modelo\InmobiliariaModelo as Inmobiliaria;
use modelo\PropietarioModelo as Propietario;
if (file_exists(views.'inmobiliaria'.VISTA)){
    $inmobiliaria = new Inmobiliaria();
    $propietario = new Propietario();
    $modulo = 'Inmobiliaria';

    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'registrar') {
            $response = $inmobiliaria->incluir($_POST['cant_cuartos'], $_POST['metros'], $_POST['direccion'], $_POST['alicuota'], $_POST['id_propietario']);
            if ($response["resultado"]==1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => $modulo,
                    'message' => $response["mensaje"]
                ]);
                return 0;
            } else{
                echo json_encode([
                    'estatus' => '2',
                    'icon' => 'error',
                    'title' => $modulo,
                    'message' => $response["mensaje"]
                ]);
                return 0;
            }
            exit;
        } else if ($accion == 'eliminar') {
            $response = $inmobiliaria->eliminar($_POST['id']);
            if ($response['resultado'] == 1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => "Inmobiliaria: ",
                    'message' => $response['mensaje']
                ]);
            }else{
                echo json_encode([
                    'estatus' => '2',
                    'icon' => 'error',
                    'title' => $modulo,
                    'message' => $response["mensaje"]
                ]);
            }
            return 0;
            exit;
        } else if ($accion == 'modificar') {
            $response = $inmobiliaria->modificar($_POST['id'], $_POST['cant_cuartos'], $_POST['metros'], $_POST['direccion'], $_POST['alicuota'], $_POST['id_propietario']);
            if ($response['resultado']== 1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => $modulo,
                    'message' => $response['mensaje']
                ]);
            } else {
                echo json_encode([
                    'estatus' => '2',
                    'icon' => 'info',
                    'title' => $modulo,
                    'message' => $response['mensaje']
                ]);
            }
            return 0;
            exit;
        } else if ($accion == 'editar') {
            $datos = $inmobiliaria->cargar($_POST['id']);
            foreach ($datos as $valor) {
                echo json_encode([
                    'id' => $valor['id_inmobiliaria'],
                    'cant_cuartos' => $valor['cant_cuartos'],
                    'metros' => $valor['metros'],
                    'direccion' => $valor['direccion'],
                    'alicuota' => $valor['alicuota']
                ]);
            }
            return 0;
        }       
    }
    $r1 = $inmobiliaria->listar();
    $r2 = $propietario->listar();
    $datos = [];
    require_once views .'inmobiliaria'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>