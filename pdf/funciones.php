<?php
$conexion=mysqli_connect("localhost","root","");
if (!$conexion){
	die('No se ha podido realizar la conexion a la base de datos'.mysql_error());
}
mysqli_select_db($conexion,"cinparco_bdcinpar");
?>