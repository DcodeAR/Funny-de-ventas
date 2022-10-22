<?php 
include("funciones.php");
require'fpdf17/fpdf.php';
$pdf = new FPDF();
date_default_timezone_set("America/Lima");
$dia=strftime( "%d",time());
$mes=strftime( "%m",time());
$anio=strftime( "%y",time());
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Image('../img/entel.png',10,15,60);
$pdf->Ln(10);
$pdf->Cell(10);
$pdf->Cell(0,15,'C&S Comunicaciones',0,0,'C');
$pdf->Cell(-180,30,'CINPAR SAC',0,0,'C');
$pdf->Ln(10);
//texto0
$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(0,60,'Reporte de Consultores',0,0,'C');
$pdf->Ln(10);
$pdf->Cell(110);
$pdf->Cell(10,5,'San Borja-Lima-Lima,'.$dia.' de '.$mes.' del 20'.$anio,0);
$pdf->SetFont('Helvetica','B',9);
$pdf->Ln(28);
$pdf->Cell(10);
$pdf->Cell(10,5,utf8_decode('N°'),1);
$pdf->Cell(50,5,'Consultor',1);
$pdf->Cell(25,5,'Dni',1);
$pdf->Cell(50,5,'Supervisor',1);
$pdf->Ln(5);
$pdf->SetFont('Helvetica','',8);
mysqli_query($conexion,'set @fila=0');
$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,c.Nombrec,c.ApellidoCP,c.ApellidoCM,c.dni,u.Usuario from tconsultor c
                    inner join tusuario u on u.IdUsuario=c.IdUsuario");
while ($row=mysqli_fetch_array($usuario))
{
 
        $pdf->Cell(10);
        $pdf->SetFillColor(20,107,116);
        $pdf->Cell(10, 5,''.$row['fila'], 1);
        $pdf->Cell(50, 5,''.utf8_decode($row['Nombrec'])." ".utf8_decode($row['ApellidoCP'])." ".utf8_decode($row['ApellidoCM']), 1);
        $pdf->Cell(25, 5,''.$row['dni'], 1);
        $pdf->Cell(50, 5,''.utf8_decode($row['Usuario']), 1);
        $pdf->Ln(5);

}
$pdf->Ln(30);
$pdf->Cell(19);
$pdf->Cell(40,5,utf8_decode('ÁREA ADMINISTRATIVA - RRHH'),0);
$pdf->Ln(5);
$pdf->Cell(19);
$pdf->Cell(40,5,utf8_decode('Bach. Aguilar Robles David'),0);
$pdf->SetY(-36);
$pdf->Cell(0,15,'Pagina '.$pdf->PageNo().'/{nb}',0,0,'C');
$pdf->AliasNbPages();
$pdf->Output();
?>