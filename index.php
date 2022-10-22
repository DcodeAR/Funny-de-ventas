<?php include("from/cabeza.php");?>
<?php 
	if(isset($_GET['pagina']))//Si la pagina no esta vacia, obtener el id de pagina
	{
		$url=$_GET['pagina'];
	}
	else//Si la pagina esta vacio o es inicializada por primera vez, poner que el
	//url empiece con la pagina inicio
	{
		$url="cuerpo";
	}
	
	include ("from/".$url.".php"); 
?>
<?php include("from/pie.php");