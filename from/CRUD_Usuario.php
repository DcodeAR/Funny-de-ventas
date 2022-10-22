<?php 
include("funciones.php");
if (isset($_POST["guardar"])) 
{
	$Usuario=$_POST['Usuario'];
	$ApellidoP=$_POST['ApellidoP'];	
	$ApellidoM=$_POST['ApellidoM'];	
	$Clave=$_POST['Clave'];	
	$Nivel=$_POST['Nivel'];
	$Mail=$_POST['Mail'];
	$usuario=mysqli_query($conexion,"SELECT Usuario FROM tusuario
						  WHERE Usuario='".htmlentities($Usuario)."'");		
	$nmiusario=mysqli_num_rows($usuario);
	if ($nmiusario!=0) {
		echo "<script>alert('El usuario ya existe')</script>";
		header("location:?pagina=l_usuario");
	}	
	else
	{			
		$query="INSERT INTO tusuario VALUES('','$Usuario','$ApellidoP','$ApellidoM','$Clave','$Nivel','','','$Mail')";
		$result=mysqli_query($conexion,$query) or die(" Error ejecutar la instruccion SQL".
		mysqli_error());
		mysqli_close();
		header("location:?pagina=l_usuario");
	}
}

if (isset($_GET['Eliminar'])) 
{
	$IdUsuario=$_GET['IdUsuario'];
	$usuario=mysqli_query($conexion,"DELETE FROM tusuario
						  WHERE IdUsuario='".htmlentities($IdUsuario)."'");	
	header("location:?pagina=l_usuario");

}
if(isset($_POST['Editar']))
{
	$IdUsuario=$_POST['IdUsuario'];
	$Usuario=$_POST['Usuario'];	
	$ApellidoP=$_POST['ApellidoP'];
	$ApellidoM=$_POST['ApellidoM'];
	$Clave=$_POST['Clave'];
	$Nivel=$_POST['Nivel'];	
	$Mail=$_POST['Mail'];
	$query ="UPDATE tusuario SET IdUsuario='".$IdUsuario."',Usuario='".$Usuario."',ApellidoP='".$ApellidoP."',ApellidoM='".$ApellidoM."',Clave='".$Clave."',Nivel='".$Nivel."',Mail='".$Mail."' WHERE IdUsuario='".$IdUsuario."'";
	$result=mysqli_query($conexion,$query) or die("Error: ".mysql_error());
	mysqli_close();
	header("location:?pagina=l_usuario");
}

if(isset($_POST['Cancelar']))
{
	header("location:?pagina=l_usuario");
}

if (isset($_POST['cerrar'])) 
{   
	session_destroy();
	echo "Sesion Cerrada";
	header ("Location:index.php");
}
?>