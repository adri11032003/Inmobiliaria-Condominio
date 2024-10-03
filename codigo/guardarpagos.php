<?php
require_once 'conexion.php';

require 'menu.php';


    
if (!empty($_POST["guardarpagos"])) {
    if (!empty($_POST["fecha"]) and !empty($_POST["cedula"]) 
   and !empty($_POST["codigo_referencia"]) and !empty($_POST["monto"]))
{

    $id=$_POST["id"];
    $fecha=$_POST["fecha"];
    $cedula=$_POST["cedula"];
    $codigo_referencia=$_POST["codigo_referencia"];
    $monto=$_POST["monto"];
    
    
    $db= new DataBase();
    $conexion=$db->conectar();


    $sql=$conexion->query(" UPDATE pagos SET fecha='".$fecha."',cedula='".$cedula."'
    ,codigo_referencia='".$codigo_referencia."', monto='".$monto."' WHERE id_pagos='".$id."' ");




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
                            <a class="btn btn-primary" href="pagos.php">regresar</a>
                            </div>
                    </div>
                    
                        </main>

                    </body>

                    </html>
