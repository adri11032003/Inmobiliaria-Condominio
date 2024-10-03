<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class InmobiliariaModelo extends connectDB
{
    private $id;
    private $cant_cuartos;
    private $metros;
    private $direccion;
    private $alicuota;
    private $id_propietario;


    public function incluir($cant_cuartos, $metros, $direccion, $alicuota, $id_propietario)
    {
        $respuesta = [];
            try {
                $this->conex->query("INSERT INTO inmobiliaria(cant_cuartos,metros,direccion,alicuota,id_propietario)
					VALUES('$cant_cuartos','$metros','$direccion','$alicuota','$id_propietario')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        return $respuesta;
    }


    public function modificar($id, $cant_cuartos, $metros, $direccion, $alicuota, $id_propietario)
    {
        try {
            $this->conex->query("UPDATE inmobiliaria SET cant_cuartos='$cant_cuartos',metros='$metros'direccion='$direccion',alicuota='$alicuota',id_propietario='$id_propietario' WHERE id_inmobiliaria='$id'");
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
            $this->conex->query("DELETE from inmobiliaria WHERE id_inmobiliaria = '$id'");
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
        $resultado = $this->conex->prepare("SELECT i.id_inmobiliaria,i.cant_cuartos, i.metros, i.direccion, i.alicuota, p.nombre, p.apellido FROM propietario p INNER JOIN inmobiliaria i ON p.id_propietario = i.id_propietario;");
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
        $resultado = $this->conex->prepare("SELECT id_inmobiliaria, cant_cuartos, metros, direccion, alicuota, id_propietario FROM inmobiliaria WHERE id_inmobiliaria = '$id'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function propietario($id_propietario)
    {
        $resultado = $this->conex->prepare("SELECT id_propietario FROM inmobiliaria");
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