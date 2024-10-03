<?php

require('./fpdf.php');
require_once '../conexion.php';

class PDF extends FPDF
{
  // Propiedad para almacenar la conexión a la base de datos
  private $conexion;

  // Constructor de la clase PDF que recibe la conexión como parámetro
  function __construct($conexion)
  {
      $this->conexion = $conexion;
      parent::__construct();
  }
    // Cabecera de página
    function Header()
    {
        // Consulta para obtener la información del propietario
        $consulta_info = $this->conexion->query("SELECT  nombre, apellido, telefono, correo FROM propietario");
        $dato_info = $consulta_info->fetch(PDO::FETCH_OBJ);
        
        
        // Logo de la empresa
        $this->Image('tc.png', 270, 5, 20); // Logo, Mover a la derecha, Mover hacia abajo, Tamaño IMAGEN
        // Título de la empresa
        $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(95); // Mover a la derecha
        $this->SetTextColor(0, 95, 189); // Color del texto
        $this->Cell(110, 15, utf8_decode('TuCondominio'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
        $this->Ln(3); // Salto de línea
        $this->SetTextColor(103); // Color del texto

        /* APELLIDO */
        $this->Cell(1); // Mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("Apellido : " . $dato_info->apellido), 0, 0, 'L', 0);
        $this->Ln(5);

        /* TELEFONO */
        $this->Cell(1); // Mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("Teléfono : " . $dato_info->telefono), 0, 0, 'L', 0);
        $this->Ln(5);

        /* CORREO */
        $this->Cell(1); // Mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Correo : ". $dato_info->correo ), 0, 0, 'L', 0);
        $this->Ln(10);

        /* TITULO DE LA TABLA */
        $this->SetTextColor(0, 0, 0);
        $this->Cell(100); // Mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode("REPORTE DE PROPIETARIOS"), 0, 1, 'C', 0);
        $this->Ln(7);

        /* CAMPOS DE LA TABLA */
       // Calcular la posición x de inicio de la tabla para centrarla
        $margin_left = ($this->GetPageWidth() - 15 - 80 - 30 - 50 - 50) / 2;
        $this->SetLeftMargin($margin_left);

        $this->SetFillColor(125, 173, 221); // Color de fondo
        $this->SetTextColor(0, 0, 0); // Color del texto
        $this->SetDrawColor(163, 163, 163); // Color del borde
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(15, 10, utf8_decode('N°'), 1, 0, 'C', 1);
        $this->Cell(80, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('Cédula'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('Teléfono'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('Correo'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); // Tipo de fuente, Estilo, Tamaño
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); // Número de página

        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); // Tipo de fuente, Estilo, Tamaño
        $hoy = date('d/m/Y H:i:s'); //Feha y hora 
        $this->Cell(450, 10, utf8_decode($hoy), 0, 0, 'C'); // Fecha y hora 
    }
}

$db= new DataBase();
$conexion=$db->conectar();


$pdf = new PDF($conexion);
$pdf->AddPage("landscape"); // Orientación del documento
$pdf->AliasNbPages(); // Muestra el número total de páginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); // Color del borde



// Consulta para obtener los datos de los propietarios
$consulta_reporte_propietarios = $conexion->query("SELECT * FROM propietario");

while ($datos_reporte = $consulta_reporte_propietarios->fetch(PDO::FETCH_OBJ)) {
    $i = $i + 1;
    // Agregamos los datos de los propietarios a la tabla
    $pdf->Cell(15, 10, utf8_decode($i), 1, 0, 'C', 0);
    $pdf->Cell(80, 10, utf8_decode($datos_reporte->nombre), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($datos_reporte->apellido), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($datos_reporte->telefono), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($datos_reporte->correo), 1, 1, 'C', 0);
}

$pdf->Output('Reporte_propietarios.pdf', 'I'); //nombre de documento ya Descargado, Visor(I->visualizar - D->descargar)
?>





