<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 170px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>
<?php
	include("funciones.php");

// *GESTION CONSULTOR
if(isset($_GET["Editar_Consultor"])){
	include("menuadmi.php");
	echo "<br><h2>Gestión Consultor</h2>";
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Consultor">';
	echo '<br>';
	echo '<table>';

	echo "<tr>";
		echo "<td>";
		echo '<h3>IdConsultor</h3><input type="text" name="IdConsultor" id="IdConsultor" value="'.$_GET['IdConsultor'].'"><br>';
		echo "</td>";
		echo "<td>";
            echo '<h3>Supervisor</h3><select name="IdUsuario" id="IdUsuario">';
    		$usuario2=mysqli_query($conexion,"SELECT * 
							  FROM tusuario
							  WHERE Nivel='editor'");
			while ($fila3=mysqli_fetch_array($usuario2))
			{ 

    		echo "<option value=".$fila3['IdUsuario'].">".$fila3['Usuario']." ".$fila3['ApellidoP']." ".$fila3['ApellidoM']."</option>\n"; 
    	
			}
			echo "</select><br>";
    		echo "</td>";
			$usuario=mysqli_query($conexion,"SELECT * 
							  FROM tconsultor c
							  INNER JOIN tusuario u on u.IdUsuario=c.IdUsuario 
							  WHERE c.IdConsultor='".$_GET['IdConsultor']."'");
			while ($fila2=mysqli_fetch_array($usuario))
			{ 
			echo "<td>";
			echo '<h3>Correo</h3><input type="text"  name="Correo" value="'.$fila2['Correo'].'" /><br/>';	
			echo "</td>";
			echo "<td>";
			echo '<h3>Nombre</h3><input type="text"  name="Nombrec" value="'.$fila2['Nombrec'].'" /><br/>';	
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo '<h3>Apellidos Paterno</h3><input type="text"  name="ApellidoCP" value="'.$fila2['ApellidoCP'].'" /><br/>';
			echo "</td>";
			echo "<td>";
			echo '<h3>Apellidos Materno</h3><input type="text"  name="ApellidoCM" value="'.$fila2['ApellidoCM'].'" /><br/>';
			echo "</td>";
			echo "<td>";
			echo '<h3>Dni</h3><input type="text"  name="Dni" value="'.$fila2['Dni'].'" /><br/>';
			echo "</td>";
		
		echo "</tr>";
		echo '</table>';
		
		}
	echo "</br>"; 
	echo '<input type="submit" id="Editar" name="Editar" value="Guardar"/>';
	echo '<input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>';
echo '</form>';
}

// *GESTION Usuario
if(isset($_GET["Editar_Usuario"])){
	include("menuadmi.php");
	echo "<br><h2>Gestión Supervisor</h2>";
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Usuario">';
	echo '<br>';
	echo '<table>';

	echo "<tr>";
			echo "<td>";
			$usuario=mysqli_query($conexion,"SELECT * 
							  FROM tusuario
							  WHERE IdUsuario='".$_GET['IdUsuario']."'");
			while ($fila2=mysqli_fetch_array($usuario))
			{ 
			echo "<h3>Usuario</h3>";
			echo '<input type="text"  maxlength="12" id="Usuario" name="Usuario" value="'.$fila2['Usuario'].'"/><br/>';
			echo "</td>";

			echo "<td><h3>Apellido Paterno</h3>";
			echo '<input type="text"  name="ApellidoP" maxlength="9" value="'.$fila2['ApellidoP'].'"/><br/>';
			echo "</td>";
			echo '<td><h3>Apellido Materno</h3><input type="text"  name="ApellidoM" value="'.$fila2['ApellidoM'].'" />';
			echo "</td>";
	echo "</tr>";

	echo "<tr>";	
			echo "<td>";
			echo '<h3>IdUsuario</h3><input type="text" name="IdUsuario" id="IdUsuario" value="'.$_GET['IdUsuario'].'"><br>';
			echo "</td>";
			echo '<td><h3>Clave</h3><input type="password"  name="Clave" value="'.$fila2['Clave'].'"/>';
			echo "</td>";
			echo "<td><h3>Correo</h3>";
			echo '<input type="text"  name="Mail" value="'.$fila2['Mail'].'"/><br/>';
			echo "</td>";
			echo "<td><h3>Nivel</h3>";
			echo "<select name='Nivel' id='Nivel'>";
			echo "<option value='".$fila2['Nivel']."'>".$fila2['Nivel']."</option>";
			echo "<option value='editor'>editor</option>";
			echo "<option value='administrador'>administrador</option>";
			echo "</select>";
			echo "</td>";
		
	echo "</tr>";
		echo '</table>';
		
		}
	echo "</br>"; 
	echo '<input type="submit" id="Editar" name="Editar" value="Guardar"/>';
	echo '<input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>';
echo '</form>';
}
if (isset($_GET["Editar_Carpeta"])) {
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Carpeta">';
	echo '<br>';
	echo '<table>';
		echo "<tr>";
	echo "</tr>";
	echo '<tr>';
	echo '<td colspan="10" style="text-align: center; font-weight: bold; color: #fff; background-color: #fe6467;
		font-size:15px;">GESTIÓN DE CARPETAS</td>';
	echo '</tr>';

	echo '<tr>';
	
	echo '<td><h4>Dealer</h4>';
	echo '<input type="text" name="Dealer"  readonly="readonly" value="CYSCOM" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>';
	
	echo '<td><h4>Gerente</h4>';
	echo '<input type="text" name="Gerente" readonly="readonly" value="Fernando Vasquez"></td>';
	$query=mysqli_query($conexion,"SELECT * from tcarpeta ca 
						INNER JOIN tconsultor c on c.IdConsultor=ca.IdConsultor
						INNER JOIN tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.IdCarpeta='".$_GET['IdCarpeta']."'");
	while($fila=mysqli_fetch_array($query)) 
	{
	echo '<td><h4>Supervisor</h4>';
	echo '<select name=IdUsuario id=IdUsuario style="width:100%;height:30px;border-radius:3px;">'; 
	echo "<option value=".$fila['IdUsuario'].">".$fila['Usuario']." ".$fila['ApellidoP']."</option>\n"; 
	$result=mysqli_query($conexion,"SELECT * FROM tusuario
						");
	while ($row=mysqli_fetch_array($result)) 
	{ 
	echo "<option value=".$row['IdUsuario'].">".$row['Usuario']." ".$row['ApellidoP']."</option>\n"; 
	} 	
	echo "</select> ";
	echo '</td>';

	echo '<td><h4>Consultor</h4>';
	echo '<select name=IdConsultor id=IdConsultor style="width:100%;height:30px;border-radius:3px;">'; 
	echo "<option value=".$fila['IdConsultor'].">".$fila['Nombrec']." ".$fila['ApellidoCP']."</option>\n"; 
	$result=mysqli_query($conexion,"SELECT * FROM tusuario u 
							INNER JOIN tconsultor c on c.IdUsuario=u.IdUsuario
							WHERE c.IdConsultor!='".$fila['IdConsultor']."'");
	while ($row=mysqli_fetch_array($result)) 
	{ 
	echo "<option value=".$row['IdConsultor'].">".$row['Nombrec']." ".$row['ApellidoCP']."</option>\n"; 
	} 	
	echo "</select> ";
	echo '</td>';

	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="2"><h4>Razón Social</h4>';
	echo '<input type="text" name="Empresa" maxlength="50" value="'.$fila['Empresa'].'"></td>';
	
	echo '<td><h4>RUC</h4>';
	echo '<input type="text" name="Ruc" maxlength="11" value="'.$fila['Ruc'].'"></td>';

	echo '<td><h4>Renta básica</h4>';
	echo '<input type="text" name="RentaBasica" value="'.$fila['RentaBasica'].'" maxlength="28"></td>';

	echo '</tr>';

	echo '<tr>';

	echo '<td><h4>Porta</h4>';
	echo '<select name="Porta" style="width:100px;height:30px;border-radius:3px;" >';
	echo "<option>".$fila['Porta']."</option>";
	if($fila['Porta']=='No'){
	   echo '<option value="Si">Si</option>';
	}
	else{
	   echo '<option value="No">No</option>';
	}
	echo '</select>';

	echo '<h4>Operador</h4>';
	echo '<select name="Operador" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Operador']."</option>";
	echo '<option value="Claro">Claro</option>';
	echo '<option value="Movistar">Movistar</option>';
	echo '<option value="Bitel">Bitel</option>';
	echo '</select>';
	
	echo '<h4>Unidades</h4>';
	echo '<select name="Unidades" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Unidades']."</option>";
	for ($i=1; $i <101 ; $i++) { 
	echo '<option>'.$i.'</option>';
	}
	echo '</select></td>';

	echo '<td><h4>Pack/Chip</h4>';
	echo '<select name="Pack" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Pack']."</option>";
	echo '<option>Pack/Chip</option>';
	echo '<option>Pack</option>';
	echo '<option>Chip</option>';
	echo '</select>';
	
	echo '<h4>Voz/Bam</h4>';
	echo '<select name="Voz" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Voz']."</option>";
	echo '<option>Voz</option>';
	echo '<option>Bam</option>';
	echo '</select>';

	echo '<h4>Estado</h4>';
	echo '<select name="Estado" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Estado']."</option>";
	for ($i=0; $i <6 ; $i++) { 
	echo '<option>'.$i.'</option>';
	}
	echo '</select></td>';

	echo '<td><h4>Fecha Inicio</h4>';
	echo '<input type="text" name="FechaInicio" value="'.$fila['FechaInicio'].'">';
	echo '<h4>Fecha Tentativa Cierre</h4>';
	echo '<input type="text" name="FechaCierre" id="FechaCierre" value="'.$fila['FechaCierre'].'">';
    echo '<b>CPyme </b>';
	echo '<select name="CPyme" style="width:100px;height:30px;border-radius:3px;" >';
	echo "<option>".$fila['CPyme']."</option>";
	echo '<option value=" "> </option>';
	echo '<option value="Si">Si</option>';
	echo '</select>';
	echo '<b>CPyme+ </b>';
	echo '<select name="CPymeP" style="width:100px;height:30px;border-radius:3px;" >';
	echo "<option>".$fila['CPymeP']."</option>";
	echo '<option value=" "> </option>';
	echo '<option value="Si">Si</option>';
	echo '</select></td>';
	echo '<td><h4>Observación</h4>';
	echo '<textarea rows="4" cols="25" maxlength="90" name="Observacion" id="Observacion">'.$fila['Observacion'].'</textarea>';
	echo '<input type="text" name="IdCarpeta" id="IdCarpeta" style="visibility:hidden"  value="'.$_GET['IdCarpeta'].'"><br>';
	echo "</td>";

	echo '</tr>';
	}

	echo '</table>';

	echo "</br>"; 
	echo '<input type="submit" id="guardar_salir" name="guardar_salir" value="Guardar y Salir"/>';
	echo "<br><br><table border='1' style='width:300px;'>";
	echo "<tr>";
	    echo "<td style='background:#f9f96a; color:#333'>Estado</td>";
	    echo "<td style='background:#f9f96a; color:#333'>Constenido</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>0</td>";
	    echo "<td>La cuenta no va.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>1</td>";
	    echo "<td>La empresa dio si verbal.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>2</td>";
	    echo "<td>Falta definir propuesta.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>3</td>";
	    echo "<td>Propuesta presentada.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>4</td>";
	    echo "<td>Empresa contactada.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>5</td>";
	    echo "<td>Empresa cerrada.</td>";
	echo "</tr>";
		echo "<tr>";
	    echo "<td></td>";
	    echo "<td></td>";
	echo "</tr>";
	echo "</table>";
	echo '</form>';
}

//REPORTE REPORTE CONSULTOR

if (isset($_GET["Reporte_consultor"])) {
    $IdConsultor=$_GET['IdConsultor'];	
 	echo "<table>";
     echo '<tr>';
     $enero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as enero, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-01-01')");
 	while ($fila_enero=mysqli_fetch_array($enero)) 
 	{ 
     $febrero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as febrero, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-02-01')");
 	while ($fila_febrero=mysqli_fetch_array($febrero)) 
 	{ 
     $marzo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as marzo, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-03-01')");
 	while ($fila_marzo=mysqli_fetch_array($marzo)) 
 	{ 
      $abril=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as abril, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-04-01') AND YEAR(ca.FechaCierre)=YEAR('2019-04-01')");
 	while ($fila_abril=mysqli_fetch_array($abril)) 
 	{ 
     $mayo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as mayo, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-05-01') AND YEAR(ca.FechaCierre)=YEAR('2019-05-01')");
 	while ($fila_mayo=mysqli_fetch_array($mayo)) 
 	{ 
      $junio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as junio, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-06-01') AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
 	while ($fila_junio=mysqli_fetch_array($junio)) 
 	{ 
      $julio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as julio, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-07-01') AND YEAR(ca.FechaCierre)=YEAR('2019-07-01')");
 	while ($fila_julio=mysqli_fetch_array($julio)) 
 	{ 
     $agosto=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as agosto, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-08-01') AND YEAR(ca.FechaCierre)=YEAR('2019-08-01')");
 	while ($fila_agosto=mysqli_fetch_array($agosto)) 
 	{   
 	$septiembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as septiembre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-09-01') AND YEAR(ca.FechaCierre)=YEAR('2019-09-01')");
 	while ($fila_septiembre=mysqli_fetch_array($septiembre)) 
 	{  
 	$octubre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as octubre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-10-01') AND YEAR(ca.FechaCierre)=YEAR('2019-10-01')");
 	while ($fila_octubre=mysqli_fetch_array($octubre)) 
 	{
 	$noviembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as noviembre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-11-01') AND YEAR(ca.FechaCierre)=YEAR('2019-11-01')");
 	while ($fila_noviembre=mysqli_fetch_array($noviembre)) 
 	{
 	$diciembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as diciembre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-12-01') AND YEAR(ca.FechaCierre)=YEAR('2019-12-01')");
 	while ($fila_diciembre=mysqli_fetch_array($diciembre)) 
 	{
     echo "<canvas id='speedChart' width='30%' height='7%'>
     <script type='text/javascript'>
     var speedCanvas = document.getElementById('speedChart');
     Chart.defaults.global.defaultFontFamily = 'Lato';
     Chart.defaults.global.defaultFontSize = 15;";
     $query=mysqli_query($conexion,"SELECT * FROM tconsultor WHERE IdConsultor='".$IdConsultor."'");
     while($row=mysqli_fetch_array($query)){
     echo "
     var dataFirst = {
         label: 'Unidades',
         data: ['".$fila_enero['enero']."','".$fila_febrero['febrero']."','".$fila_marzo['marzo']."'],
         lineTension: 0.5,
         fill: false,
         borderColor: '#82ff73',
         backgroundColor: '#fff',
         pointBorderColor: '#82ff73',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
         pointStyle: 'rect'
       };
         var dataSecond = {
         label: 'Empresas',
         data: ['".$fila_enero['empresa']."','".$fila_febrero['empresa']."','".$fila_marzo['empresa']."'],
         lineTension: 0.5,
         fill: false,
         borderColor: '#73a5ff',
         backgroundColor: '#fff',
         pointBorderColor: '#73a5ff',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
         pointStyle: 'rect'
       };
       var dataThird = {
         label: 'Meta',
         data: [20,20,20,20,20,20,20,20,20,20,20,20],
         lineTension: 0.5,
         fill: false,
         borderColor: '#5a6777',
         backgroundColor: '#fff',
         pointBorderColor: '#5a6777',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
          pointStyle: 'rect'
       };";
      echo "
     var speedData = {
       labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       datasets: [dataFirst,dataSecond,dataThird]
     };
    
     var chartOptions = {
       legend: {
         display: true,
         position: 'top',
         labels: {
           boxWidth: 13,
           fontColor: 'Black'
         }
       }
     };
    
     var lineChart = new Chart(speedCanvas, {
       type: 'line',
       data: speedData,
       options: chartOptions
     });
     </script>	
     </canvas>";
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
 	}
 	}
 	}
 	echo '</tr>';
 	echo "</table>";
}

//REPORTE VENTA

if (isset($_GET["Reporte_venta"])) {
 	echo "<table>";
     echo '<tr>';
     $enero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as enero, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-01-01')");
 	while ($fila_enero=mysqli_fetch_array($enero)) 
 	{ 
     $febrero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as febrero, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-02-01')");
 	while ($fila_febrero=mysqli_fetch_array($febrero)) 
 	{ 
     $marzo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as marzo, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-03-01')");
 	while ($fila_marzo=mysqli_fetch_array($marzo)) 
 	{ 
      $abril=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as abril, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-04-01') AND YEAR(ca.FechaCierre)=YEAR('2019-04-01')");
 	while ($fila_abril=mysqli_fetch_array($abril)) 
 	{ 
     $mayo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as mayo, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-05-01') AND YEAR(ca.FechaCierre)=YEAR('2019-05-01')");
 	while ($fila_mayo=mysqli_fetch_array($mayo)) 
 	{ 
      $junio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as junio, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-06-01') AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
 	while ($fila_junio=mysqli_fetch_array($junio)) 
 	{ 
      $julio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as julio, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-07-01') AND YEAR(ca.FechaCierre)=YEAR('2019-07-01')");
 	while ($fila_julio=mysqli_fetch_array($julio)) 
 	{ 
     $agosto=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as agosto, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-08-01') AND YEAR(ca.FechaCierre)=YEAR('2019-08-01')");
 	while ($fila_agosto=mysqli_fetch_array($agosto)) 
 	{   
 	$septiembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as septiembre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-09-01') AND YEAR(ca.FechaCierre)=YEAR('2019-09-01')");
 	while ($fila_septiembre=mysqli_fetch_array($septiembre)) 
 	{  
 	$octubre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as octubre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-10-01') AND YEAR(ca.FechaCierre)=YEAR('2019-10-01')");
 	while ($fila_octubre=mysqli_fetch_array($octubre)) 
 	{
 	$noviembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as noviembre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-11-01') AND YEAR(ca.FechaCierre)=YEAR('2019-11-01')");
 	while ($fila_noviembre=mysqli_fetch_array($noviembre)) 
 	{
 	$diciembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as diciembre, COUNT(ca.IdCarpeta) as empresa
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-12-01') AND YEAR(ca.FechaCierre)=YEAR('2019-12-01')");
 	while ($fila_diciembre=mysqli_fetch_array($diciembre)) 
 	{
     echo "<canvas id='speedChart' width='30%' height='7%'>
     <script type='text/javascript'>
     var speedCanvas = document.getElementById('speedChart');
     Chart.defaults.global.defaultFontFamily = 'Lato';
     Chart.defaults.global.defaultFontSize = 15;
     var dataFirst = {
         label: 'Unidades',
         data: ['".$fila_enero['enero']."','".$fila_febrero['febrero']."','".$fila_marzo['marzo']."'],
         lineTension: 0.5,
         fill: false,
         borderColor: '#82ff73',
         backgroundColor: '#fff',
         pointBorderColor: '#82ff73',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
         pointStyle: 'rect'
       };
         var dataSecond = {
         label: 'Empresas',
         data: ['".$fila_enero['empresa']."','".$fila_febrero['empresa']."','".$fila_marzo['empresa']."'],
         lineTension: 0.5,
         fill: false,
         borderColor: '#73a5ff',
         backgroundColor: '#fff',
         pointBorderColor: '#73a5ff',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
         pointStyle: 'rect'
       };
       var dataThird = {
         label: 'Meta Unidades',
         data: [420,420,420,420,420,420,420,420,420,420,420,420],
         lineTension: 0.5,
         fill: false,
         borderColor: '#5a6777',
         backgroundColor: '#fff',
         pointBorderColor: '#5a6777',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
          pointStyle: 'rect'
       };
       var dataFour = {
         label: 'Meta Empresas',
         data: [100,100,100,100,100,100,100,100,100,100,100,100],
         lineTension: 0.5,
         fill: false,
         borderColor: '#5a6777',
         backgroundColor: '#fff',
         pointBorderColor: '#5a6777',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
          pointStyle: 'rect'
       };
     var speedData = {
       labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       datasets: [dataFirst,dataSecond,dataThird,dataFour]
     };
    
     var chartOptions = {
       legend: {
         display: true,
         position: 'top',
         labels: {
           boxWidth: 13,
           fontColor: 'Black'
         }
       }
     };
    
     var lineChart = new Chart(speedCanvas, {
       type: 'line',
       data: speedData,
       options: chartOptions
     });
     </script>	
     </canvas>";
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
 	}
 	}
 	echo '</tr>';
 	echo "</table>";
}

?>

