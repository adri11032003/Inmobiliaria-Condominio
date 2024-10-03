<?php
require_once('fpdf/plantilla.php');


// Clase PDF que extiende FPDF
class PDF extends FPDF
{
    function Header()
    {
        date_default_timezone_set('UTC');
        $this->Image(IMG.'logo.png', 15, 15, 20);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(15);
        $this->Cell(150, 5, 'TuCondominio', 0, 0, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 5, 'Fecha ' . date("d/m/Y H:i:s"), 0, 0, 'C');
        $this->Ln(20);

        /* UBICACION */
        $this->Cell(1);  // mover a la derecha
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(96, 10, utf8_decode("Ubicación: Venezuela"), 0, 0, '', 0);
        $this->Ln(5);
  
        /* TELEFONO */
        $this->Cell(1);  // mover a la derecha
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(59, 10, utf8_decode("Teléfono: 04245323399"), 0, 0, '', 0);
        $this->Ln(5);
  
        /* COREEO */
        $this->Cell(1);  // mover a la derecha
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(85, 10, utf8_decode("Correo: adrian.11.ajmm@gmail.com"), 0, 0, '', 0);
        $this->Ln(10);
  
        /* TITULO DE LA TABLA */
        //color
        $this->SetTextColor(0, 0, 0);
        $this->Cell(60); // mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode("Reporte de tipos de pagos "), 0, 1, 'L', 0);
        $this->Ln(10);
        


    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 9);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Inicialización del PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);


// Recibe la imagen de la variable 'variable' del formulario
if (isset($_POST['variablee'])) {
    $imgData = $_POST['variablee'];

    // La imagen se envía en formato base64, así que debes decodificarla
    $imgData = str_replace('data:image/png;base64,', '', $imgData);
    $imgData = base64_decode($imgData);

    // Guarda la imagen en un archivo temporal para agregarla al PDF
    $tempImage = 'temp_chart.png';
    file_put_contents($tempImage, $imgData);

    // Agrega la imagen al PDF
    $pdf->Image($tempImage, 40, 60, 150, 100);  // Ajusta la posición y tamaño de la imagen según sea necesario

    // Elimina el archivo temporal después de usarlo
    unlink($tempImage);
}

// Salida del PDF
$pdf->Output('Reporte-Tasasfecha.pdf', 'I');
exit();
?>