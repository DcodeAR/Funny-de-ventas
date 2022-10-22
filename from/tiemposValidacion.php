<?php
include("funciones.php");
date_default_timezone_set("America/Lima");
setlocale(LC_ALL,"hu_HU.UTF8");


echo '<h1>TIEMPO DE VALIDACION</h1>';
echo '<table class="default">';
	echo '<tr>';
    echo '<td>CONSULTOR ID</td>';

    echo '<td>CANTIDAD CARPETA</td>';

    echo '<td>TIEMPO TOTAL</td>';

  	echo '</tr>';

$query=mysqli_query($conexion,
	"SELECT tconsultor.Nombrec ,tcarpeta.IdConsultor,
	SEC_TO_TIME(SUM(TIME_TO_SEC(diferencia))) AS DIFERENCIA
	FROM tiempovalidacion INNER JOIN tcarpeta ON tiempovalidacion.IdCarpeta=tcarpeta.IdCarpeta INNER JOIN 
	tconsultor ON tconsultor.IdConsultor = tcarpeta.IdConsultor GROUP BY tcarpeta.IdConsultor;");
	while($fila=mysqli_fetch_array($query))
    {
  	echo '<tr>';

    echo '<td>'.$fila['Nombrec'].'</td>';

    echo '<td>'.$fila['IdConsultor'].'</td>';

    echo '<td>'.$fila['DIFERENCIA'].'</td>';

  	echo '</tr>';

	}
	echo '</table>';

	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a href="?pagina=l_carpeta_alert">Regresar </a>';
	echo '<a href="?pagina=logout">Cerrar Sesión</a>';
?>