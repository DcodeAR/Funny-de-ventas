<?php
$conexion=mysqli_connect("localhost","root","");
if (!$conexion){
	die('No se ha podido realizar la conexion a la base de datos'.mysql_error());
}
mysqli_select_db($conexion,"cinparco_bdcinpar");
?>

<?php

// session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {

   echo "Esta pagina es solo para usuarios registrados.<br>";

   echo "<br><a href='http://localhost/cyscomruc/'>Login</a>";

exit;

}

$now = time();

if($now > $_SESSION['expire']) {

session_destroy();

echo "Su sesion a terminado,

<a href='http://localhost/cyscomruc/'>Necesita Hacer Login</a>";
exit;
}
?>