<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class PropietarioModelo extends connectDB
{
    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $telefono;
    private $correo;



    public function incluir($nombre, $apellido, $cedula, $telefono, $correo)
    {
        $respuesta = [];
        
        // Validar nombre
        if (!preg_match('/^[a-zA-Z]+$/', $nombre)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo letras en el campo Nombre.";
            return $respuesta;
        }
        
        // Validar apellido
        if (!preg_match('/^[a-zA-Z]+$/', $apellido)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo letras en el campo Apellido.";
            return $respuesta;
        }
        
        // Validar cédula
        if (!ctype_digit($cedula)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo números en el campo Cédula.";
            return $respuesta;
        }
    
        // Validar telefono
        if (!ctype_digit($telefono)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo números en el campo Telefono.";
            return $respuesta;
        }
        
        // Validar correo electrónico
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese un correo electrónico válido.";
            return $respuesta;
        }
        

//inicio de lo que creo que no funciona

        // Validar registro antes de insertar
        $validar_registro = $this->validar_registro($correo);
        if ($validar_registro['resultado'] == 1) {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El correo se encuentra registrado.";
        } else {
            try {
                $this->conex->query("INSERT INTO propietario (nombre,apellido,cedula,telefono,correo)
                    VALUE ('$nombre','$apellido','$cedula','$telefono','$correo')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;

        //fin de lo que creo que no funciona
        
    }

    public function modificar($id, $nombre, $apellido, $cedula, $telefono, $correo)
    {
        try {
            $this->conex->query("UPDATE propietario SET nombre='$nombre', apellido='$apellido', cedula='$cedula', telefono='$telefono', correo='$correo' WHERE id_propietario='$id'");
            $respuesta['resultado']=1;
            $respuesta['mensaje']="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }

    public function eliminar($id)
    {
        try {
            $this->conex->query("DELETE from propietario WHERE id_propietario = '$id'");
            $respuesta['resultado'] = 1;
            $respuesta['mensaje'] = "Eliminacion exitosa";
            return $respuesta;
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
    } 

    public function listar()
    {
        $resultado = $this->conex->prepare("SELECT * FROM propietario");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cargar($id)
    {
        $resultado = $this->conex->prepare("SELECT id_propietario, nombre, apellido, cedula, telefono, correo FROM propietario WHERE id_propietario = '$id';");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
            if($respuestaArreglo == NULL){
                return false;
            }
            else{
                return true;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    private function validar_registro($correo)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM propietario WHERE correo='$correo'");
            $resultado->execute();
            $fila = $resultado->fetchAll();
            if ($fila) {
                return 'false';
            } else {
                return 'true';
            }
        } catch (Exception $e) {
            return 'false';
        }
    }

    public function mostrar_cuota($fecha_desde, $fecha_hasta, $id)
    {
        $gastos = $this->conex->prepare("SELECT SUM(monto) as total FROM gastos WHERE fecha > '$fecha_desde' AND fecha < '$fecha_hasta'");
        $informacion = [];
        try {
            $gastos->execute();
            $respuestaArreglo = $gastos->fetchAll();
            foreach($respuestaArreglo as $dato){
                $informacion['gastos'] = $dato['total'];
            }
            $alicuota = $this->conex->prepare("SELECT i.alicuota as alicuota FROM inmobiliaria i INNER JOIN propietario p ON p.id_propietario=i.id_propietario WHERE p.id_propietario='$id';");
            $alicuota->execute();
            $alicuotas = $alicuota->fetchAll();
            foreach($alicuotas as $dato){
                $informacion['alicuota'] = $dato['alicuota'];
            }
            $informacion['cuota'] = $informacion['gastos'] * $informacion['alicuota'] /100;
            $listar_gastos = $this->conex->prepare("SELECT *FROM gastos WHERE fecha > '$fecha_desde' AND fecha < '$fecha_hasta'");
            $listar_gastos->execute();
            $listar = $listar_gastos->fetchAll();
            foreach($listar as $dato){
                $informacion['lista'] = array('nombre' => $dato['nombre'], 'monto' => $dato['monto']);
            }
              
            return $informacion;
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function verificarU($cedula, $clave)
    {
        $resultado = $this->conex->prepare("SELECT *FROM propietario WHERE cedula = '$cedula' AND contasena='$clave';");
        try {
            $resultado->execute();
            $respuesta1 = $resultado->rowCount();
            $datos = $resultado->fetchAll();
            if($respuesta1 === 0) {
                return 'false';
            }
            else{
                $this->actualizar_fecha_acceso($cedula);
                return $this->datos_UserRU($cedula);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function datos_UserRU($cedula)
    {
        $resultado = $this->conex->prepare("SELECT * FROM propietario WHERE cedula ='$cedula'");
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    private function actualizar_fecha_acceso($cedula)
    {   
        $resultado = $this->conex->query("UPDATE propietario SET ultimo_acceso = NOW()  WHERE cedula = '$cedula'");
        try {
            $resultado->execute();
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listar11()
    {
        $resultado = $this->conex->prepare("SELECT id_propietario, nombre, apellido, cedula, telefono, correo,
                                        (SELECT COUNT(*) FROM propietario) AS total_propietarios
                                            FROM propietario");
    
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }


}

