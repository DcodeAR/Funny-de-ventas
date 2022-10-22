<?php 
include("funciones.php");
if (isset($_POST["guardar"])) 
{
	$IdUsuario=$_POST['IdUsuario'];
	$Nombrec=$_POST['Nombrec'];	
	$ApellidoCP=$_POST['ApellidoCP'];	
	$ApellidoCM=$_POST['ApellidoCM'];	
	$Dni=$_POST['Dni'];
	$Correo=$_POST['Correo'];
	$usuario=mysqli_query($conexion,"SELECT Dni FROM tconsultor
						  WHERE Dni='".htmlentities($Dni)."'");
	$nmiusario=mysqli_num_rows($usuario);
	if ($nmiusario!=0) {
		echo "<script>alert('El consultor ya existe')</script>";
		header("location:?pagina=l_consultor");
	}	
	else
	{			
		$query="INSERT INTO tconsultor VALUES('','$IdUsuario','$Nombrec','$ApellidoCP','$ApellidoCM','$Dni','','','$Correo')";
		$result=mysqli_query($conexion,$query) or die(" Error ejecutar la instruccion SQL");
		// mysql_close();
		header("location:?pagina=l_consultor");
	}
}

if (isset($_POST["buscar"])){ 
    include("menuadmi.php");
	$Nombrec=$_POST['Nombrec'];
	echo "<br>";
	echo '<form name="datos" id="datos" method="post">';
	echo '<table>';
	echo '<td colspan="10" style="text-align: center; font-weight: bold; color: #fff; background-color: #fe6467;
		font-size:15px;">Buscar Consultor</td>';
	echo '</table>';
	echo '<table class="tabla">';
	echo "<th>Nº</th>";
	echo "<th>Supervisor</th>";
	echo "<th>Consultor</th>";
	echo "<th>Dni</th>";
	echo "<th colspan='2'>Acción</th>";
	$usuario=mysqli_query($conexion,"SELECT c.IdConsultor,u.IdUsuario,u.Usuario,u.ApellidoP,c.Nombrec,c.ApellidoCP,c.ApellidoCM,c.Dni
	    FROM tusuario u 
		inner join tconsultor c on u.IdUsuario=c.IdUsuario 
		WHERE c.Nombrec LIKE '%".$Nombrec."%'");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody >"
		."<tr>"
		."<td>".$fila2['IdConsultor']."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']." ".$fila2['ApellidoCM']."</td>"
		."<td>".$fila2['Dni']."</td>"		
		."<td><a href=?pagina=m_gestion&IdConsultor=".$fila2['IdConsultor']."&Editar_Consultor=Editar_Consultor><img src='img/editar.png'></img></a></td>"
		."<td><a href=?pagina=CRUD_Consultor&IdConsultor=".$fila2['IdConsultor']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
		."</tr>"	
		."</tbody>";	
	}
	echo "</table>";
	echo '<br><br><a href=?pagina=l_consultor>Volver</a>';
	echo '</form>';
}


if (isset($_GET['Eliminar'])) 
{
	$IdConsultor=$_GET['IdConsultor'];
	$usuario=mysqli_query($conexion,"DELETE FROM tconsultor
						  WHERE IdConsultor='".$IdConsultor."'");	
	header("location:?pagina=l_consultor");

}
if(isset($_POST['Editar']))
{
	$IdConsultor=$_POST['IdConsultor'];
	$IdUsuario=$_POST['IdUsuario'];	
	$Nombrec=$_POST['Nombrec'];
	$ApellidoCP=$_POST['ApellidoCP'];
	$ApellidoCM=$_POST['ApellidoCM'];
	$Dni=$_POST['Dni'];	
	$Correo=$_POST['Correo'];	
	$query ="UPDATE tconsultor SET IdUsuario='".$IdUsuario."',Nombrec='".$Nombrec."',ApellidoCP='".$ApellidoCP."',ApellidoCM='".$ApellidoCM."',Dni='".$Dni."',Correo='".$Correo."' WHERE IdConsultor='".$IdConsultor."'";
	$result=mysqli_query($conexion,$query) or die("Error: ".
	mysqli_error());
	mysqli_close();
	header("location:?pagina=l_consultor");
}

if(isset($_POST['Cancelar']))
{
	header("location:?pagina=l_consultor");
}

if (isset($_POST['cerrar'])) 
{
	session_destroy();
	echo "Sesion Cerrada";
	header ("Location:index.php");
}
?>