<?php
// Insertar la imagen de la gráfica
 if (isset($_POST['variable'])) 
 $img = $_POST['variable'];
       if (!empty($img)) {
     if (!empty($img)) {
     $pdf->Image($img, 10, 120, 280, 120); // Ajusta la posición y el tamaño según sea necesario
 } else {
     $pdf->Cell(0, 10, "No se recibió la imagen", 0, 1);
 }
} else {
 $pdf->Cell(0, 10, "No se recibió la imagen", 0, 1);
}

// Salida del PDF
$pdf->Output('Reporte-Gastos.pdf', 'I');
exit();
?>