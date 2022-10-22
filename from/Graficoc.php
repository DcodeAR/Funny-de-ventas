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
if (isset($_POST['grafico_c'])) {
    $IdConsultor=$_POST['IdConsultor'];	
    echo "".$IdConsultor;
 	echo "<table>";
     echo '<tr>';
     $enero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as enero
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-01-01') AND YEAR(ca.FechaCierre)=YEAR('2019-01-01') ");
 	while ($fila_enero=mysqli_fetch_array($enero)) 
 	{ 
     $febrero=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as febrero
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-02-01') AND YEAR(ca.FechaCierre)=YEAR('2019-02-01') ");
 	while ($fila_febrero=mysqli_fetch_array($febrero)) 
 	{ 
     $marzo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as marzo
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-03-01') AND YEAR(ca.FechaCierre)=YEAR('2019-03-01')");
 	while ($fila_marzo=mysqli_fetch_array($marzo)) 
 	{ 
      $abril=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as abril
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-04-01') AND YEAR(ca.FechaCierre)=YEAR('2019-04-01')");
 	while ($fila_abril=mysqli_fetch_array($abril)) 
 	{ 
     $mayo=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as mayo
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-05-01') AND YEAR(ca.FechaCierre)=YEAR('2019-05-01')");
 	while ($fila_mayo=mysqli_fetch_array($mayo)) 
 	{ 
      $junio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as junio
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-06-01') AND YEAR(ca.FechaCierre)=YEAR('2019-06-01')");
 	while ($fila_junio=mysqli_fetch_array($junio)) 
 	{ 
      $julio=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as julio
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-07-01') AND YEAR(ca.FechaCierre)=YEAR('2019-07-01')");
 	while ($fila_julio=mysqli_fetch_array($julio)) 
 	{ 
     $agosto=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as agosto
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-08-01') AND YEAR(ca.FechaCierre)=YEAR('2019-08-01')");
 	while ($fila_agosto=mysqli_fetch_array($agosto)) 
 	{   
 	$septiembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as septiembre
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-09-01') AND YEAR(ca.FechaCierre)=YEAR('2019-09-01')");
 	while ($fila_septiembre=mysqli_fetch_array($septiembre)) 
 	{  
 	$octubre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as octubre
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-10-01') AND YEAR(ca.FechaCierre)=YEAR('2019-10-01')");
 	while ($fila_octubre=mysqli_fetch_array($octubre)) 
 	{
 	$noviembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as noviembre
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-11-01') AND YEAR(ca.FechaCierre)=YEAR('2019-11-01')");
 	while ($fila_noviembre=mysqli_fetch_array($noviembre)) 
 	{
 	$diciembre=mysqli_query($conexion,"SELECT SUM(ca.Unidades) as diciembre
 						FROM tcarpeta ca 
 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
 						inner join tusuario u on u.IdUsuario=c.IdUsuario
 					    WHERE ca.Estado='5' AND MONTH(ca.FechaCierre)=MONTH('2019-12-01') AND YEAR(ca.FechaCierre)=YEAR('2019-12-01')");
 	while ($fila_diciembre=mysqli_fetch_array($diciembre)) 
 	{
     $usuario=mysqli_query($conexion,"SELECT *
 						FROM tconsultor
 						GROUP BY IdConsultor");
 	while ($fila2=mysqli_fetch_array($usuario)) 
 	{
     echo "<canvas id='speedChart' width='30%' height='7%'>
     <script type='text/javascript'>
     var speedCanvas = document.getElementById('speedChart');
     Chart.defaults.global.defaultFontFamily = 'Lato';
     Chart.defaults.global.defaultFontSize = 15;";
     echo "
     var dataFirst = {
         label: 'Funnel',
         data: ['".$fila_enero['enero']."','".$fila_febrero['febrero']."','".$fila_marzo['marzo']."'],
         lineTension: 0.5,
         fill: false,
         borderColor: '#ff7373',
         backgroundColor: '#fff',
         pointBorderColor: '#ff7373',
         pointBackgroundColor: '#fff',
         pointRadius: 5,
         pointHoverRadius: 9,
         pointHitRadius: 10,
         pointBorderWidth: 2,
         pointStyle: 'rect'
       };
       var dataThird = {
         label: 'Meta',
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
       };";
      echo "
     var speedData = {
       labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       datasets: [dataFirst,dataThird]
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

?>