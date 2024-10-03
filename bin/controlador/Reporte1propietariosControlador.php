<?php 
require(root.'fpdf/plantilla.php');
use modelo\PropietarioModelo as Propietario;
if (isset($_POST['generar_pdf'])) {
    $pdf = new plantilla("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(25,25,25);
    $pdf->AddPage();
    $propietario = new Propietario();
    $propietarios = $propietario->listar();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(10);
    $pdf->Cell(150,5, 'Propietarios', 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(30,5, utf8_decode('Cédula'), 1, 0, 'C');
    $pdf->Cell(35,5, 'Nombre', 1, 0, 'C');
    $pdf->Cell(35,5, 'Apellido', 1, 0, 'C');
    $pdf->Cell(30,5, utf8_decode('Teléfono'), 1, 0, 'C');
    $pdf->Cell(50,5, 'Correo', 1, 1, 'C');
    
    $pdf->SetFont('Arial','',9);
    foreach ($propietarios as $propietario) {
        $pdf->Cell(30,5, $propietario['cedula'], 1, 0);
        $pdf->Cell(35,5, $propietario['nombre'], 1, 0);
        $pdf->Cell(35,5, $propietario['apellido'], 1, 0);
        $pdf->Cell(30,5, $propietario['telefono'], 1, 0);
        $pdf->Cell(50,5, $propietario['correo'], 1, 1);
    }

    // Salida del PDF
    $pdf->Output();
    exit();
}
?>
