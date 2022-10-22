<?php
include("funcion.php");
include("menusupervisor.php");
	date_default_timezone_set("America/Lima");
	$mes=strftime( "%m",time());
	$anio=strftime( "%y",time());
	$numero = cal_days_in_month(CAL_GREGORIAN, $mes, $anio); // 31
	echo '<br>';
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Equipo">';
	echo "<table border='1' class='tabla'>";
	echo '<tr>';
	echo '<td colspan="10" style="text-align: center; font-weight: bold; color: #fff; background-color: #0f243e;
		font-size:15px; padding: 7px;">REPORTE DE VENTAS DIARIAS</td>';
	echo '</tr>';
	echo "</table>";

	//DIAS DEL MES
	echo "<table border='1' class='tabla' style='line-height: 7px;'>";
	echo "<tr>";
	echo "<td rowspan='2' style='background:#366092; color:#fff; font-weight:bold;'>Supervisor / Consultor</td>";
	for ($i=1; $i <= $numero; $i++) { 	
	$fechas = "".$i."-02-2019"; //5 agosto de 2004 por ejemplo  

	$fechats = strtotime($fechas); //a timestamp 

	//el parametro w en la funcion date indica que queremos el dia de la semana 
	//lo devuelve en numero 0 domingo, 1 lunes,....
	$dd=date('w', $fechats);
	switch (date('w', $fechats)){ 
	    case 0: echo "<td style='background:#366092; color:#fff;'>Dom</td>"; break; 
	    case 1: echo "<td style='background:#366092; color:#fff;'>Lun</td>"; break; 
	    case 2: echo "<td style='background:#366092; color:#fff;'>Mar</td>"; break; 
	    case 3: echo "<td style='background:#366092; color:#fff;'>Mie</td>"; break; 
	    case 4: echo "<td style='background:#366092; color:#fff;'>Jue</td>"; break; 
	    case 5: echo "<td style='background:#366092; color:#fff;'>Vie</td>"; break; 
	    case 6: echo "<td style='background:#366092; color:#fff;'>Sab</td>"; break; 
	}  
	}
	echo "<td rowspan='2' style='background:#e26b0a; color:#fff; font-weight:bold;'>Total</td>";
	echo "</tr>";
	echo "<tr>";
	// echo "<td style='background:#366092; color:#fff; font-weight:bold;'>Consultor</td>";
	for ($i=1; $i <= $numero; $i++) { 
	echo "<td style='background:#366092; color:#fff; width:36px;'>".$i."</td>";
	}
	
	//SUPERVISOR
	$super=mysqli_query($conexion,"SELECT * FROM tsupervisor WHERE sup_nombre<>'CESADOS'");
	while ($row=mysqli_fetch_array($super)) {
	echo "</tr>";	
	echo "<tr>";
			echo "<td style='background:#92cddc; color:#000; font-weight:bold;'>".$row['sup_nombre']." ".$row['sup_apellido']."</td>";
		for ($i=1; $i <= $numero; $i++) 
		{ 
			if ($i==3 || $i==10 || $i==17 || $i==24) {
				$query=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as total
				FROM tventa v
				INNER JOIN tconsultor c ON c.con_id=v.con_id
				INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
				WHERE ven_finar='19/".$mes."/".$i."' AND v.est_id NOT IN ('2','3') AND s.sup_id='".$row['sup_id']."'");
				while ($fila6=mysqli_fetch_array($query)) 
				{
				if ($fila6['total']>0)
				{
					echo "<td style='background:#c0504d; color:#fff; text-align:center;'>".$fila6['total']."</td>";
				}
				else if ($fila6['total']<0)
				{
					echo "<td style='background:#c0504d; color:#fff; text-align:center;'>".$fila6['total']."</td>";
				}
				else
				{
					echo "<td style='background:#c0504d; color:#fff; text-align:center;'>0</td>";
				}
				
				}
			}
			else
			{
				$query=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as total
				FROM tventa v
				INNER JOIN tconsultor c ON c.con_id=v.con_id
				INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
				WHERE ven_finar='19/".$mes."/".$i."' AND v.est_id NOT IN ('2','3') AND s.sup_id='".$row['sup_id']."'");
				while ($fila6=mysqli_fetch_array($query)) 
				{
				if ($fila6['total']>0)
				{
					echo "<td style='background:#92cddc; color:#000; text-align:center;'>".$fila6['total']."</td>";
				}
				else if ($fila6['total']<0)
				{
					echo "<td style='background:#92cddc; color:#000; text-align:center;'>".$fila6['total']."</td>";
				}
				else
				{
					echo "<td style='background:#92cddc; color:#000; text-align:center;'>0</td>";
				}
				}
			}

			
		}
		$query5=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as general
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			INNER JOIN testado e ON e.est_id=v.est_id
			WHERE v.est_id='4'  AND s.sup_id='".$row['sup_id']."' AND MONTH(v.ven_finar)='".$mes."'");
			while ($fila8=mysqli_fetch_array($query5)) 
			{
		$query4=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as general
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			INNER JOIN testado e ON e.est_id=v.est_id
			WHERE v.est_id='1' AND v.ven_tipo<>'sva'  AND s.sup_id='".$row['sup_id']."' AND MONTH(v.ven_finar)='".$mes."'");
			while ($fila7=mysqli_fetch_array($query4)) 
			{
			$result=$fila7['general']+$fila8['general'];
			if ($result>0)
			 {
				echo "<td style='background:#403151; color:#fff; text-align:center;'>".$result."</td>";
			 }
			else if ($result<0)
			 {
				echo "<td style='background:#403151; color:#fff; text-align:center;'>".$result."</td>";
			 }
			else
			 {
				echo "<td style='background:#403151; color:#fff; text-align:center;'>0</td>";
			 }
			}
		}

	echo "</tr>";
	//DATOS DE CONSULTOR
	$query=mysqli_query($conexion,"SELECT * 
		FROM tconsultor c
		INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
		WHERE s.sup_id='".$row['sup_id']."' AND s.sup_nombre<>'CESADOS'
		ORDER BY s.sup_id");
	while ($fila=mysqli_fetch_array($query)) {
		echo "<td style='font-size:10px; font-weight:bold;'>".$fila['con_nombre']." ".$fila['con_apellido']."</td>";
	

	//VENTA DIARIA POR CONSULTOR

		for ($i=1; $i <= $numero; $i++) { 
		$query3=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as total
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			WHERE c.con_id='".$fila['con_id']."' AND ven_finar='19/".$mes."/".$i."' AND v.est_id NOT IN ('2','3')
			ORDER BY s.sup_id");
			while ($fila2=mysqli_fetch_array($query3)) 
			{
			if ($i==3 || $i==10 || $i==17 || $i==24) 
			{	
				if ($fila2['total']>0)
				{
					echo "<td style='background:#c0504d; color:#fff; text-align:center;'>".$fila2['total']."</td>";
				}
				else if ($fila2['total']<0)
				{
					echo "<td style='background:#c0504d; color:#fff; text-align:center;'>".$fila2['total']."</td>";
				}
				else
				{
					echo "<td style='background:#c0504d; color:#fff; text-align:center;'></td>";
				}
			}
			else
			{
				if ($fila2['total']>0)
				{
					echo "<td style='background:#fff; color:#000; text-align:center;'>".$fila2['total']."</td>";
				}
				else if ($fila2['total']<0)
				{
					echo "<td style='background:#ff7878; color:#fff; text-align:center;'>".$fila2['total']."</td>";
				}
				else
				{
					echo "<td style='background:#b7b2b2; color:#fff; text-align:center;'></td>";
				}
			}
		   }
		}

	//GENERAL POR CONSULTOR
		$query4=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as general
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			INNER JOIN testado e ON e.est_id=v.est_id
			WHERE c.con_id='".$fila['con_id']."' AND v.est_id NOT IN ('2','3') AND v.ven_tipo<>'sva' AND MONTH(v.ven_finar)='".$mes."'
			ORDER BY s.sup_id");
			while ($fila3=mysqli_fetch_array($query4)) 
			{
			if ($fila3['general']>0) {
				echo "<td style='background:#fcd5b4; color:#000; text-align:center; font-weight:bold;'>".$fila3['general']."</td>";
			}
			else if ($fila3['general']<0) {
				echo "<td style='background:#fcd5b4; color:#000; text-align:center; font-weight:bold;'>".$fila3['general']."</td>";
			}
			else {
				echo "<td style='background:#fcd5b4; color:#000; text-align:center; font-weight:bold;'>0</td>";
			}

			}

		echo "</tr>";
		}

	}
	//RESULTAOD GENERAL POR DIAS
	  echo "<tr>";
			echo "<td style='background:#404040; color:#fff; font-weight:bold;'>Total</td>";
		for ($i=1; $i <= $numero; $i++) 
		{ 

		$query=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as total
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			WHERE ven_finar='19/".$mes."/".$i."' AND v.est_id NOT IN ('2','3')");
			while ($fila6=mysqli_fetch_array($query)) 
			{
				if ($fila6['total']<0) {
				echo "<td style='background:#404040; color:#fff; font-weight:bold; text-align:center'>".$fila6['total']."</td>";
				}
				else if ($fila6['total']>0) {
				echo "<td style='background:#404040; color:#fff; font-weight:bold; text-align:center'>".$fila6['total']."</td>";
				}
				else {
				echo "<td style='background:#404040; color:#fff; font-weight:bold; text-align:center'>0</td>";
				}
		
			}
			
		}

		//RESULTADO GENERAL
		$query5=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as general
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			INNER JOIN testado e ON e.est_id=v.est_id
			WHERE v.est_id='4' AND MONTH(v.ven_finar)='".$mes."'");
			while ($fila8=mysqli_fetch_array($query5)) 
			{
		$query4=mysqli_query($conexion,"SELECT v.ven_finar,SUM(v.ven_unidades) as general
			FROM tventa v
			INNER JOIN tconsultor c ON c.con_id=v.con_id
			INNER JOIN tsupervisor s ON s.sup_id=c.sup_id
			INNER JOIN testado e ON e.est_id=v.est_id
			WHERE v.est_id='1' AND v.ven_tipo<>'sva' AND MONTH(v.ven_finar)='".$mes."'");
			while ($fila7=mysqli_fetch_array($query4)) 
			{
			$result=$fila7['general']+$fila8['general'];
			echo "<td style='background:#403151; color:#fff; text-align:center;'>".$result."</td>";
			}
		}

	echo "</tr>";
	echo "</table><br>";
?>