	<?php
	include("funcion.php");
    include("menuadmi.php");
	date_default_timezone_set('America/Lima');
    $mes=strftime( "%m",time());

	echo "<table border='1' class='tabla'>";
	echo "<tr>";
	echo "<td style='border:none'></td>";
	echo "<td colspan='4' style='background-color: #0f243e;
    font-weight: bold;
    color: white;
    border:none;
    text-align: center;' >RUC 20</td>";
	echo "<td colspan='4' style='background-color: #0f243e;
    font-weight: bold;
    color: white;
    border:none;
    text-align: center;' >RUC 10</td>";
    echo "<td style='border:none'></td>";
	echo "</tr>";
	echo "<th style='background-color:#244062'>SUPERVISOR</th>";
	echo "<th style='background-color:#244062'>PORTA</th>";
	echo "<th style='background-color:#244062'>ALTA</th>";
	echo "<th style='background-color:#244062'>BAM</th>";
	echo "<th style='background-color:#244062'>BAFI</th>";
	echo "<th style='background-color:#244062'>PORTA</th>";
	echo "<th style='background-color:#244062'>ALTA</th>";
	echo "<th style='background-color:#244062'>BAM</th>";
	echo "<th style='background-color:#244062'>BAFI</th>";
	echo "<th style='background-color:#538dd5'>ACTIVADAS</th>";
	echo "<th style='background-color:#963634'>NO-AO</th>";
	echo "<th style='background-color:#963634'>SOLES</th>";
	echo "<th style='background-color:#92d050'>SVA</th>";
	echo "<th style='background-color:#92d050'>EQUIPO</th>";
	echo "<th style='background-color:#92d050'>CHI_P</th>";
	echo "<th style='background-color:#92d050'>CHI_A</th>";
	echo "<th style='background-color:#538dd5'>TOTAL</th>";

	//RUC10_CARLOS
	//BAFI_10
	$query=mysqli_query($conexion,"SELECT * FROM tsupervisor WHERE sup_nombre<>'CESADOS'");
	while ($row=mysqli_fetch_array($query))
	{

	$bafi10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bafi10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='4' AND e.emp_ruc LIKE '10%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila8=mysqli_fetch_array($bafi10)) {
	//BAM_10
	$bam10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bam10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='3' AND e.emp_ruc LIKE '10%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila7=mysqli_fetch_array($bam10)) {
	//ALTA_10
	$alta10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS alta10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='1' AND e.emp_ruc LIKE '10%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila6=mysqli_fetch_array($alta10)) {
	//PORTA_10
	$porta10=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS porta10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='2' AND e.emp_ruc LIKE '10%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila5=mysqli_fetch_array($porta10)) {

	//RUC20
	//BAFI_20
	$bafi20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bafi20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='4' AND e.emp_ruc LIKE '20%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila4=mysqli_fetch_array($bafi20)) {
	//BAM_20
	$bam20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bam20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='3' AND e.emp_ruc LIKE '20%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila3=mysqli_fetch_array($bam20)) {
	//ALTA_20
	$alta20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS alta20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='1' AND e.emp_ruc LIKE '20%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila2=mysqli_fetch_array($alta20)) {
	//PORTA_20
	$porta20=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS porta20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='2' AND e.emp_ruc LIKE '20%' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila1=mysqli_fetch_array($porta20)) {
	$total=mysqli_query($conexion,"SELECT *,SUM(v.ven_unidades) AS activadas
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo<>'sva' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila9=mysqli_fetch_array($total)) {
	$soles=mysqli_query($conexion,"SELECT *,SUM(v.ven_vrenta) AS soles
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila10=mysqli_fetch_array($soles)) {
	$equipo=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS equipo
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo='equipo' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila11=mysqli_fetch_array($equipo)) {
	$sva=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS sva
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo='sva' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila15=mysqli_fetch_array($sva)) {
	$chip_porta=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS chip_porta
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		INNER JOIN tmotivo m ON m.mot_id=v.mot_id
		WHERE v.est_id='1' AND v.ven_tipo='chip' AND m.mot_id='2' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila12=mysqli_fetch_array($chip_porta)) {
	$chip_alta=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS chip_alta
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		INNER JOIN tmotivo m ON m.mot_id=v.mot_id
		WHERE v.est_id='1' AND v.ven_tipo='chip' AND m.mot_id='1' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila13=mysqli_fetch_array($chip_alta)) {
	$no_ao=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS no_ao
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		WHERE v.est_id='4' AND s.sup_nombre='".$row['sup_nombre']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila14=mysqli_fetch_array($no_ao)) {
		$a=$fila9['activadas']-$fila14['no_ao'];
		$numero_s = number_format($fila10['soles'], 2, ',', '');
		echo "<tr>";
		echo "<td>".$row['sup_nombre']." ".$row['sup_apellido']."</td>";
		echo "<td>".$fila1['porta20']."</td>";
		echo "<td>".$fila2['alta20']."</td>";
		echo "<td>".$fila3['bam20']."</td>";
		echo "<td>".$fila4['bafi20']."</td>";
		echo "<td>".$fila5['porta10']."</td>";
		echo "<td>".$fila6['alta10']."</td>";
		echo "<td>".$fila7['bam10']."</td>";
		echo "<td>".$fila8['bafi10']."</td>";
		echo "<td>".$fila9['activadas']."</td>";
		echo "<td>".$fila14['no_ao']."</td>";
		echo "<td>".$numero_s."</td>";
		echo "<td>".$fila15['sva']."</td>";
		echo "<td>".$fila11['equipo']."</td>";
		echo "<td>".$fila12['chip_porta']."</td>";
		echo "<td>".$fila13['chip_alta']."</td>";
		echo "<td>".$a."</td>";
		echo "</tr>";
		  }}}}}}
	     }

	    }
       }
      }
     }
    }
   }
  }
 }
}
echo "</tr>";
echo "<tr>";
//RUC10_TOTAL
	//BAFI_10
	$a='Total General';
	$bafi10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bafi10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='4' AND e.emp_ruc LIKE '10%' AND MONTH(v.ven_finar)='".$mes."'");
		
	while ($fila8=mysqli_fetch_array($bafi10)) {
	//BAM_10
	$bam10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bam10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='3' AND e.emp_ruc LIKE '10%' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila7=mysqli_fetch_array($bam10)) {
	//ALTA_10
	$alta10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS alta10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='1' AND e.emp_ruc LIKE '10%' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila6=mysqli_fetch_array($alta10)) {
	//PORTA_10
	$porta10=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS porta10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='2' AND e.emp_ruc LIKE '10%' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila5=mysqli_fetch_array($porta10)) {

	//RUC20
	//BAFI_20
	$bafi20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bafi20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='4' AND e.emp_ruc LIKE '20%' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila4=mysqli_fetch_array($bafi20)) {
	//BAM_20
	$bam20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bam20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='3' AND e.emp_ruc LIKE '20%' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila3=mysqli_fetch_array($bam20)) {
	//ALTA_20
	$alta20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS alta20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='1' AND e.emp_ruc LIKE '20%' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila2=mysqli_fetch_array($alta20)) {
	//PORTA_20
	$porta20=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS porta20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='2' AND e.emp_ruc LIKE '20%' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila1=mysqli_fetch_array($porta20)) {
	$total=mysqli_query($conexion,"SELECT *,SUM(v.ven_unidades) AS activadas
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo<>'sva' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila9=mysqli_fetch_array($total)) {
	$soles=mysqli_query($conexion,"SELECT *,SUM(v.ven_vrenta) AS soles
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila10=mysqli_fetch_array($soles)) {
	$equipo=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS equipo
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo='equipo' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila11=mysqli_fetch_array($equipo)) {
	$sva=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS sva
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo='sva' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila15=mysqli_fetch_array($sva)) {
	$chip_porta=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS chip_porta
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		INNER JOIN tmotivo m ON m.mot_id=v.mot_id
		WHERE v.est_id='1' AND v.ven_tipo='chip' AND m.mot_id='2' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila12=mysqli_fetch_array($chip_porta)) {
	$chip_alta=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS chip_alta
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		INNER JOIN tmotivo m ON m.mot_id=v.mot_id
		WHERE v.est_id='1' AND v.ven_tipo='chip' AND m.mot_id='1' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila13=mysqli_fetch_array($chip_alta)) {
	$no_ao=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS no_ao
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		WHERE v.est_id='4' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila14=mysqli_fetch_array($no_ao)) {
		$b=$fila9['activadas']-$fila14['no_ao'];
		$numero_s = number_format($fila10['soles'], 2, ',', ' ');
		echo "<tr>";
		echo "<td style='background-color:#000;color:#fff'>".$a."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila1['porta20']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila2['alta20']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila3['bam20']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila4['bafi20']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila5['porta10']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila6['alta10']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila7['bam10']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila8['bafi10']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila9['activadas']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila14['no_ao']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$numero_s."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila15['sva']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila11['equipo']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila12['chip_porta']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$fila13['chip_alta']."</td>";
		echo "<td style='background-color:#000;color:#fff'>".$b."</td>";
		echo "</tr>";
	     }}}}}}
	    }
	   }
      }
     }
    }
   }
  }
 }
}
	echo "</table>";
	echo "<table border='1' class='tabla'";
	echo '<tr>';
	echo '<td colspan="10" style="text-align: center; font-weight: bold; color: #fff; background-color: #0f243e;
		font-size:15px; padding: 7px;">RANKING DE VENTAS</td>';
	echo '</tr>';
	echo "</table>";
	echo "<table class='tabla'>";
	echo "<th style='width:36px;'>CONSULTOR</th>";
	echo "<th style='width:36px;'>BAFI10</th>";
	echo "<th style='width:36px;'>BAM10</th>";
	echo "<th style='width:36px;'>ALTA10</th>";
	echo "<th style='width:36px;'>PORTA10</th>";
	echo "<th style='width:36px;'>BAFI20</th>";
	echo "<th style='width:36px;'>BAM20</th>";
	echo "<th style='width:36px;'>ALTA20</th>";
	echo "<th style='width:36px;'>PORTA20</th>";
	echo "<th style='width:36px;'>SVA</th>";
	echo "<th style='width:36px;'>EQUIPO</th>";
	echo "<th style='width:36px;'>C_PORTA</th>";
	echo "<th style='width:36px;'>C_ALTA</th>";
	echo "<th style='width:36px;'>NO_AO</th>";
	echo "<th style='width:36px;'>SOLES</th>";
	echo "<th style='width:36px;'>TOTAL</th>";
	//CONSULTOR
	$query=mysqli_query($conexion,"SELECT *,SUM(v.ven_unidades) AS suma
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN testado e ON e.est_id=v.est_id
		WHERE v.est_id='1' AND MONTH(v.ven_finar)='".$mes."'
		GROUP BY c.con_id
		ORDER BY suma DESC");
	while ($row=mysqli_fetch_array($query)) {	
	//BAFI10
	$bafi10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bafi10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='4' AND e.emp_ruc LIKE '10%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila1=mysqli_fetch_array($bafi10)) {
	//BAM10
	$bam10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bam10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='3' AND e.emp_ruc LIKE '10%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila2=mysqli_fetch_array($bam10)) {

	//ALTA_10
	$alta10=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS alta10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='1' AND e.emp_ruc LIKE '10%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila3=mysqli_fetch_array($alta10)) {
	//PORTA_10
	$porta10=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS porta10
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='2' AND e.emp_ruc LIKE '10%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila4=mysqli_fetch_array($porta10)) {
	//RUC20
	//BAFI_20
	$bafi20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bafi20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='4' AND e.emp_ruc LIKE '20%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila5=mysqli_fetch_array($bafi20)) {
	//BAM_20
	$bam20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS bam20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='3' AND e.emp_ruc LIKE '20%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila6=mysqli_fetch_array($bam20)) {
	//ALTA_20
	$alta20=mysqli_query($conexion,"SELECT s.sup_nombre, COUNT(v.ven_id) AS alta20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='1' AND e.emp_ruc LIKE '20%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila7=mysqli_fetch_array($alta20)) {
		//PORTA_20
	$porta20=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS porta20
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.mot_id='2' AND e.emp_ruc LIKE '20%' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila8=mysqli_fetch_array($porta20)) {
	$soles=mysqli_query($conexion,"SELECT *,SUM(v.ven_vrenta) AS soles
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila9=mysqli_fetch_array($soles)) {
	$equipo=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS equipo
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo='equipo' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");	
	while ($fila10=mysqli_fetch_array($equipo)) {
		$sva=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS sva
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		WHERE v.est_id='1' AND v.ven_tipo='sva' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila11=mysqli_fetch_array($sva)) {
	$chip_porta=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS chip_porta
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		INNER JOIN tmotivo m ON m.mot_id=v.mot_id
		WHERE v.est_id='1' AND v.ven_tipo='chip' AND m.mot_id='2' AND c.con_id='".$row['con_id']."'AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila12=mysqli_fetch_array($chip_porta)) {
	$chip_alta=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS chip_alta
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		INNER JOIN tempresa e ON e.emp_id=v.emp_id
		INNER JOIN tmotivo m ON m.mot_id=v.mot_id
		WHERE v.est_id='1' AND v.ven_tipo='chip' AND m.mot_id='1' AND c.con_id='".$row['con_id']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila13=mysqli_fetch_array($chip_alta)) {
	$no_ao=mysqli_query($conexion,"SELECT *,COUNT(v.ven_id) AS no_ao
		FROM tventa v
		INNER JOIN tconsultor c ON c.con_id=v.con_id
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		WHERE v.est_id='4' AND c.con_id='".$row['con_id']."' AND MONTH(v.ven_finar)='".$mes."'");
	while ($fila14=mysqli_fetch_array($no_ao)) {
			echo "<tr>";
			// echo "<td>".$row['sup_nombre']." ".$row['sup_apellido']."</td>";
			$numero_s = number_format($fila9['soles'], 2, ',', '');
			echo "<td>".$row['con_nombre']." ".$row['con_apellido']."</td>";
			echo "<td>".$fila1['bafi10']."</td>";
			echo "<td>".$fila2['bam10']."</td>";
			echo "<td>".$fila3['alta10']."</td>";
			echo "<td>".$fila4['porta10']."</td>";
			echo "<td>".$fila5['bafi20']."</td>";
			echo "<td>".$fila6['bam20']."</td>";
			echo "<td>".$fila7['alta20']."</td>";
			echo "<td>".$fila8['porta20']."</td>";
			echo "<td>".$fila11['sva']."</td>";
			echo "<td>".$fila10['equipo']."</td>";
			echo "<td>".$fila12['chip_porta']."</td>";
			echo "<td>".$fila13['chip_alta']."</td>";
			echo "<td>".$fila14['no_ao']."</td>";
			echo "<td>".$numero_s."</td>";
			echo "<td style='background:#fcd5b4; font-weight:bold; text-align:center;'>".$row['suma']."</td>";
			echo "</tr>";
		
	 }}}}}}}}}}}}}}
	}
	//DATOS DE CONSULTOR
	$query=mysqli_query($conexion,"SELECT * 
		FROM tconsultor c
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		WHERE s.sup_nombre<>'CESADOS'");
	while ($fila=mysqli_fetch_array($query)) {
		$query4=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as general
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			INNER JOIN testado e ON e.est_id=v.est_id
			WHERE c.con_id='".$fila['con_id']."' AND v.est_id NOT IN ('2','3') AND v.ven_tipo<>'sva' AND MONTH(v.ven_finar)='".$mes."' AND s.sup_nombre<>'Cesados'
			ORDER BY general DESC");
			while ($fila3=mysqli_fetch_array($query4)) 
			{
				if($fila3['general']==0) 
				{
				echo "<tr>";
				echo "<td>".$fila['con_nombre']." ".$fila['con_apellido']."</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0</td>";
				echo "<td>0,00</td>";
				echo "<td style='background:#fcd5b4; color:#000; text-align:center; font-weight:bold;'>0</td>";
				echo "</tr>";
				}
			}
		}
	echo "</table><br>";
?>