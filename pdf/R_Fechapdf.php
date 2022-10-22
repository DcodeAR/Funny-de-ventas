<?php
@ob_start();
session_start();
?>
<?php
include('funciones.php');
require'fpdf17/fpdf.php';
$pdf = new FPDF('L','mm','A4');
if (isset($_POST['buscar_fecha'])) {
if (isset($_POST['FechaInicio'])) {
if (isset($_POST['FechaCierre'])) {
$FechaInicio=$_POST['FechaInicio'];
$FechaCierre=$_POST['FechaCierre'];
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
// $pdf->Cell(-180,30,'CINPAR SAC',0,0,'C');
$pdf->Ln(1);
//texto0
$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(0,60,'Reporte de Funnel',0,0,'C');
$pdf->Ln(5);
$pdf->Cell(196);
$pdf->Cell(10,5,'San Borja-Lima-Lima,'.$dia.' de '.$mes.' del 20'.$anio,0);
$pdf->SetFont('Helvetica','B',7);
$pdf->Ln(32);
$pdf->Cell(2);
$pdf->Cell(13,5,'DEALER',1);
$pdf->Cell(28,5,'GERENTE',1);
$pdf->Cell(40,5,'EMPRESA',1);
$pdf->Cell(17,5,'RUC',1);
$pdf->Cell(6,5,'PT',1);
$pdf->Cell(12,5,'OPEDR',1);
$pdf->Cell(6,5,'UN',1);
$pdf->Cell(8,5,'RB',1);
$pdf->Cell(13,5,'PK/CH',1);
$pdf->Cell(8,5,'V/B',1);
$pdf->Cell(5,5,'ED',1);
$pdf->Cell(15,5,'FECHA_C',1);
$pdf->Cell(45,5,'OBSERVACIONES',1);
$pdf->Cell(27,5,'CONSULTOR',1);
$pdf->Cell(25,5,'SUPERVISOR',1);
$pdf->Ln(5);
$pdf->SetFont('Helvetica','',7);
$usuario=mysql_query("SELECT ca.Dealer,ca.Gerente,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
                        ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion,c.Nombrec,c.ApellidoCP,u.Usuario,u.ApellidoP
                        FROM tcarpeta ca 
                        inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
                        inner join tusuario u on u.IdUsuario=c.IdUsuario
                        WHERE ca.FechaCierre BETWEEN '".$FechaInicio."' AND '".$FechaCierre."' AND ca.Estado NOT IN ('0','5')");
while ($row=mysql_fetch_array($usuario))
{
 
      $pdf->Cell(2);
        $pdf->SetFillColor(20,107,116);
        $pdf->Cell(13, 5,''.$row['Dealer'], 1);
        $pdf->Cell(28, 5,''.$row['Gerente'], 1);
        $pdf->Cell(40, 5,''.$row['Empresa'], 1);
        $pdf->Cell(17, 5,''.$row['Ruc'], 1);
        $pdf->Cell(6, 5,''.$row['Porta'], 1);
        $pdf->Cell(12, 5,''.$row['Operador'], 1);
        $pdf->Cell(6, 5,''.$row['Unidades'], 1);
        $pdf->Cell(8, 5,''.$row['RentaBasica'], 1);
        $pdf->Cell(13, 5,''.$row['Pack'], 1);
        $pdf->Cell(8, 5,''.$row['Voz'], 1);
        $pdf->Cell(5, 5,''.$row['Estado'], 1);
        $pdf->Cell(15, 5,''.$row['FechaCierre'], 1);
        $pdf->Cell(45, 5,''.utf8_decode($row['Observacion']), 1);
        $pdf->Cell(27, 5,''.utf8_decode($row['Nombrec'])." ".utf8_decode($row['ApellidoCP']), 1);
        $pdf->Cell(25, 5,''.utf8_decode($row['Usuario'])." ".utf8_decode($row['ApellidoP']), 1);
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
}
}
}

?>