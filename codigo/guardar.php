<?php
require_once 'conexion.php';

require 'menu.php';


     

if (!empty($_POST["guardar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cedula"]) 
   and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["contraseña"])){

    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $cedula=$_POST["cedula"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    $contraseña=$_POST["contraseña"];
    
    $db= new DataBase();
    $conexion=$db->conectar();


    $sql=$conexion->query(" UPDATE propietario SET nombre='".$nombre."',apellido='".$apellido."'
    ,cedula='".$cedula."', telefono='".$telefono."',correo='".$correo."',contraseña='".$contraseña."' 
    WHERE id_propietario='".$id."' ");




    if ($sql==true){
        echo '<div class="alert alert-success"> Nuevo Propietario Registrado Correctamente</div>';
     }else{
         echo '<div class="alert alert-danger">Error de Nuevo Registro de Propietario</div>';
     }
 }else{
     echo '<div class="alert alert-warning">Alguno de los Campos esta Vacio</div>';
 }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="diseño.css">
</head>
<body class="py-3">
    <main class="container">
       

                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="crud propietarios.php">regresar</a>
                            </div>
                    </div>
                    
                        </main>

                    </body>

                    </html>

