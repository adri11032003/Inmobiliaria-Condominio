<?php 
use modelo\GastosModelo as Gastos;
use modelo\TipogastoModelo as Tipogasto;
if (file_exists(views.'gastos'.VISTA)){
    $gastos = new Gastos();
    $tipogasto = new Tipogasto();
    $modulo = 'Gastos';

    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'registrar') {
            $response = $gastos->incluir($_POST['nombre'], $_POST['monto'], $_POST['fecha'], $_POST['id_tipogasto']);
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
            $response = gastos->eliminar($_POST['id']);
            if ($response['resultado'] == 1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => "Gastos",
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
            $response = $gastos->modificar($_POST['id'], $_POST['nombre'], $_POST['monto'], $_POST['fecha'], $_POST['id_tipogasto']);
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
            $datos = $gastos->cargar($_POST['id']);
            foreach ($datos as $valor) {
                echo json_encode([
                    'id' => $valor['id_gastos'],
                    'nombre' => $valor['nombre'],
                    'monto' => $valor['monto'],
                    'fecha' => $valor['fecha'],
                    'id_tipogasto' => $valor['id_tipogasto'],
                ]);
            }
            return 0;
        }       
    }
    $r1 = $gastos->listar();
    $r2 = $tipogasto->listar();
    $datos = [];
    require_once views .'gastos'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>