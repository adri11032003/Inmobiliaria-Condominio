<?php

require_once 'conexion.php';

require 'menu.php';



$db= new DataBase();
$conexion=$db->conectar();

$id= $_GET['id'];

$query= $conexion->prepare("SELECT fecha, cedula, codigo_referencia, monto  FROM pagos WHERE id_pagos = :id");

$query->execute(['id' => $id]);
$row = $query->fetch(PDO::FETCH_ASSOC);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="diseño.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<div class="login-container">
<form  action="guardarpagos.php" method="POST" class="col-4 p-3 m-auto">
    <input type="hidden" id="id"  name="id" value="<?php echo $id;  ?>">
    <h1 class="text-center">Modificar Pago</h1>
    

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha</label>
                    <input type="text" class="form-control" name="fecha" value="<?php echo $row['fecha'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                    <input type="text" class="form-control" name="cedula" value="<?php echo $row['cedula'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Codigo de referencia </label>
                    <input type="text" class="form-control" name="codigo_referencia" value="<?php echo $row['codigo_referencia'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Monto</label>
                    <input type="text" class="form-control" name="monto" value="<?php echo $row['monto'];?>">
                </div>
                
                <div
                    class="col-md-12">
                <button type="submit" class="btn btn-primary" name="guardarpagos" value="ok">Guardar Pago Modificado</button>
                <a href="pagos.php" class="btn btn-dark">Regresar</a>
</div>
            </form>
       
    </div>
 </body>
</html>
