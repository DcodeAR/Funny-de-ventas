<style>
.tooltip {
    position: relative;
    /*display: inline-block;*/
    /*border-bottom: 1px dotted black;*/
    font-size:15px;
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
if(isset($_POST['buscar_ruc'])){ 
if(isset($_POST["ruc"])){ 
$Ruc=$_POST['ruc'];	
$buscar = mysqli_query($conexion,"SELECT * FROM tcarpeta  WHERE Ruc= '".$Ruc."'"); 
if(mysqli_num_rows($buscar)){ 
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "<br><br>";
	echo "<table>";
	echo '<tr><td colspan="18" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Resultado por RUC</td></tr>';
	echo "</table>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Supervisor</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='2'>Accion</th>";
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion 
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Ruc='".$Ruc."' ");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['IdCarpeta']."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
		."</td>"
// 		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
}

else{ 
echo "<script>alert('Consultor no registrado');
	  window.location.href='?pagina=Pm_carpeta';
	  </script>";
} 
} 
} 
if(isset($_POST['buscar_ruca'])){
if(isset($_POST["ruca"])){
$Ruc=$_POST['ruca'];
$buscar = mysqli_query($conexion,"SELECT * FROM tcarpeta  WHERE Ruc= '".$Ruc."'"); 
if(mysqli_num_rows($buscar)){ 
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=Cm_carpeta">Volver </a>';
	echo "<br><br>";
	echo "<table>";
	echo '<tr><td colspan="18" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Resultado por RUC</td></tr>';
	echo "</table>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Supervisor</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='2'>Accion</th>";
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion 
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Ruc='".$Ruc."' ");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['IdCarpeta']."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
		."</td>"
// 		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo "</from>";
}

else{ 
echo "<script>alert('Consultor no registrado');
	  window.location.href='?pagina=Cm_carpeta';
	  </script>";
} 
} 
} 

if(isset($_POST['buscar_fecha'])){ 
$FechaInicio=$_POST['FechaInicio'];	
$FechaCierre=$_POST['FechaCierre'];
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "<br><br>";
	echo "<table>";
	echo '<tr><td colspan="18" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Buscador por Fecha</td></tr>';
	echo "</table>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='2'>Accion</th>";
	mysqli_query($conexion,'set @fila=0');
	$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaInicio,ca.FechaCierre,ca.Observacion 
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE u.Usuario='".$_SESSION['username']."' AND ca.FechaInicio BETWEEN '".$FechaInicio."' AND '".$FechaCierre."' AND ca.Estado NOT IN ('0','5')");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['fila']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
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
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
		."</td>"
		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";
	}
	echo "</table><br>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 


if(isset($_POST['buscar_consultor'])){ 
$IdConsultor=$_POST['IdConsultor'];	
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo "<a href='javascript:Openb(".$IdConsultor.")' target='_blank'><img src='img/grafico.png'></a>";
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "<br><br>";
	echo "<table class='tabla'>";
	echo '<tr>';
    $usuario=mysqli_query($conexion,"SELECT COUNT(ca.idcarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado NOT IN ('0','5') AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	    echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">'.$fila2['Nombrec'].' '.$fila2['ApellidoCP'].': '.$fila2['suma'].' Empresas</td>';
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
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre>=CURDATE() AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila2=mysqli_fetch_array($usuario1)) 
	{
    echo '<td><h4>Empresas Activas</h4></td>';
	echo '<td style="text-align: center; color: #333; background-color: #dddddd;
		font-size:15px; border-radius: 40px;">'.$fila2['fila'].'</td>';
	}	
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre<CURDATE()");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	echo '<td><h4>Empresas Vencidas</h4></td>';
	echo '<td style="text-align: center; color: #333; background-color: #dddddd;
		font-size:15px; border-radius: 40px;">'.$fila2['fila'].'</td>';
	}	
	$usuario2=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{   if($fila2['fila']<=0)
	    {
	        echo '<td><h4>Empresas Cerradas</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px;
            font-size: 15px;">'.$fila2['fila'].'0 </td>';
	    }
	    else
	    {
	        echo '<td><h4>Empresas Cerradas</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px; 
            font-size: 15px;">'.$fila2['fila'].'</td>';
	    }
	       
	}
	$usuario2=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{   if($fila2['fila']<=0)
	    {
	        echo '<td><h4>Unidades Cerradas</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px;
            font-size: 15px;">'.$fila2['fila'].'0</td>';
	    }
	    else
	    {
	        echo '<td><h4>Unidades Cerradas</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px; 
            font-size: 15px;">'.$fila2['fila'].'</td>';
	    }
	       
	}
	echo '</tr>';
	echo "</table>";
	
		echo "<table>";
	echo '<tr>';
	$usuario1=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma1
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='1' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila1=mysqli_fetch_array($usuario1)) 
	{ 
	$usuario2=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma2
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='2' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{ 
	$usuario3=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma3
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='3' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila3=mysqli_fetch_array($usuario3)) 
	{ 
	$usuario4=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma4
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='4' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
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
	    echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">BASE DEL MES</td>';
    echo '<tr>';
    echo "</table>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='3'>Accion</th>";
	mysqli_query($conexion,'set @fila=0');
	$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,DATEDIFF(CURDATE(),ca.FechaCierre) AS actual,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion,ca.IdCarpeta
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado NOT IN ('0','5')
						ORDER BY actual DESC ");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	    if($fila2['actual']>0){
	    echo "<tbody>"
		."<tr>"
		."<td>".$fila2['fila']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td style='background:#ee7d72; color:#fff;'>Vencida</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.strtolower($fila2['Observacion']).'</span></div>'
		."</td>"
		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";
	    }
	    else
	    {
	         echo "<tbody>"
		."<tr>"
		."<td>".$fila2['fila']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>Activo</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.strtolower($fila2['Observacion']).'</span></div>'
		."</td>"
		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";
	    }
			
	}
	echo "</table><br>";
	echo "</div><br><br>";
	echo "<table class='tabla'>";
	   echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">BASE EN ESTADO [ 0 y 5 ]</td>';
    echo '<tr>';
    echo "</table>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='3'>Accion</th>";
	mysqli_query($conexion,'set @fila=0');
	$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion,ca.IdCarpeta
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."'  AND ca.Estado IN ('0','5')
						ORDER BY fila ");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['fila']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
		."</td>"
		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo "</div>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 

if(isset($_POST['consultor_estado'])){ 
$Estado=$_POST['Estado'];
$IdConsultor=$_POST['IdConsultor'];	
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "<br><br>";
	echo "<table class='tabla'>";
	echo '<td colspan="14" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Filtro de Estado por Consultor</td>';
    echo '<tr>';
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='".$Estado."'
					    ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{   
	    echo '<td><h4>'.$fila2['Nombrec'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #ff7373; background-color: #5a677738;
		    font-size:17px;">'.$fila2['suma'].'u</td>';
	}
	echo '</tr>';
	echo "</table>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Supervisor</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='3'>Accion</th>";
	mysqli_query($conexion,'set @fila=0');
	$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion,ca.IdCarpeta
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='".$Estado."'
						ORDER BY fila ");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['fila']."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
		."</td>"
		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo "</div>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 

//BUSCAR ESTADO CONSULTOR
if(isset($_POST['buscar_est'])){ 
$Estado=$_POST['Estados'];	
    echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=Cm_carpeta">Volver </a>';
	echo "<br><br>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Supervisor</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='3'>Accion</th>";
	mysqli_query($conexion,'set @fila=0');
	$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion,ca.IdCarpeta
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado='".$Estado."' AND c.NombreC='".$_SESSION['username']."'
						ORDER BY fila");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['fila']."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
		."</td>"
		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo "</div>";
	echo "</from>";
} 
//BUSCAR ESTADO CONSULTOR
if(isset($_POST['buscar_estado'])){ 
$Estado=$_POST['Estado'];	
    echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=Pm_carpeta">Volver </a>';
	echo "<br><br>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
	echo "<th>N°</th>";
	echo "<th>Supervisor</th>";
	echo "<th>Consultor</th>";
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
	echo "<th colspan='3'>Accion</th>";
	mysqli_query($conexion,'set @fila=0');
	$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion,ca.IdCarpeta
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado='".$Estado."' AND u.Usuario='".$_SESSION['username']."' AND MONTH(ca.FechaCierre)=MONTH(NOW())
						ORDER BY fila");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
		."<td>".$fila2['fila']."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
		."<td>".$fila2['Empresa']."</td>"
		."<td>".$fila2['Ruc']."</td>"
		."<td>".$fila2['Porta']."</td>"
		."<td>".$fila2['Operador']."</td>"
		."<td>".$fila2['Unidades']."</td>"
		."<td>".$fila2['RentaBasica']."</td>"
		."<td>".$fila2['Pack']."</td>"
		."<td>".$fila2['Voz']."</td>"
		."<td>".$fila2['Estado']."</td>"
		."<td>".$fila2['FechaCierre']."</td>"
		."<td>"
		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
		."</td>"
		.'<td><a href="javascript:Open('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo "</div>";
	echo "</from>";
} 
?> 