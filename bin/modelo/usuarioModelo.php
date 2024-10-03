<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class UsuarioModelo extends connectDB
{
    private $id;
    private $usuario;
    private $password;
    private $ultimo_acceso;
    private $rol;


    public function incluir($usuario, $password, $ultimo_acceso, $rol)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($usuario);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El usuario se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO usuarios (usuario,password,ultimo_acceso,rol)
					VALUE ('$usuario','$password','$ultimo_acceso','$rol')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $usuario, $password, $ultimo_acceso, $rol)
    {
        try {
            $this->conex->query("UPDATE usuarios SET usuario='$usuario', password='$password', ultimo_acceso='$ultimo_acceso', rol='$rol' WHERE id='$id'");
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
            $this->conex->query("DELETE from usuarios WHERE id = '$id'");
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
        $resultado = $this->conex->prepare("SELECT * FROM usuarios");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cargar($usario, $clave)
    {
        $resultado = $this->conex->prepare("SELECT *FROM usuarios WHERE usuario = '$usuario' AND password='$clave';");
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

    private function validar_registro($usuario)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM usuarios WHERE usuario='$usuario'");
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


    public function verificarU($usuario, $clave)
    {
        $resultado = $this->conex->prepare("SELECT *FROM usuarios WHERE usuario = '$usuario' AND password='$clave';");
        try {
            $resultado->execute();
            $respuesta1 = $resultado->rowCount();
            $datos = $resultado->fetchAll();
            if($respuesta1 === 0) {
                return 'false';
            }
            else{
                $this->actualizar_fecha_acceso($usuario);
                return $this->datos_UserRU($usuario);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function datos_UserRU($usuario)
    {
        $resultado = $this->conex->prepare("SELECT * FROM usuarios WHERE usuario ='$usuario'");
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    private function actualizar_fecha_acceso($usuario)
    {   
        $resultado = $this->conex->query("UPDATE usuarios SET ultimo_acceso = NOW()  WHERE usuario = '$usuario'");
        try {
            $resultado->execute();
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
