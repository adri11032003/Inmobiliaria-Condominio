<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class CuotaModelo extends connectDB
{
    private $id;
    private $fecha;
    private $monto;
    private $id_pagos;
    private $id_inmobiliaria;


    public function incluir($fecha, $monto, $id_pagos, $id_inmobiliaria)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($correo);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El correo se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO cuota (fecha,monto,id_pagos,id_inmobiliaria)
					VALUE ('$fecha','$monto','$id_pagos','$id_inmobiliaria')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $fecha, $monto, $id_pagos, $id_inmobiliaria)
    {
        try {
            $this->conex->query("UPDATE cuota SET nombre='$fecha', monto='$monto', id_pagos='$id_pagos', id_inmobiliaria='$id_inmobiliaria' WHERE id_cuota='$id'");
            $respuesta['resultado']=1;
            $respuesta['mensaje']="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }

    public function listar()
    {
        $resultado = $this->conex->prepare("SELECT * FROM cuota");
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
        $resultado = $this->conex->prepare("SELECT id_propietario, fecha, monto, id_pagos, id_inmobiliaria FROM cuota WHERE id_cuota = '$id';");
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
}
