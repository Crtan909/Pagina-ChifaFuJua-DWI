<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logochifa.png',10,8,22);
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'LISTA DE USUARIOS','C');
    // Salto de línea
    $this->Ln(20);
	$this->Cell(40,10,'NOMBRE',1,0,'C',0);
	$this->Cell(60,10,'CORREO',1,0,'C',0);
	$this->Cell(40,10,'TELEFONO',1,0,'C',0);
	$this->Cell(50,10,'DIRECCION',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'validar/conexiones.php';
$consulta="SELECT * FROM usuarios";
$resultado=$mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row=$resultado->fetch_assoc()){
	$pdf->cell(40,10,$row['Nombre'],1,0,'C',0);
	$pdf->cell(60,10,$row['email'],1,0,'C',0);
	$pdf->cell(40,10,$row['telefono'],1,0,'C',0);
	$pdf->cell(50,10,$row['direccion'],1,1,'C',0);

}
$pdf->Output();
?>