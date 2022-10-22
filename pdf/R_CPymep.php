<?php
header("Pragma: public");
header("Expires: 0");
$filename="Funnel_CPyme+.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalite, post-check=0, pre-check=0");
?>
<?php 
include("funciones.php");
date_default_timezone_set("America/Lima");
$dia=strftime( "%y/%m/%d",time());
	echo "<br>";
	echo '<table border="1" class="tabla">';
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>DEALER</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>GERENTE</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>EMPRESA</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>RUC</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>PT</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>OPEDR</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>UN</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>RB</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>PK/CH</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>V/B</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>ED</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>FECHA_C</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>OBSERVACIONES</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>CONSULTOR</th>";
	echo "<th style='background-color:rgb(0, 112, 192); color:white;'>SUPERVISOR</th>";
	$usuario=mysqli_query($conexion,"SELECT ca.Dealer,ca.Gerente,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
                        ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion,c.Nombrec,c.ApellidoCP,u.Usuario,u.ApellidoP
                        FROM tcarpeta ca 
                        inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
                        inner join tusuario u on u.IdUsuario=c.IdUsuario
                        WHERE ca.CPymeP='Si' AND ca.Estado NOT IN('0','5') AND MONTH(ca.FechaCierre)=MONTH(NOW())
                        ORDER BY ca.Estado");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['Dealer']."</td>"
		."<td>".$fila2['Gerente']."</td>"
		."<td>".utf8_decode($fila2['Empresa'])."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>".utf8_decode($fila2['Observacion'])."</td>"
		."<td>".utf8_decode($fila2['Nombrec'])." ".utf8_decode($fila2['ApellidoCP'])."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
?>