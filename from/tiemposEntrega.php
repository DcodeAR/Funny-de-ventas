<?php
include("funciones.php");
date_default_timezone_set("America/Lima");
setlocale(LC_ALL,"hu_HU.UTF8");
echo '<h1>TIEMPO DE ENTREGA</h1>';
echo '<table class="default">';
	echo '<tr>';
    echo '<td>CONSULTOR ID</td>';

    echo '<td>CANTIDAD CARPETA</td>';

    echo '<td>TIEMPO TOTAL</td>';

  	echo '</tr>';

$query=mysqli_query($conexion,
	"SELECT tconsultor.Nombrec AS CONSULTOR, count(DISTINCT(tiempoconsultor.IdCarpeta)) AS CANTIDAD_CARPETAS, SEC_TO_TIME(SUM(TIME_TO_SEC(diff))) AS TIEMPO_TOTAL FROM tiempoconsultor INNER JOIN tconsultor ON tconsultor.IdConsultor=tiempoconsultor.consultor GROUP BY tiempoconsultor.consultor;");
	while($fila=mysqli_fetch_array($query))
    {
  	echo '<tr>';

    echo '<td>'.$fila['CONSULTOR'].'</td>';

    echo '<td>'.$fila['CANTIDAD_CARPETAS'].'</td>';

    echo '<td>'.$fila['TIEMPO_TOTAL'].'</td>';

  	echo '</tr>';

	}
	echo '</table>';

	echo "<a href='javascript:document.location.reload();'><img src='img/f9.png'></a>";
	echo '<a href="?pagina=l_carpeta_alert">Regresar </a>';
	echo '<a href="?pagina=logout">Cerrar Sesión</a>';
?>
