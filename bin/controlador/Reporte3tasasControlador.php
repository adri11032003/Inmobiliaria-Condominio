<?php

require_once('fpdf/plantilla.php');
use modelo\TasadiaModelo as tasas;

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
   
        date_default_timezone_set('UTC');
        $this->Image(IMG.'logo.png', 15, 15, 20);
        $this->SetFont('Arial','B',12);
        $this->Cell(10);
        $this->Cell(150,5, 'TuCondominio', 0, 0, 'C');
        $this->SetFont('Arial','B',10);
        $this->Cell(10,5, 'Fecha '.date("d/m/Y h:s:i"), 0, 0, 'C');
        $this->Ln(20);

        // Otros elementos de la cabecera...
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',9);
        $this->Cell(0, 10, 'Pagina' .$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

// Generar el PDF de los gastos y la gráfica
if (isset($_POST['generar_pdf'])) {
    $pdf = new PDF("P","mm", "letter");
    $pdf->AddPage();
    $pdf->SetMargins(25,25,25);
    $pdf->AliasNbPages();

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(10);
    $pdf->Cell(150, 5, 'Tasas ', 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(42, 5, utf8_decode('ID'), 1, 0, 'C');
    $pdf->Cell(42, 5, 'Valor', 1, 0, 'C');
    $pdf->Cell(42, 5, 'Fecha', 1, 1, 'C');
    

    $pdf->SetFont('Arial', '', 9);
    
    // Obtener datos de los Tasas
    $tasas = new Tasas();
    $tasa = $tasas->listar();

    // Insertar datos en el PDF
    foreach ($tasa as $tasas) {
        $pdf->Cell(42, 5, $tasas['id_tasadia'], 1, 0);
        $pdf->Cell(42, 5, $tasas['valor'], 1, 0);
        $pdf->Cell(42, 5, $tasas['fecha'], 1, 1);
       
    }

    // Salida del PDF
    $pdf->Output('Reporte-Tasas.pdf', 'I');
    exit();
}

?>

