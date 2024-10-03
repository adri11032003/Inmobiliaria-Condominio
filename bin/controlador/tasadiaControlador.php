<?php 
use modelo\TasadiaModelo as Tasadia;
if (file_exists(views.'tasadia'.VISTA)){
    $tasadia = new Tasadia();
    $modulo = 'Tasadia';

    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'registrar') {
            $response = $tasadia->incluir($_POST['valor'], $_POST['fecha']);
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
            $response = $tasadia->eliminar($_POST['id']);
            if ($response['resultado'] == 1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => "tasadia",
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
            $response = $tasadia->modificar($_POST['id'], $_POST['valor'], $_POST['fecha']);
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
            $datos = $tasadia->cargar($_POST['id']);
            foreach ($datos as $valor) {
                echo json_encode([
                    'id' => $valor['id_tasadia'],
                    'valor' => $valor['valor'],
                    'fecha' => $valor['fecha'],
                ]);
            }
            return 0;
        }       
    }
    $r1 = $tasadia->listar();
    $datos = [];
    require_once views .'tasadia'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>