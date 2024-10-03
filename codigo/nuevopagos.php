<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="diseño.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function validarFormulario2() {
            var fecha = document.forms["formulario"]["fecha"].value;
            var cedula = document.forms["formulario"]["cedula"].value;
            var codigo_referencia = document.forms["formulario"]["codigo_referencia"].value;
            var monto = document.forms["formulario"]["monto"].value;

            if (fecha == "" || ) {
                alert("Por favor ingresa una fecha.");
                return false;
            }

            if (cedula == "" || isNaN(cedula)) {
                alert("Por favor ingresa una cantidad válida de cedula.");
                return false;
            }

            if (codigo_referencia == "" || isNaN(codigo_referencia)) {
                alert("Por favor ingresa un codigo de referencia .");
                return false;
            }

            if (monto == "") {
                alert("Por favor ingresa una monto.");
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
<form  name="formulario" action="guardar1pagos.php" method="POST" class="col-4 p-3 m-auto" onsubmit="return validarFormulario2()">
    <h1 class="text-center">Nuevo Pago</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                    <input type="text" class="form-control" name="cedula" value="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Codigo de referencia </label>
                    <input type="text" class="form-control" name="codigo_referencia" value="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Monto</label>
                    <input type="text" class="form-control" name="monto" value="">
                </div>
                <div
                    class="col-md-12">
                <button type="submit" class="btn btn-primary" name="guardar1pagos" value="ok">Guardar Nuevo Pago</button>
                <a href="pagos.php" class="btn btn-dark">Regresar</a>
</div>
            </form>
       
    </div>
 </body>
</html>