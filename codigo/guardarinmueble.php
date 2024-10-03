<?php
require_once 'conexion.php';

require 'menu.php';


    
if (!empty($_POST["guardarinmueble"])) {
    if (!empty($_POST["cant_cuartos"]) and !empty($_POST["metros"]) 
   and !empty($_POST["direccion"]) and !empty($_POST["alicuota"]))
{

    $id=$_POST["id"];
    $cant_cuartos=$_POST["cant_cuartos"];
    $metros=$_POST["metros"];
    $direccion=$_POST["direccion"];
    $alicuota=$_POST["alicuota"];
    
    
    $db= new DataBase();
    $conexion=$db->conectar();


    $sql=$conexion->query(" UPDATE inmobiliaria SET cant_cuartos='".$cant_cuartos."',metros='".$metros."'
    ,direccion='".$direccion."', alicuota='".$alicuota."' WHERE id_inmobiliaria='".$id."' ");




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
                            <a class="btn btn-primary" href="gastos.php">regresar</a>
                            </div>
                    </div>
                    
                        </main>

                    </body>

                    </html>
