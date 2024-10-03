<?php
require(root.'fpdf/fpdf.php');
class PDF extends FPDF
{
    function Header()
    {
        $this->Image(IMG.'AdminLTELogo.png', 15, 15, 20);
        $this->SetFont('Arial','B',16);
        $this->Cell(10);
        $this->Cell(150,5, utf8_decode('Reporte de Propietarios'), 0, 0, 'C');
        $this->SetFont('Arial','B',10);
        $this->Cell(10,5, 'Fecha '.date("d/m/Y H:i:s"), 0, 0, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',9);
        $this->Cell(0, 10, 'Pagina' .$this->PageNo().'/{nb}', 0, 0, 'C');
        
    }
}

?>