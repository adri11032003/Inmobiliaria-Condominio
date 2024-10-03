<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class GastosModelo extends connectDB
{
    private $id;
    private $nombre;
    private $monto;
    private $fecha;
    private $id_tipogasto;

    public function incluir($nombre,$monto,$fecha,$id_tipogasto)
    {
            try {
                $this->conex->query("INSERT INTO gastos(nombre,monto,fecha,id_tipogasto)
					VALUES('$nombre','$monto','$fecha','$id_tipogasto')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        return $respuesta;
    }


    public function modificar($id, $nombre, $monto, $fecha, $id_tipogasto)
    {
        try {
            $this->conex->query("UPDATE gastos SET nombre='$nombre', monto='$monto', fecha='$fecha', id_tipogasto='$id_tipogasto' WHERE id_gastos='$id'");
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
            $this->conex->query("DELETE FROM gastos WHERE id_gastos = '$id'");
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
        $resultado = $this->conex->prepare("SELECT g.id_gastos,g.nombre as nombre,g.monto,g.fecha,t.nombre as tipo FROM gastos g INNER JOIN tipo_gastos t ON t.id_tipogasto = g.id_tipogasto;");
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
        $resultado = $this->conex->prepare("SELECT id_gastos, nombre, monto, fecha, id_tipogasto FROM gastos WHERE id_gastos = '$id'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }
    public function gastospormes()
    {
        $resultado = $this->conex->prepare("SELECT id_gastos, nombre, monto, fecha, 
        (SELECT SUM(monto) FROM gastos) AS total_monto
 FROM gastos");
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