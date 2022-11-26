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
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'LISTA DE VENTAS','C');
    // Salto de línea
    $this->Ln(20);
	$this->Cell(10,10,'ID',1,0,'C',0);
	$this->Cell(20,10,'FECHA',1,0,'C',0);
	$this->Cell(20,10,'TOTAL',1,0,'C',0);
	$this->Cell(15,10,'ESTADO',1,0,'C',0);
	$this->Cell(20,10,'CODPRO',1,0,'C',0);
	$this->Cell(40,10,'NOMBRE',1,0,'C',0);
	$this->Cell(15,10,'PRECIO',1,0,'C',0);
	$this->Cell(15,10,'STOCK',1,1,'C',0);
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
$consulta="select * from ventas
inner join producto
on ventas.ID=producto.idp";
$resultado=$mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8.5);

while($row=$resultado->fetch_assoc()){
	$pdf->cell(10,10,$row['ID'],1,0,'C',0);
	$pdf->cell(20,10,$row['Fecha'],1,0,'C',0);
	$pdf->cell(20,10,$row['Total'],1,0,'C',0);
	$pdf->cell(15,10,$row['Status'],1,0,'C',0);
	$pdf->cell(20,10,$row['codpro'],1,0,'C',0);
	$pdf->cell(40,10,$row['nombre'],1,0,'C',0);
	$pdf->cell(15,10,$row['precio'],1,0,'C',0);
	$pdf->cell(15,10,$row['stock'],1,1,'C',0);

}
$pdf->Output();
?>
