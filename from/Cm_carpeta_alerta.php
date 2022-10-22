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
include("menuconsultor.php");

date_default_timezone_set("America/Lima");
$dia=strftime( "%y/%m/%d",time());
	echo "<br>";
	echo '<form id="datos" method="POST" action="?pagina=Pl_buscar_ruc"> ';
	echo "<table class='tabla'>";
	echo '<tr>';
    $usuario=mysqli_query($conexion,"SELECT COUNT(ca.idcarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado NOT IN ('0','5') AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	    echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">'.$_SESSION['username'].' '.$fila2['ApellidoCP'].' : '.$fila2['suma'].' Empresas</td>';
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
						WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre>=CURDATE() AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario1)) 
	{
	echo '<td><h4>Empresas Activas</h4></td>';
	echo '<td style="text-align: center; color: #333; background-color: #dddddd;
		font-size:15px; border-radius: 40px; width:10%;">'.$fila2['fila'].'</td>';
	}	
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre<CURDATE() AND u.Usuario<>'Cesados'");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	echo '<td><h4>Empresas Vencidas</h4></td>';
	echo '<td style="text-align: center; color: #333; background-color: #dddddd;
		font-size:15px; border-radius: 40px; width:10%;">'.$fila2['fila'].'</td>';
	if($fila2['fila']>0)
	{
    	echo '<script type="text/javascript">
        swal("'.$_SESSION['username'].' tienes '.$fila2['fila'].' empresa(s) vencida(s)","Haz clic para continuar","error");
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
						WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01') ");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{   if($fila2['fila']<=0)
	    {
	        echo '<td><h4>Empresa Cerrada</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px;
            font-size: 15px; width:10%;">'.$fila2['fila'].'</td>';
	    }
	    else
	    {
	        echo '<td><h4>Empresa Cerrada</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px; 
            font-size: 15px; width:10%;">'.$fila2['fila'].'</td>';
	    }
	       
	}
	$usuario2=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01') ");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{   if($fila2['fila']<=0)
	    {
	        echo '<td><h4>Unidades Cerradas</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px;
            font-size: 15px; width:10%;">'.$fila2['fila'].'0</td>';
	    }
	    else
	    {
	        echo '<td><h4>Unidades Cerradas</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px; 
            font-size: 15px; width:10%;">'.$fila2['fila'].'</td>';
	    }
	       
	}
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
	    if($a<=30){
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
    font-size: 15px;">FILTRAR</td>';
	echo '<tr>';
	echo '<td style="width:300px;"><input type="text" maxlength="11" id="ruca" name="ruca" placeholder="Ingrese Ruc"/></td>';
	echo '<td><input type="submit" id="buscar_ruca" name="buscar_ruca" value="Buscar Ruc"/></td>';
	echo "<td style='width:100px;' >";
	echo "<select name='Estados' id='Estados'>"; 
	echo "<option value='0'>0</option>\n"; 
	echo "<option value='1'>1</option>\n"; 
	echo "<option value='2'>2</option>\n"; 
	echo "<option value='3'>3</option>\n"; 
	echo "<option value='4'>4</option>\n"; 
	echo "<option value='5'>5</option>\n"; 
	echo "</select> ";
	echo "</td>";
	echo '<td><input type="submit" id="buscar_est" name="buscar_est" value="Estado" target="_blank"/></td>';
	echo '</tr>';
	echo '</table>';
	echo "<table>";
	echo '<tr>';
	$usuario1=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma1
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado='1' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila1=mysqli_fetch_array($usuario1)) 
	{ 
	$usuario2=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma2
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.Nombrec='".$_SESSION['username']."'  AND ca.Estado='2' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{ 
	$usuario3=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma3
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.Nombrec='".$_SESSION['username']."'  AND ca.Estado='3' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila3=mysqli_fetch_array($usuario3)) 
	{ 
	$usuario4=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma4
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.Nombrec='".$_SESSION['username']."'  AND ca.Estado='4' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila4=mysqli_fetch_array($usuario4)) 
	{ 
	echo "<canvas id='myChart' width='30%' height='7%'></canvas>
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Estado 1','Estado 2','Estado 3','Estado 4'],
                datasets: [{
                    label: 'Reporte de Estados',
                    data: ['".$fila1['suma1']."', '".$fila2['suma2']."', '".$fila3['suma3']."', '".$fila4['suma4']."'],
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
	}
	}
	}
	}
	echo '</tr>';
	echo "</table>";
    echo "<table class='tabla'>";
    echo '<td colspan="18" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">BASE DEL MES</td>';
	echo "</table>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
	echo "<th>Consultor</th>";
	echo "<th>CP</th>";
	echo "<th>CP+</th>";
	echo "<th>Razon Social</th>";
	echo "<th>Ruc</th>";
	echo "<th>Porta</th>";
	echo "<th>Operador</th>";
	echo "<th>Und</th>";
	echo "<th>RB</th>";
	echo "<th>Pack/Chip</th>";
	echo "<th>Voz</th>";
	echo "<th>Fase</th>";
	echo "<th>Fecha Inicio</th>";
	echo "<th>Fecha Cierre</th>";
	echo "<th>Plazo</th>";
	echo "<th>Estado</th>";
	echo "<th colspan='3'>Acción</th>";
	$usuario=mysqli_query($conexion,"SELECT DATEDIFF(CURDATE(),ca.FechaInicio) AS plazo,DATEDIFF(CURDATE(),ca.FechaCierre) AS actual,ca.CPyme,ca.CPymeP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.FechaInicio,ca.Observacion,ca.IdCarpeta
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado NOT IN ('0','5')
						ORDER BY actual DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		if($fila2['actual']>0)
		{
		echo "<tbody>"
    		."<tr>"
    		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
    		."<td>".$fila2['CPyme']."</td>"
    		."<td>".$fila2['CPymeP']."</td>"
    		."<td>".$fila2['Empresa']."</td>"
    		."<td>".$fila2['Ruc']."</td>"
    		."<td>".$fila2['Porta']."</td>"
    		."<td>".$fila2['Operador']."</td>"
    		."<td>".$fila2['Unidades']."</td>"
    		."<td>".$fila2['RentaBasica']."</td>"
    		."<td>".$fila2['Pack']."</td>"
    		."<td>".$fila2['Voz']."</td>"
    		."<td>".$fila2['Estado']."</td>"
    		."<td>".$fila2['FechaInicio']."</td>"
    		."<td>".$fila2['FechaCierre']."</td>"
    		."<td style='background:#ee7d72; color:#fff;'>Vencida</td>"
    		."<td>"
    		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
    		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
    		."</td>"
    		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
    		."</tr>"			
		."</tbody>";
		}
		else{
		echo "<tbody>"
    		."<tr>"
    		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
    		."<td>".$fila2['CPyme']."</td>"
    		."<td>".$fila2['CPymeP']."</td>"
    		."<td>".$fila2['Empresa']."</td>"
    		."<td>".$fila2['Ruc']."</td>"
    		."<td>".$fila2['Porta']."</td>"
    		."<td>".$fila2['Operador']."</td>"
    		."<td>".$fila2['Unidades']."</td>"
    		."<td>".$fila2['RentaBasica']."</td>"
    		."<td>".$fila2['Pack']."</td>"
    		."<td>".$fila2['Voz']."</td>"
    		."<td>".$fila2['Estado']."</td>"
    		."<td>".$fila2['FechaInicio']."</td>"
    		."<td>".$fila2['FechaCierre']."</td>"
    		."<td>Activo</td>"
    		."<td>"
    		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
    		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
    		."</td>"
    		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
    		."</tr>"			
		."</tbody>";
		}
	}
	echo "</table><br>";
	echo "</div>";
	echo "</from>";
?>