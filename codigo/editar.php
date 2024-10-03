
<?php

require_once 'conexion.php';

require 'menu.php';



$db= new DataBase();
$conexion=$db->conectar();

$id= $_GET['id'];

$query= $conexion->prepare("SELECT nombre, apellido, cedula, telefono, correo, contraseña  FROM propietario WHERE id_propietario = :id");

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
<form  action="guardar.php" method="POST" class="col-4 p-3 m-auto">
    <input type="hidden" id="id"  name="id" value="<?php echo $id;  ?>">
    <h1 class="text-center">Modificar Propietario</h1>
    

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="<?php echo $row['apellido'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                    <input type="text" class="form-control" name="cedula" value="<?php echo $row['cedula'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo" value="<?php echo $row['correo'];?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" name="contraseña" value="<?php echo $row['contraseña'];?>">
                </div>
                <div
                    class="col-md-12">
                <button type="submit" class="btn btn-primary" name="guardar" value="ok">Guardar Propietario Modificado</button>
                <a href="crud propietarios.php" class="btn btn-dark">Regresar</a>
</div>
            </form>
       
    </div>
 </body>
</html>
