<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class TasadiaModelo extends connectDB
{
    private $id;
    private $valor;
    private $fecha;


    public function incluir($valor, $fecha)
    {
            try {
                $this->conex->query("INSERT INTO tasa_del_dia(valor,fecha)
					VALUES('$valor','$fecha')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        return $respuesta;
    }


    public function modificar($id, $valor, $fecha)
    {
        try {
            $this->conex->query("UPDATE tasa_del_dia SET valor='$valor',fecha='$fecha'");
            $respuesta["resultado"]=1;
            $respuesta["mensaje"]="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }

    public function eliminar($id)
    {
        try {
            $this->conex->query("DELETE from tasa_del_dia WHERE id_tasadia = '$id'");
            $respuesta['resultado'] = 1;
            $respuesta['mensaje'] = "Eliminacion exitosaaaa";
            return $respuesta;
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
    } 

    public function listar()
    {
        $resultado = $this->conex->prepare("SELECT * FROM tasa_del_dia");
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
        $resultado = $this->conex->prepare("SELECT id_tasadia, valor, fecha FROM tasa_del_dia WHERE id_tasadia = '$id'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cargarPorFecha($fecha)
    {
        $resultado = $this->conex->prepare("SELECT id_tasadia, valor, fecha FROM tasa_del_dia WHERE fecha = :fecha");
        $resultado->bindParam(':fecha', $fecha);
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