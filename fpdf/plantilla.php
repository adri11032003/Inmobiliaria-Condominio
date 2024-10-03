<?php
require(root.'fpdf/fpdf.php');
class plantilla extends FPDF
{
    function Header()
    {
        date_default_timezone_set('UTC');
        $this->Image(IMG.'logo.png', 15, 15, 20);
        $this->SetFont('Arial','B',12);
        $this->Cell(10);
        $this->Cell(150,5, 'TuCondominio', 0, 0, 'C');
        $this->SetFont('Arial','B',10);
        $this->Cell(10,5, 'Fecha '.date("d/m/Y h:s:i"), 0, 0, 'C');
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