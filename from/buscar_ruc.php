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
    height:470px;
    overflow:auto;
    margin-bottom:20px;
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
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "<br><br>";
	echo "<table class='tabla'>";
	echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Resultado de búsqueda</td>';
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
	echo "<th colspan='3'>Accion</th>";
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion 
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Ruc='".$Ruc."'");
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
		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."<td><a href=?pagina=CRUD_Carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
}

else{ 
echo "<script>alert('Consultor no registrado');
	  window.location.href='?pagina=l_carpeta';
	  </script>";
} 
} 
} 

if(isset($_POST['buscar_fecha'])){ 
$FechaInicio=$_POST['FechaInicio'];	
$FechaCierre=$_POST['FechaCierre'];
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
    echo "<br><br>";
	echo "<table class='tabla'>";
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.FechaCierre BETWEEN '".$FechaInicio."' AND '".$FechaCierre."' AND ca.Estado NOT IN ('0','5') AND u.Usuario<>'Cesados'
					    ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	    echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Carpetas: '.$fila2['suma'].'c</td>';
	}
    echo '<tr>';
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.FechaCierre BETWEEN '".$FechaInicio."' AND '".$FechaCierre."' AND ca.Estado NOT IN ('0','5') AND u.Usuario<>'Cesados'
					    GROUP BY u.Usuario 
					    ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{   if ($fila2['suma']<30){
	    echo '<td><h4>'.$fila2['Usuario'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #fff; background-color: #ff7373;
		    font-size:15px;">'.$fila2['suma'].'c</td>';
    	}
    	else if($fila2['suma']>=30 && $fila2['suma']<70){
	    echo '<td><h4>'.$fila2['Usuario'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #333; background-color: #ffff00b8;
		    font-size:15px;">'.$fila2['suma'].'c</td>';
    	}
    	else{
	    echo '<td><h4>'.$fila2['Usuario'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #fff; background-color: #008000b0;
		    font-size:15px;">'.$fila2['suma'].'c</td>';
    	}
    	
	}
	echo '</tr>';
	echo '</table>';
	
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
	mysqli_query($conexion,'SET @fila=0');
	$usuario=mysqli_query($conexion,"SELECT @fila:=@fila+1 as fila,ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion 
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.FechaCierre BETWEEN '".$FechaInicio."' AND '".$FechaCierre."' AND ca.Estado NOT IN ('0','5') AND u.Usuario<>'Cesados'
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
		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
		."<td><a href=?pagina=CRUD_carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 

if(isset($_POST['buscar_supervisor'])){ 
$IdUsuario=$_POST['IdUsuario'];	
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
    echo "<br><br>";
	echo "<table class='tabla'>";
	echo '<tr>';
    $usuario=mysqli_query($conexion,"SELECT COUNT(ca.idcarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado NOT IN ('0','5') AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	    echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Grupo de '.$fila2['Usuario'].': '.$fila2['suma'].' Empresas</td>';
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
						WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre>=CURDATE() AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
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
						WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre<CURDATE()");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	echo '<td><h4>Empresas Activas</h4></td>';
	echo '<td style="text-align: center; color: #333; background-color: #dddddd;
		font-size:15px; border-radius: 40px;">'.$fila2['fila'].'</td>';
	}	
	$usuario2=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{   if($fila2['fila']<=0)
	    {
	        echo '<td><h4>Empresas Cerradas</h4></td>';
	        echo '<td style="text-align: center;
            font-weight: bold;
            color: #ff7373;
            background-color: #6360604a; border-radius: 40px;
            font-size: 15px;">'.$fila2['fila'].'0</td>';
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
						WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
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
    echo "<table class='tabla'>";
    echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Consultores</td>';
	echo '<tr>';
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado NOT IN ('0','5') AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
					    GROUP BY c.Nombrec
					    ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{   
	    echo '<td><h4>'.$fila2['Nombrec'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #ff7373; background-color: #5a677738;
		    font-size:15px;">'.$fila2['suma'].'</td>';
	}
	echo '</tr>';
	echo '</table>';
// 		echo "<table>";
// 		echo '<tr>';
// 	    echo '<td colspan="25" style="text-align: center; font-weight: bold; color: #fff; background-color: #5a6777;
// 		font-size:15px;">Avance de Estados</td>';
// 		echo '</tr>';
// 	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
// 						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado NOT IN ('0','5') AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
// 					    GROUP BY ca.Estado
// 					    ORDER BY Estado DESC");
// 	while ($fila2=mysqli_fetch_array($usuario)) 
// 	{   
// 	    echo '<td><h4>Estado: '.$fila2['Estado'].'</h4></td>';
// 	    echo '<td style="text-align: center; font-weight: bold; color: #ff7373; background-color: #5a677738;
// 		    font-size:15px;">'.$fila2['suma'].'c</td>';
// 	}
// 	echo '</tr>';
// 	echo '</table>';
		echo "<table>";
	echo '<tr>';
	$usuario1=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma1
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='1' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila1=mysqli_fetch_array($usuario1)) 
	{ 
	$usuario2=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma2
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='2' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila2=mysqli_fetch_array($usuario2)) 
	{ 
	$usuario3=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma3
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='3' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
	while ($fila3=mysqli_fetch_array($usuario3)) 
	{ 
	$usuario4=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as suma4
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='4' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())");
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
// 	echo "<table>";
//     echo '<tr>';
//     $enero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as enero
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-01-01') AND YEAR(ca.FechaCierre)=YEAR('2019-01-01') ");
// 	while ($fila_enero=mysqli_fetch_array($enero)) 
// 	{ 
//     $febrero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as febrero
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-02-01') AND YEAR(ca.FechaCierre)=YEAR('2019-02-01') ");
// 	while ($fila_febrero=mysqli_fetch_array($febrero)) 
// 	{ 
//     $marzo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as marzo
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-03-01') AND YEAR(ca.FechaCierre)=YEAR('2019-03-01')");
// 	while ($fila_marzo=mysqli_fetch_array($marzo)) 
// 	{ 
//      $abril=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as abril
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-04-01') AND YEAR(ca.FechaCierre)=YEAR('2019-04-01')");
// 	while ($fila_abril=mysqli_fetch_array($abril)) 
// 	{ 
//     $mayo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as mayo
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-05-01') AND YEAR(ca.FechaCierre)=YEAR('2019-05-01')");
// 	while ($fila_mayo=mysqli_fetch_array($mayo)) 
// 	{ 
//      $junio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as junio
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-06-01') AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
// 	while ($fila_junio=mysqli_fetch_array($junio)) 
// 	{ 
//      $julio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as julio
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-07-01') AND YEAR(ca.FechaCierre)=YEAR('2019-07-01')");
// 	while ($fila_julio=mysqli_fetch_array($julio)) 
// 	{ 
//     $agosto=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as agosto
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-08-01') AND YEAR(ca.FechaCierre)=YEAR('2019-08-01')");
// 	while ($fila_agosto=mysqli_fetch_array($agosto)) 
// 	{   
// 	$septiembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as septiembre
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-09-01') AND YEAR(ca.FechaCierre)=YEAR('2019-09-01')");
// 	while ($fila_septiembre=mysqli_fetch_array($septiembre)) 
// 	{  
// 	$octubre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as octubre
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-10-01') AND YEAR(ca.FechaCierre)=YEAR('2019-10-01')");
// 	while ($fila_octubre=mysqli_fetch_array($octubre)) 
// 	{
// 	$noviembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as noviembre
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-11-01') AND YEAR(ca.FechaCierre)=YEAR('2019-11-01')");
// 	while ($fila_noviembre=mysqli_fetch_array($noviembre)) 
// 	{
// 	$diciembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as diciembre
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-12-01') AND YEAR(ca.FechaCierre)=YEAR('2019-12-01')");
// 	while ($fila_diciembre=mysqli_fetch_array($diciembre)) 
// 	{
//     $usuario=mysqli_query($conexion,"SELECT *
// 						FROM tusuario
// 						WHERE IdUsuario='".$IdUsuario."'");
// 	while ($fila2=mysqli_fetch_array($usuario)) 
// 	{
//     echo "<canvas id='speedChart' width='30%' height='7%'>
//     <script type='text/javascript'>
//     var speedCanvas = document.getElementById('speedChart');
//     Chart.defaults.global.defaultFontFamily = 'Lato';
//     Chart.defaults.global.defaultFontSize = 15;";
//     echo "
//     var dataFirst = {
//         label: 'Funnel',
//         data: ['".$fila_enero['enero']."'],
//         lineTension: 0.5,
//         fill: false,
//         borderColor: '#ff7373',
//         backgroundColor: '#fff',
//         pointBorderColor: '#ff7373',
//         pointBackgroundColor: '#fff',
//         pointRadius: 5,
//         pointHoverRadius: 9,
//         pointHitRadius: 10,
//         pointBorderWidth: 2,
//         pointStyle: 'rect'
//       };
//       var dataThird = {
//         label: 'Meta',
//         data: [140,140,140,140,140,140,140,140,140,140,140,140],
//         lineTension: 0.5,
//         fill: false,
//         borderColor: '#5a6777',
//         backgroundColor: '#fff',
//         pointBorderColor: '#5a6777',
//         pointBackgroundColor: '#fff',
//         pointRadius: 5,
//         pointHoverRadius: 9,
//         pointHitRadius: 10,
//         pointBorderWidth: 2,
//         // pointStyle: 'rect'
//       };";
//     switch ($fila2['Usuario']):
//         case Carlos:
//             echo "
//             var dataSecond = {
//             label: 'RVentas',
//             /*data: [0,0,0,0,0,107,109,156,97,116,210,83],*/
//             data: [38],
//             lineTension: 0.5,
//             fill: false,
//             borderColor: '#82ff73',
//             backgroundColor: '#fff',
//             pointBorderColor: '#82ff73',
//             pointBackgroundColor: '#fff',
//             pointRadius: 5,
//             pointHoverRadius: 9,
//             pointHitRadius: 10,
//             pointBorderWidth: 2,
//             pointStyle: 'rect'
//             };";
//             break;
//         case Giovana:
//             echo "
//             var dataSecond = {
//             label: 'RVentas',
//             /*data: [236,37,138,139,104,114,110,102,70,54,0,90],*/
//             data: [7],
//             lineTension: 0.5,
//             fill: false,
//             borderColor: '#82ff73',
//             backgroundColor: '#fff',
//             pointBorderColor: '#82ff73',
//             pointBackgroundColor: '#fff',
//             pointRadius: 5,
//             pointHoverRadius: 9,
//             pointHitRadius: 10,
//             pointBorderWidth: 2,
//             pointStyle: 'rect'
//             };";
//             break;
//         case Diego:
//             echo "
//             var dataSecond = {
//             label: 'RVentas',
//             /*data: [0,0,0,0,89,128,152,155,174,81,139,62],*/
//             data: [36],
//             lineTension: 0.5,
//             fill: false,
//             borderColor: '#73a5ff',
//             backgroundColor: '#fff',
//             pointBorderColor: '#73a5ff',
//             pointBackgroundColor: '#fff',
//             pointRadius: 5,
//             pointHoverRadius: 9,
//             pointHitRadius: 10,
//             pointBorderWidth: 2,
//             pointStyle: 'rect'
//             };";
//             break;
//             case Gonzalo:
//             echo "
//             var dataSecond = {
//             label: 'RVentas',
//             /*data: [0,0,0,0,0,14,38,56,43,67,88,184],*/
//             data: [29],
//             lineTension: 0.5,
//             fill: false,
//             borderColor: '#82ff73',
//             backgroundColor: '#fff',
//             pointBorderColor: '#82ff73',
//             pointBackgroundColor: '#fff',
//             pointRadius: 5,
//             pointHoverRadius: 9,
//             pointHitRadius: 10,
//             pointBorderWidth: 2,
//             pointStyle: 'rect'
//             };";
//             break;
//     endswitch;
//      echo "
//     var speedData = {
//       labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
//       datasets: [dataFirst,dataSecond,dataThird]
//     };
    
//     var chartOptions = {
//       legend: {
//         display: true,
//         position: 'top',
//         labels: {
//           boxWidth: 13,
//           fontColor: 'Black'
//         }
//       }
//     };
    
//     var lineChart = new Chart(speedCanvas, {
//       type: 'line',
//       data: speedData,
//       options: chartOptions
//     });
//     </script>	
//     </canvas>";
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	}
// 	echo '</tr>';
// 	echo "</table>";
	echo "<table class='tabla'>";
	$usuario=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado NOT IN ('0','5') AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
					    ORDER BY suma DESC");					    
	while ($fila2=mysqli_fetch_array($usuario))
	{
	echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">BASE MES: '.$fila2['suma'].' Unidades</td>';
	}
    echo '<tr>';
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
	echo "<th>Fecha Cierre</th>";
	echo "<th>DiasE</th>";
	echo "<th>DiasT</th>";
	echo "<th>Buscar</th>";
	echo "<th>Editar</th>";
	echo "<th>Enviar</th>";
	$usuario=mysqli_query($conexion,"SELECT DATEDIFF(ca.FechaCierre,ca.FechaInicio) AS dias,DATEDIFF(CURDATE(),ca.FechaCierre) AS actual,ca.IdCarpeta,ca.CPyme,ca.CPymeP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.FechaInicio,ca.Observacion 
		FROM tcarpeta ca 
		inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
		inner join tusuario u on u.IdUsuario=c.IdUsuario
		WHERE ca.Estado NOT IN ('0','5') AND u.IdUsuario='".$IdUsuario."'
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
        		."<td>".substr($fila2['Empresa'],0,19)."..</td>"
        		."<td>".$fila2['Ruc']."</td>"
        		."<td>".$fila2['Porta']."</td>"
        		."<td>".$fila2['Operador']."</td>"
        		."<td style='font-weight: bold;'>".$fila2['Unidades']."</td>"
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
        		."<td><a href=?pagina=CRUD_Carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Enviar=Enviar><img src='img/enviar.png'></a></td>"
        		."</tr>"			
        		."</tbody>";	
        	    }
        	    else{
        	        echo "<tbody>"
        		."<tr>"
        		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']."</td>"
        		."<td>".$fila2['CPyme']."</td>"
        		."<td>".$fila2['CPymeP']."</td>"
        		."<td>".substr ($fila2['Empresa'],0,19)."..</td>"
        		."<td>".$fila2['Ruc']."</td>"
        		."<td>".$fila2['Porta']."</td>"
        		."<td>".$fila2['Operador']."</td>"
        		."<td style='font-weight: bold;'>".$fila2['Unidades']."</td>"
        		."<td>".$fila2['RentaBasica']."</td>"
        		."<td>".$fila2['Pack']."</td>"
        		."<td>".$fila2['Voz']."</td>"
        		."<td>".$fila2['Estado']."</td>"
        		."<td>".$fila2['FechaCierre']."</td>"
        		."<td>".$fila2['dias']."</td>"
        		."<td>Activo</td>"
        		."<td>"
        		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
        		<span class="tooltiptext">'.$fila2['Observacion'].'</span></div>'
        		."</td>"
        		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
        		."<td><a href=?pagina=CRUD_Carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Enviar=Enviar><img src='img/enviar.png'></a></td>"
        		."</tr>"			
        		."</tbody>";
        	    }
            }
	echo "</table><br>";
	echo "</div>";
	echo '<a style="background-color: #e4e4e4;
    color: #111213;
    padding: 6px;
    font-size: 13px;
    margin-right: 5px;
    border-radius: 4px;
    border: 1px solid #403f3f2b;" href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 

if(isset($_POST['buscar_consultor'])){ 
$IdConsultor=$_POST['IdConsultor'];	
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";    
	echo '<a href="?pagina=l_carpeta">Volver </a>';
	echo '<a href="?pagina=logout"> Cerrar Sesión</a>';
	echo "<a href='javascript:Openb(".$IdConsultor.")' target='_blank'><img src='img/grafico.png'></a>";
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
            font-size: 15px;">'.$fila2['fila'].'</td>';
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
                    label: 'Reporte Estado',
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
		echo '<table class="tabla">';
	echo '<tr>';
	echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Empresas del Mes</td>';
    echo '<tr>';
    echo '</table>';
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
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
	echo "<th>Estado</th>";
	echo "<th colspan='3'>Accion</th>";
	mysqli_query($conexion,'SET @fila=0');
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,DATEDIFF(CURDATE(),ca.FechaCierre) AS actual,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado NOT IN('0','5')
						ORDER BY actual DESC");
        while ($fila2=mysqli_fetch_array($usuario)) 
        	{
        	    if($fila2['actual']>0)
        	    {
            	    echo "<tbody>"
            		."<tr>"
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
            		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
            // 		."<td><a href=?pagina=CRUD_Carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
            		."</tr>"			
            		."</tbody>";
        	    }
        	    else 
        	    {
        	         echo "<tbody>"
            		."<tr>"
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
            		."<td>Activa</td>"
            		."<td>"
            		.'<div class="tooltip"><a href="#"><img src="img/lupa.png"></a>
            		<span class="tooltiptext">'.strtolower($fila2['Observacion']).'</span></div>'
            		."</td>"
            		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
            // 		."<td><a href=?pagina=CRUD_Carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
            		."</tr>"			
            		."</tbody>";
        	    }
        		
        }
	echo "</table><br>";
	echo "</div>";
	echo "<table class='tabla'>";
	echo '<tr>';
	echo '<td colspan="25" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Empresas en Estado [ 5 ]</td>';
    echo '<tr>';
	echo "</table>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
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
	mysqli_query($conexion,'SET @fila=0');
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE c.IdConsultor='".$IdConsultor."' AND ca.Estado='5'
						AND MONTH(ca.FechaCierre)=MONTH(NOW())
						ORDER BY ca.Unidades DESC");
        while ($fila2=mysqli_fetch_array($usuario)) 
        	{
        		echo "<tbody>"
        		."<tr>"
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
        		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
        		."<td><a href=?pagina=CRUD_Carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
        		."</tr>"			
        		."</tbody>";	
        }
	echo "</table><br>";
	echo "</div>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 

if(isset($_POST['supervisor_estado'])){ 
$Estado=$_POST['Estado'];	
$IdUsuario=$_POST['IdUsuario'];
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
    echo "<br><br>";
    	echo "<table class='tabla'>";
	echo '<tr>';
	$usuario=mysqli_query($conexion,"SELECT *
						FROM tusuario
						WHERE IdUsuario='".$IdUsuario."'");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	    	 echo '<td style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Supervisor: '.$fila2['Usuario'].' '.$fila2['ApellidoP'].'</td>';
	}
   echo '</tr>';
   echo "</table>";
	echo "<table class='tabla'>";
	echo '<tr>';
	$usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as num,SUM(ca.Unidades) as suma,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado='".$Estado."' AND MONTH(ca.FechaCierre)=MONTH(CURDATE()) AND u.IdUsuario='".$IdUsuario."'
						ORDER BY ca.Unidades DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	        echo '<td style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">'.$fila2['num'].' Empresas || '.$fila2['suma'].' Unidades</td>';
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
					    WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='".$Estado."' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
					    GROUP BY c.Nombrec
					    ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{  
	    echo '<td><h4>'.$fila2['Nombrec'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #ff7373; background-color: #5a677738;
		    font-size:15px;">'.$fila2['suma'].'</td>';
    }
	echo '</tr>';
	echo "</table>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
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
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE u.IdUsuario='".$IdUsuario."' AND ca.Estado='".$Estado."' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
						ORDER BY ca.Unidades DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
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
		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
// 		."<td><a href=?pagina=CRUD_Carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo "</div>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 

if(isset($_POST['buscar_estado'])){ 
$Estado=$_POST['Estado'];	
	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
    echo "<br><br>";
	echo "<table class='tabla'>";
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado='".$Estado."' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
						ORDER BY ca.Unidades DESC");
	$num=mysqli_num_rows($usuario);	
	echo '<td colspan="14" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;"">Registros: '.$num.' Empresas del Estado '.$Estado.'</td>';
	    echo '<tr>';
	$usuario=mysqli_query($conexion,"SELECT *,SUM(ca.Unidades) as suma
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    WHERE ca.Estado='".$Estado."' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
					    GROUP BY u.Usuario
					    ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{   
	    echo '<td><h4>'.$fila2['Usuario'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #ff7373; background-color: #5a677738;
		    font-size:15px;">'.$fila2['suma'].' u</td>';
    	
	}
	echo '</tr>';
	echo "</table>";
	echo "<div class='Gandalf'>";
	echo '<table border="1" class="tabla">';
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
	$usuario=mysqli_query($conexion,"SELECT ca.IdCarpeta,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,ca.Empresa,ca.Ruc,ca.Porta,ca.Operador,ca.Unidades,ca.RentaBasica,
						ca.Pack,ca.Voz,ca.Estado,ca.FechaCierre,ca.Observacion
						FROM tcarpeta ca 
						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
						inner join tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.Estado='".$Estado."' AND MONTH(ca.FechaCierre)=MONTH(CURDATE())
						ORDER BY u.Usuario,ca.Unidades DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody>"
		."<tr>"
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
		.'<td><a href="javascript:Opena('.$fila2['IdCarpeta'].')"><img src="img/editar.png"></img></a></td>'
// 		."<td><a href=?pagina=CRUD_carpeta&IdCarpeta=".$fila2['IdCarpeta']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
		."</tr>"			
		."</tbody>";	
	}
	echo "</table><br>";
	echo "</div>";
	echo '<a  href="?pagina=l_carpeta">Volver </a>';
	echo '<a  href="?pagina=logout"> Cerrar Sesión</a>';
	echo "</from>";
} 
?> 