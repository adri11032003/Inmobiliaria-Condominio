<?php 
use modelo\PropietarioModelo as Propietario;
if (file_exists(views.'propietario'.VISTA)){
    $propietario = new Propietario();
    $modulo = 'Propietario';

    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'registrar') {
            $response = $propietario->incluir($_POST['nombre'], $_POST['apellido'], $_POST['cedula'], $_POST['telefono'], $_POST['correo']);
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
            $response = $propietario->elimina($_POST['id']);
            if ($response['resultado'] == 1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => "Propietario: ",
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
            $response = $propietario->modificar($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['cedula'], $_POST['telefono'], $_POST['correo']);
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
            $datos = $propietario->cargar($_POST['id']);
            foreach ($datos as $valor) {
                echo json_encode([
                    'id' => $valor['id_propietario'],
                    'nombre' => $valor['nombre'],
                    'apellido' => $valor['apellido'],
                    'cedula' => $valor['cedula'],
                    'telefono' => $valor['telefono'],
                    'correo' => $valor['correo']
                ]);
            }
            return 0;
        }       
    }
    $r1 = $propietario->listar();
    $datos = [];
    require_once views .'propietario'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>