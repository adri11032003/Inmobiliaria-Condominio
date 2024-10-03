
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo inmueble</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="diseño.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function validarFormulario1() {
            var cantCuartos = document.forms["formulario"]["cant_cuartos"].value;
            var metros = document.forms["formulario"]["metros"].value;
            var alicuota = document.forms["formulario"]["alicuota"].value;
            var direccion = document.forms["formulario"]["direccion"].value;

            if (cantCuartos == "" || isNaN(cantCuartos)) {
                alert("Por favor ingresa una cantidad válida de cuartos.");
                return false;
            }

            if (metros == "" || isNaN(metros)) {
                alert("Por favor ingresa una cantidad válida de metros.");
                return false;
            }

            if (alicuota == "" || isNaN(alicuota)) {
                alert("Por favor ingresa una alicuota válida.");
                return false;
            }

            if (direccion == "") {
                alert("Por favor ingresa una dirección.");
                return false;
            }

            // Aquí podrías hacer una llamada AJAX para enviar los datos al backend y guardar en tu base de datos

            // Simulación de envío exitoso
            if (confirm("¿Estás seguro de enviar el formulario y guardar en el CRUD?")) {
                // Aquí puedes agregar la lógica para enviar los datos al backend y guardarlos en tu base de datos
                // Si todo sale bien, puedes mostrar un mensaje de éxito
                alert("¡Formulario enviado y guardado en el CRUD exitosamente!");
                return true; // O bien, puedes redireccionar a otra página después de guardar los datos
            } else {
                return false; // Si el usuario cancela el envío, evita que el formulario se envíe
            }
        }
    </script>
</head>
<body>

<div class="login-container">
<form  name="formulario" action="guardar1inmueble.php" method="POST" class="col-4 p-3 m-auto" onsubmit="return validarFormulario1()">
    <h1 class="text-center">Nuevo inmueble</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cantidad de cuartos</label>
                    <input type="text" class="form-control" name="cant_cuartos" value="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Metros</label>
                    <input type="text" class="form-control" name="metros" value="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alicuota</label>
                    <input type="text" class="form-control" name="alicuota" value="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Direcciooon</label>
                    <input type="text" class="form-control" name="direccion" value="">
                </div>


                            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Propietario</label>
                <select class="form-select" name="propietario">
                    <option selected disabled>Seleccione a un propietario</option>
                    <?php
                    // Conexión a la base de datos
                    include "conexion.php";
                    $db = new DataBase();
                    $conexion = $db->conectar();

                    // Consulta para obtener los propietarios de la base de datos
                    $sql = $conexion->query("SELECT nombre FROM propietario");

                    // Verificar si hay resultados
                    if ($sql->rowCount() > 0) {
                        // Iterar sobre los resultados y crear las opciones del menú desplegable
                        while ($datos = $sql->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $datos['nombre'] . '">' . $datos['nombre'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No se encontraron propietarios</option>';
                    }
                    ?>
                </select>
            </div>
                <div
                    class="col-md-12">
                <button type="submit" class="btn btn-primary" name="guardar1inmueble" value="ok">Guardar Nuevo Inmueble</button>
                <a href="gastos.php" class="btn btn-dark">Regresar</a>
</div>
            </form>
       
    </div>
 </body>
</html>