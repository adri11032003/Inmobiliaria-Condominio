<?php
require_once 'conexion.php';

if (!empty($_POST["btnregistrar"])) {
     if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cedula"]) 
    and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["contraseña"])) {
     
  
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $cedula=$_POST["cedula"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $contraseña=$_POST["contraseña"];

        $db= new DataBase();
        $conexion=$db->conectar();
        
        $sql=$conexion->query(" INSERT INTO propietario(nombre,apellido,cedula,telefono,correo,contraseña)values
        ('$nombre','$apellido','$cedula','$telefono','$correo','$contraseña') ");
        if ($sql==true){
           echo '<div class="alert alert-success">Propietario Registrado Correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al Registrar Propietario</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Alguno de los Campos esta Vacio</div>';
    }
}
?>
