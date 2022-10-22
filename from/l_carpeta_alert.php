<style>
.tooltip {
    position: relative;
    /*display: inline-block;*/
    /*border-bottom: 1px dotted black;*/
    font-size:14px;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
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
<style type="text/css">
.Gandalf{
    height:350px;
    overflow:auto;
}    
    
</style>
<?php 
include("funciones.php");
include("menuadmi.php");
date_default_timezone_set("America/Lima");
$dia=strftime( "%y/%m/%d",time());
$mes=strftime( "%m",time());
	echo "<br>";
	echo '<form id="datos" method="POST" action="?pagina=buscar_ruc"> ';
   	echo "<table class='tabla'>";
	echo '<tr>';
    $usuario=mysqli_query($conexion,"SELECT COUNT(ca.idcarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.Estado NOT IN ('0','5') AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;"> CYSTCOM : '.$fila2['suma'].' Empresas</td>';
	}
    echo '</tr>';
    echo "</table>";
    echo "<table class='tabla'>";
	echo '<tr>';
	$usuario1=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado NOT IN ('0','5') AND ca.FechaCierre>=CURDATE() AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario1)) 
	{
	echo '<td><h4>Empresas Activas</h4></td>';
	echo '<td style="text-align: center; color: #333; background-color: #5a677712;
		font-size:15px; border-radius: 60px; width:40px;">'.$fila2['fila'].'</td>';
	}	
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado NOT IN ('0','5') AND ca.FechaCierre<CURDATE() AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	echo '<td><h4>Empresas Vencidas</h4></td>';
	echo '<td style="text-align: center; color: #333; background-color: #5a677712;
		font-size:15px; border-radius: 60px; width:40px;">'.$fila2['fila'].'</td>';
	if($fila2['fila']>0)
	{
    	echo '<script type="text/javascript">
        swal("'.$_SESSION['username'].' tienes '.$fila2['fila'].' empresas vencidas","Haz clic para continuar","error");
        </script>';
	}
	else{
	 	echo '<script type="text/javascript">
        swal("Funnel Actualizado!", "Haz clic para continuar!", "success");
        </script>';
	    }
	}		
	
	$usuario2=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01') AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{   if($fila2['fila']<=0)
	    {
	        echo '<td><h4>Empresas Cerradas </h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #5a677712; border-radius: 40px;
            font-size: 15px;">'.$fila2['fila'].'0</td>';
	    }
	    else
	    {
	        echo '<td><h4>Empresas Cerradas </h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #5a677712; border-radius: 40px; 
            font-size: 15px;">'.$fila2['fila'].'</td>';
	    }
	       
	}
	
	$usuario2=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01') AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{   if($fila2['fila']<=0)
	    {
	        echo '<td><h4>Unidades Cerradas </h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color:#5a677712; border-radius: 40px;
            font-size: 15px;">'.$fila2['fila'].'0</td>';
	    }
	    else
	    {
	        echo '<td><h4>Unidades Cerradas </h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color:#5a677712; border-radius: 40px; 
            font-size: 15px;">'.$fila2['fila'].'</td>';
	    }
	       
	}
	
	echo "<td><h4>Exportar:</h4></td>";
	echo "<td><a href=pdf/R_Total.php target='_blank'><img src='img/imprimir.png'></a></td>";
	echo "<td><a href=pdf/excel_total.php target='_blank'><img src='img/excel.png'></a></td>";
	echo "<td><a href='javascript:document.location.reload();'><img src='img/f9.png'></a></td>";
	echo '</tr>';
	echo "</table>";
    echo "<table class='tabla'>";
    echo '<tr>';
	$usuario=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')
					    GROUP BY u.Usuario ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{   $b=$fila2['suma'];    
        $a=100*$b/140;
        $a=round($a,2);
	    if($a<=70){
	      echo '<td><h4>'.$fila2['Usuario'].' '.$fila2['ApellidoP'].'</h4></td>';
	      echo '<td style="width:20%;">';
                echo "<style>
                #myProgress {
                  width: 100%;
                  background-color: #ddd;
                  border-radius:40px;
 	
                }
                #myBar".$fila2['Usuario']." {
                  width: ".$a."%;
                  height: 30px;
                  background-color: #fc7373;
                  text-align: center;
                  line-height: 30px;
                  color: #000;
                  border-radius:40px;
                  box-shadow: inset -1px -16px 0px 0px rgba(110, 110, 110, 0.28);
           
                }
                </style>";
                echo "<div id='myProgress'>";
                  echo "<div id='myBar".$fila2['Usuario']."'>".$a."%</div>";
                echo "</div>";
        echo '</td>';
    	}
    	else
    	{
    	    echo '<td><h4>'.$fila2['Usuario'].' '.$fila2['ApellidoP'].'</h4></td>';
	        echo '<td style="width:20%;">';
                echo "<style>
                #myProgress {
                  width: 100%;
                  background-color: #ddd;
                  border-radius:40px;
}";
        if($a<=100){
                echo"
                #myBar".$fila2['Usuario']." {
                  width: ".$a."%;
                  height: 30px;
                  background-color: #72dc7f;
                  text-align: center;
                  line-height: 30px;
                  color: white;
                  border-radius:40px;
                  box-shadow: inset -1px -16px 0px 0px rgba(110, 110, 110, 0.28);
           
                }";
            }
            else{
                echo"
                #myBar".$fila2['Usuario']." {
                  width: 100%;
                  height: 30px;
                  background-color: #72dc7f;
                  text-align: center;
                  line-height: 30px;
                  color: white;
                  border-radius:40px;
                  box-shadow: inset -1px -16px 0px 0px rgba(110, 110, 110, 0.28);
           
                }";
            }
                echo "</style>";
                echo "<div id='myProgress'>";
                  echo "<div id='myBar".$fila2['Usuario']."'>".$a."%</div>";
                echo "</div>";
            echo '</td>';
    	    
    	}
	}
	echo '</tr>';
	echo '</table>';
	echo '<table class="tabla">';
	echo '<td colspan="18" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Filtrar Empresas</td>';
	echo '<tr>';
	echo '<td><input type="text" id="FechaInicio" name="FechaInicio" placeholder="Fecha Inicio"/></td>';
	echo '<td><input type="text" id="FechaCierre" name="FechaCierre" placeholder="Fecha Fin"/></td>';
	echo '<td><input type="submit" id="buscar_fecha" name="buscar_fecha" value="Fecha" target="_blank"/></td>';
	
	echo "<td>";
	echo "<td>";
	echo "<select name='IdConsultor' id='IdConsultor'>"; 
	$sql="SELECT * 
	      FROM tconsultor c INNER JOIN tusuario u ON c.idusuario=u.idusuario 
	      WHERE u.usuario<>'Cesados'
	      ORDER BY Nombrec"; 
	$result=mysqli_query($conexion,$sql); 
	while ($row=mysqli_fetch_array($result)) 
	{ 
	echo "<option value=".$row['IdConsultor'].">".$row['Nombrec']." ".$row['ApellidoCP']."</option>\n"; 
	} 
	echo "</select> ";
	echo "</td>";
	echo '<td><input type="submit" id="buscar_consultor" name="buscar_consultor" value="Consultor" target="_blank"/></td>';
	echo "<td>";
	echo "<select name='IdUsuario' id='IdUsuario'>"; 
	$sql="SELECT * FROM tusuario WHERE Nivel='editor' AND Usuario<>'Cesados' ORDER BY IdUsuario"; 
	$result=mysqli_query($conexion,$sql); 
	while ($row=mysqli_fetch_array($result)) 
	{ 
	echo "<option value=".$row['IdUsuario'].">".$row['Usuario']." ".$row['ApellidoP']."</option>\n"; 
	} 
	echo "</select> ";
	echo "</td>";
	echo '<td><input type="submit" id="buscar_supervisor" name="buscar_supervisor" value="Supervisor" target="_blank"/></td>';
	echo "<td>";
	echo "<select name='Estado' id='Estado'>"; 
	echo "<option value='0'>0</option>\n"; 
	echo "<option value='1'>1</option>\n"; 
	echo "<option value='2'>2</option>\n"; 
	echo "<option value='3'>3</option>\n"; 
	echo "<option value='4'>4</option>\n"; 
	echo "<option value='5'>5</option>\n"; 
	echo "</select> ";
	echo "</td>";
	echo '<td><input type="submit" id="buscar_estado" name="buscar_estado" value="Estado" target="_blank"/></td>';
	echo '<td><input type="submit" id="supervisor_estado" name="supervisor_estado" value="S/E" target="_blank"/></td>';
	echo '<td><input type="text" maxlength="11" id="ruc" name="ruc" placeholder="Ingrese Ruc"/></td>';
	echo '<td><input type="submit" id="buscar_ruc" name="buscar_ruc" value="Ruc"/></td>';
	echo "</table>";
	echo "<table>";
    echo '<tr>';
	echo '<tr>';
	
	//AGREGAR SUPERVISOR 
	$query1=mysqli_query($conexion,"SELECT *,SUM(ca.Unidades) as suma
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.Estado='5' AND u.IdUsuario='11' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
	while($fila1=mysqli_fetch_array($query1))
	{
	$query2=mysqli_query($conexion,"SELECT *,SUM(ca.Unidades) as suma
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.Estado='5' AND u.IdUsuario='3' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
	while($fila2=mysqli_fetch_array($query2))
	{
	$query3=mysqli_query($conexion,"SELECT *,SUM(ca.Unidades) as suma
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.Estado='5' AND u.IdUsuario='6' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
	while($fila3=mysqli_fetch_array($query3))
	{
	echo "<canvas id='myChart' width='30%' height='7%'></canvas>
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['".$fila1['Usuario']."','".$fila2['Usuario']."','".$fila3['Usuario']."'],
                datasets: [{
                    label: 'Avance del Mes',
                    data: [".$fila1['suma'].",".$fila2['suma'].",".$fila3['suma']."],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)',
                        'rgba(132,231,55, 0.4)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(132,231,55, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>";
	}}}
	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="25" style="text-align: center; font-weight: bold; color: #e1e5e8; background-color: #e1e5e8;
		font-size:15px; height: 5px;"></td>';
    echo '</tr>';
	?>
	<!--<table class='tabla'>-->
 <!-- 
 <!--    echo "<canvas id='speedChart' width='30%' height='7%'>-->
 <!--        <script type='text/javascript'>-->
 <!--        var speedCanvas = document.getElementById('speedChart');-->
 <!--        Chart.defaults.global.defaultFontFamily = 'Lato';-->
 <!--        Chart.defaults.global.defaultFontSize = 15;-->
 <!--        var dataFirst = {-->
 <!--            label: 'Carlos',-->
 <!--            /*data: [0,0,0,0,0,14,38,56,42,67,88,184],*/-->
 <!--            data: [70,126,50],-->
 <!--            lineTension: 0.5,-->
 <!--            fill: false,-->
 <!--            borderColor: '#82ff73',-->
 <!--            backgroundColor: '#fff',-->
 <!--            pointBorderColor: '#82ff73',-->
 <!--            pointBackgroundColor: '#fff',-->
 <!--            pointRadius: 5,-->
 <!--            pointHoverRadius: 9,-->
 <!--            pointHitRadius: 10,-->
 <!--            pointBorderWidth: 2,-->
 <!--            pointStyle: 'rect'-->
 <!--         };-->
 <!--        var dataSecond = {-->
 <!--            label: 'Cinzia',-->
 <!--            /*data: [236,37,138,139,104,114,110,102,70,54,0,90],*/-->
 <!--            data: [59,88,19],-->
 <!--            lineTension: 0.5,-->
 <!--            fill: false,-->
 <!--            borderColor: '#ff7373',-->
 <!--            backgroundColor: '#fff',-->
 <!--            pointBorderColor: '#ff7373',-->
 <!--            pointBackgroundColor: '#fff',-->
 <!--            pointRadius: 5,-->
 <!--            pointHoverRadius: 9,-->
 <!--            pointHitRadius: 10,-->
 <!--            pointBorderWidth: 2,-->
 <!--            pointStyle: 'rect'-->
 <!--          };-->
 <!--          var dataThird = {-->
 <!--            label: 'Diego',-->
 <!--            /*data: [0,0,0,0,89,128,152,155,174,81,139,62],*/-->
 <!--            data: [118,125,56],-->
 <!--            lineTension: 0.5,-->
 <!--            fill: false,-->
 <!--            borderColor: '#73a5ff',-->
 <!--            backgroundColor: '#fff',-->
 <!--            pointBorderColor: '#73a5ff',-->
 <!--            pointBackgroundColor: '#fff',-->
 <!--            pointRadius: 5,-->
 <!--            pointHoverRadius: 9,-->
 <!--            pointHitRadius: 10,-->
 <!--            pointBorderWidth: 2,-->
 <!--            pointStyle: 'rect'-->
 <!--          };-->
 <!--          var dataFourth = {-->
 <!--            label: 'Cyscom',-->
 <!--            /*data: [0,0,0,0,0,107,109,156,97,116,210,83],*/-->
 <!--            data: [75,68,0],-->
 <!--            lineTension: 0.5,-->
 <!--            fill: false,-->
 <!--            borderColor: '#fff473',-->
 <!--            backgroundColor: '#fff',-->
 <!--            pointBorderColor: '#fff473',-->
 <!--            pointBackgroundColor: '#fff',-->
 <!--            pointRadius: 5,-->
 <!--            pointHoverRadius: 9,-->
 <!--            pointHitRadius: 10,-->
 <!--            pointBorderWidth: 2,-->
 <!--            pointStyle: 'rect'-->
 <!--          };-->
 <!--          var dataFifth = {-->
 <!--            label: 'Meta',-->
 <!--            data: [140,140,140,140,140,140,140,140,140,140,140,140],-->
 <!--            lineTension: 0.5,-->
 <!--            fill: false,-->
 <!--            borderColor: '#5a6777',-->
 <!--            backgroundColor: '#fff',-->
 <!--            pointBorderColor: '#5a6777',-->
 <!--            pointBackgroundColor: '#fff',-->
 <!--            pointRadius: 5,-->
 <!--            pointHoverRadius: 9,-->
 <!--            pointHitRadius: 10,-->
 <!--            pointBorderWidth: 2,-->
 <!--             pointStyle: 'rect'-->
 <!--          };-->
    
 <!--        var speedData = {-->
 <!--          labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],-->
 <!--          datasets: [dataFirst,dataSecond,dataThird,dataFourth,dataFifth]-->
 <!--        };-->
        
 <!--        var chartOptions = {-->
 <!--          legend: {-->
 <!--            display: true,-->
 <!--            position: 'top',-->
 <!--            labels: {-->
 <!--              boxWidth: 13,-->
 <!--              fontColor: 'black'-->
 <!--            }-->
 <!--          }-->
 <!--        };-->
        
 <!--        var lineChart = new Chart(speedCanvas, {-->
 <!--          type: 'line',-->
 <!--          data: speedData,-->
 <!--          options: chartOptions-->
 <!--        });-->
 <!--        </script>	-->
 <!--    </canvas>";-->
 <!--</tr>-->
 <!--   </table>-->
	<?php
	echo '<table class="tabla">';
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.Estado NOT IN ('0','5') AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	    echo '<td colspan="14" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">BASE DEL MES: '.$fila2['suma'].' Empresas</td>';
    	echo '<tr>';
	       
	}
	echo '</table>';
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
	echo "<th>Supervisor</th>";
	echo "<th>Consultor</th>";
// 	echo "<th>CP</th>";
// 	echo "<th>CP+</th>";
	echo "<th>Razon Social</th>";
	echo "<th>Ruc</th>";
	echo "<th>Porta</th>";
	echo "<th>Operador</th>";
	echo "<th>Und</th>";
	echo "<th>RB</th>";
	echo "<th>Pack/Chip</th>";
	echo "<th>Voz</th>";
	echo "<th>Fase</th>";
	echo "<th>Fecha Cierre</th>";
	echo "<th>Plazo</th>";
	echo "<th>Estado</th>";
	echo "<th colspan='2' style='text-align:center;'>Acción</th>";
	$usuario=mysqli_query($conexion,"SELECT DATEDIFF(ca.FechaCierre,ca.FechaInicio) AS dias,DATEDIFF(CURDATE(),ca.FechaCierre) AS actual,ca.IdCarpeta,u.Usuario,u.ApellidoP,ca.CPyme,ca.CPymeP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.FechaInicio,ca.Observacion 
		FROM tcarpeta ca 
		inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
		inner join tusuario u on u.IdUsuario=c.IdUsuario
		WHERE ca.Estado NOT IN ('0','5') AND u.Usuario<>'Cesados' 
		ORDER BY actual DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{ 	if($fila2['actual']>0)
	    { 
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
// 		."<td>".$fila2['CPyme']."</td>"
// 		."<td>".$fila2['CPymeP']."</td>"
		."<td>".substr ($fila2['Empresa'],0,19)."..</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>".$fila2['dias']."</td>"
		."<td style='background:#ee7d72; color:#fff;'>Vencida</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.strtolower($fila2['Observacion']).'</span></div>'
		."</td>"
		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";	
	    }
	    else{
	   echo "<tbody>"
		."<tr>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
// 		."<td>".$fila2['CPyme']."</td>"
// 		."<td>".$fila2['CPymeP']."</td>"
		."<td>".substr ($fila2['Empresa'],0,19)."..</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>".$fila2['dias']."</td>"
		."<td>Activo</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.strtolower($fila2['Observacion']).'</span></div>'
		."</td>"
		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";
	    }
	}
	echo "</table>";
	echo "</div>";
	echo "</from>";
?>