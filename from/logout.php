<?php
include("funciones.php");
date_default_timezone_set("America/Lima");
setlocale(LC_ALL,"hu_HU.UTF8");
$dia=strftime("%Y/%m/%d %X");
$quer="UPDATE tusuario SET Sesion='".$dia."',Uso='".$_SESSION['contador']."' WHERE Usuario='".$_SESSION['username']."'";
$result=mysqli_query($conexion,$quer) or die(" Error ejecutar la instruccion SQL".
mysqli_error());
$quer2="UPDATE tconsultor SET Sesiones='".$dia."',Clic='".$_SESSION['contador']."' WHERE Nombrec='".$_SESSION['username']."'";
    $result2=mysqli_query($conexion,$quer2) or die(" Error ejecutar la instruccion SQL".mysqli_error());
mysqli_close();

session_start();
	
unset ($SESSION['username']);

session_destroy();

header('Location: http://localhost/cyscomruc');

mysqli_close();

?>