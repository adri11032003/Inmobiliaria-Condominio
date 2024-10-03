








<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario con Validación</title>
</head>
<body>

<form id="miFormulario" onsubmit="return validarFormulario()">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" pattern="[A-Za-z]+" required><br><br>
    
    <label for="cedula">Cédula:</label>
    <input type="text" id="cedula" name="cedula" pattern="[0-9]+" required><br><br>
    
    <button type="submit">Enviar</button>
</form>


public function incluir($nombre, $apellido, $cedula, $telefono, $correo)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($correo);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El correo se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO propietario (nombre,apellido,cedula,telefono,correo)
					VALUE ('$nombre','$apellido','$cedula','$telefono','$correo')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }




public function incluir($nombre, $apellido, $cedula, $telefono, $correo)
{
    $respuesta = [];
    
    // Validar nombre
    if (!preg_match('/^[a-zA-Z]+$/', $nombre)) {
        $respuesta["resultado"]=2;
        $respuesta["mensaje"]="Por favor, ingrese solo letras en el campo Nombre.";
        return $respuesta;
    }
    
    // Validar apellido
    if (!preg_match('/^[a-zA-Z]+$/', $apellido)) {
        $respuesta["resultado"]=2;
        $respuesta["mensaje"]="Por favor, ingrese solo letras en el campo Apellido.";
        return $respuesta;
    }
    
    // Validar cédula
    if (!ctype_digit($cedula)) {
        $respuesta["resultado"]=2;
        $respuesta["mensaje"]="Por favor, ingrese solo números en el campo Cédula.";
        return $respuesta;
    }
    
    // Validar correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $respuesta["resultado"]=2;
        $respuesta["mensaje"]="Por favor, ingrese un correo electrónico válido.";
        return $respuesta;
    }
    
    // Validar registro antes de insertar
    $validar_registro = $this->validar_registro($correo);
    if ($validar_registro['resultado'] == 1) {
        $respuesta["resultado"]=3;
        $respuesta["mensaje"]="El correo se encuentra registrado.";
    } else {
        try {
            $this->conex->query("INSERT INTO propietario (nombre,apellido,cedula,telefono,correo)
                VALUE ('$nombre','$apellido','$cedula','$telefono','$correo')");
            $respuesta["resultado"]=1;
            $respuesta["mensaje"]="Registro Exitoso.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
    }
    return $respuesta;
}




public function incluir($nombre, $apellido, $cedula, $telefono, $correo)
    {
        $respuesta = [];
        
        // Validar nombre
        if (!preg_match('/^[a-zA-Z]+$/', $nombre)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo letras en el campo Nombre.";
            return $respuesta;
        }
        
        // Validar apellido
        if (!preg_match('/^[a-zA-Z]+$/', $apellido)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo letras en el campo Apellido.";
            return $respuesta;
        }
        
        // Validar cédula
        if (!ctype_digit($cedula)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo números en el campo Cédula.";
            return $respuesta;
        }

         // Validar telefono
         if (!ctype_digit($telefono)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese solo números en el campo Telefono.";
            return $respuesta;
        }
        
        // Validar correo electrónico
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $respuesta["resultado"]=2;
            $respuesta["mensaje"]="Por favor, ingrese un correo electrónico válido.";
            return $respuesta;
        }
        
        // Validar registro antes de insertar
        $validar_registro = $this->validar_registro($correo);
        if ($validar_registro['resultado'] == 1) {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El correo se encuentra registrado.";
        } else {
            try {
                $this->conex->query("INSERT INTO propietario (nombre,apellido,cedula,telefono,correo)
                    VALUE ('$nombre','$apellido','$cedula','$telefono','$correo')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $nombre, $apellido, $cedula, $telefono, $correo)
    {
        try {
            $this->conex->query("UPDATE propietario SET nombre='$nombre', apellido='$apellido', cedula='$cedula', telefono='$telefono', correo='$correo' WHERE id_propietario='$id'");
            $respuesta['resultado']=1;
            $respuesta['mensaje']="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }










<script>
function validarFormulario() {
    var nombre = document.getElementById("nombre").value;
    var cedula = document.getElementById("cedula").value;
    
    var letras = /^[A-Za-z]+$/;
    var numeros = /^[0-9]+$/;
    
    if (!nombre.match(letras)) {
        alert("Por favor, ingrese solo letras en el campo Nombre.");
        return false;
    }
    
    if (!cedula.match(numeros)) {
        alert("Por favor, ingrese solo números en el campo Cédula.");
        return false;
    }
    
    return true;
}
</script>

</body>
</html>




try {
    $db= new DataBase();
$conn= $db->conectar();

    // Obtiene datos de propietarios 
    $stmt = $conn->prepare("SELECT nombre, contraseña FROM propietario");
    $stmt->execute();

    $dataArray = array(); // Array para almacenar los datos

    // Convertir resultados a un array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dataArray[] = array($row['nombre'], $row['contraseña']);
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

$conn = null; // Cerrar conexión
?>

           <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
       // Agrega datos de propietarios al array
       <?php
                foreach ($dataArray as $cont) {
                    echo "['" . $cont[0] . "', " . $cont[1] . "],\n";
                }
                ?>
            ]);

        var options = {
          title: 'Contraseña con mayor numerología',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>



<?php
require_once('fpdf/fpdf.php');
use modelo\GastosModelo as Gastos;

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('tc.png', 270, 5, 20); // Logo de la empresa
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(45);
        $this->SetTextColor(10, 87, 200);
        $this->Cell(150, 15, utf8_decode('TuCondominio'), 0, 1, 'C', 0);
        $this->Ln(3);
        $this->SetTextColor(103);

        // Otros elementos de la cabecera...
    }

    // Pie de página
    function Footer()
    {
        // Pie de página...
    }
}

// Generar el PDF de los gastos
if (isset($_POST['generar_pdf'])) {
    $pdf = new PDF();
    $pdf->AddPage('landscape');
    $pdf->AliasNbPages();

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(10);
    $pdf->Cell(150, 5, 'Gastos por mes', 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(42, 5, utf8_decode('ID'), 1, 0, 'C');
    $pdf->Cell(42, 5, 'Nombre', 1, 0, 'C');
    $pdf->Cell(42, 5, 'Monto', 1, 0, 'C');
    $pdf->Cell(42, 5, utf8_decode('Fecha'), 1, 1, 'C');

    $pdf->SetFont('Arial', '', 9);
    
    // Obtener datos de los gastos
    $gastos = new Gastos();
    $gasto = $gastos->gastospormes();

    // Insertar datos en el PDF
    foreach ($gasto as $gastos) {
        $pdf->Cell(42, 5, $gastos['id_gastos'], 1, 0);
        $pdf->Cell(42, 5, $gastos['nombre'], 1, 0);
        $pdf->Cell(42, 5, $gastos['monto'], 1, 0);
        $pdf->Cell(42, 5, $gastos['fecha'], 1, 1);
    }

    // Salida del PDF
    $pdf->Output();
    exit();
}

// Insertar la imagen del gráfico en el PDF
if (isset($_POST['variable'])) {
    $grafico = $_POST['variable'];

    $pdf = new PDF();
    $pdf->AddPage('landscape');

    // Insertar la imagen en el PDF
    if ($grafico) {
        $img = explode(',', $grafico, 2)[1];
        $pic = 'data://text/plain;base64,'. $img;
        $pdf->image($pic, 30,55,300,0,'png');
    } else {
        $pdf->Cell(0, 10, "No se recibió la imagen", 0, 1);
    }

    // Salida del PDF
    $pdf->Output('Reporte-INMUEBLES.pdf', 'I');
    exit();
}
?>



!DOCTYPE html>
<html lang="en">
<?php include_once('componentes/head.php'); ?>

<body>
    <div class="wrapper">
        <?php include_once('componentes/panel_nav.php'); ?>
        <?php include_once('componentes/header.php'); ?>
        <div class="content-wrapper">
            <section class="content" style="margin:3%">
                <!-- Default box -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container">
                            <!-- Contenido de la tabla de gastos -->
                            <div class="card">
                                <!-- Contenido de la tarjeta -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Formulario para generar el PDF -->
    <form id="form_pdf" method="post" action="generar_pdf.php">
        <input type="hidden" id="variable" name="variable">
        <button type="submit" name="generar_pdf" class="btn btn-primary">Generar PDF</button>
    </form>

    <!-- Script para obtener la imagen de la gráfica y enviarla al campo oculto -->
    <script type="text/javascript">
        // Función para obtener la imagen de la gráfica y enviarla al campo oculto antes de enviar el formulario
        function enviarPDF() {
            // Obtener la URI de la imagen de la gráfica
            var imgURI = document.getElementById('donutchart').getElementsByTagName('img')[0].src;
            // Almacenar la URI en el campo oculto
            document.getElementById('variable').value = imgURI;
            // Enviar el formulario
            document.getElementById('form_pdf').submit();
        }
    </script>

    <?php include_once('componentes/script.php'); ?>
    <script src=<?php echo VALIDATION.'gastos.js';?>></script>
    <script src=<?php echo LIB.'datatables/jquery.dataTables.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-bs4/js/dataTables.bootstrap4.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-responsive/js/dataTables.responsive.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/dataTables.buttons.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.bootstrap4.min.js';?>></script>
    <script src=<?php echo LIB.'pdfmake/pdfmake.min.js';?>></script>
    <script src=<?php echo LIB.'pdfmake/vfs_fonts.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.html5.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.print.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.colVis.min.js';?>></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>
</html>