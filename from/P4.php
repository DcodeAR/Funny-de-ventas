<?php 
echo "Hola";
include("funciones.php");
if (isset($_POST['guardas'])) 
{
    $Empresa=ucwords($_POST['Empresa']);
	$Empresa=ucwords(strtolower($Empresa));
	$Dealer=$_POST['Dealer'];
	$Gerente=$_POST['Gerente'];
	$Consultor=$_POST['Consultor'];
	$Ruc=$_POST['Ruc'];
	$Porta=$_POST['Porta'];
	$Operador=$_POST['Operador'];
	$Unidades=$_POST['Unidades'];
	$RentaBasica=$_POST['RentaBasica'];
	$Pack=$_POST['Pack'];
	$Voz=$_POST['Voz'];
	$Estado=$_POST['Estado'];
	$FechaInicio=$_POST['FechaInicio'];
	$FechaCierre=$_POST['FechaCierre'];
	$Observacion=$_POST['Observacion'];
	$CPyme=$_POST['CPyme'];
	$CPymeP=$_POST['CPymeP'];
	$nmiusario=0;
	$sql=mysqli_query($conexion,"SELECT * FROM tconsultor c
					inner join tusuario u on u.IdUsuario=c.IdUsuario
					WHERE u.Usuario='".$_SESSION['username']."'");
	while ($row=mysqli_fetch_array($sql)) 
	{
	$usuario=mysqli_query($conexion,"SELECT * FROM  tcarpeta ca
		inner join tconsultor c on c.IdConsultor=ca.IdConsultor
		WHERE ca.Ruc='".$Ruc."'");	
	$nmiusario=mysqli_num_rows($usuario);

	if ($nmiusario!=0) {
		echo "<script>alert('RUC ingresado por otro Supervisor!');
			  window.location.href='?pagina=Cm_carpeta';
			  </script>";
	}

	else
	{
		$query="INSERT INTO tcarpeta VALUES('','".$Consultor."','$Dealer','$Gerente','$Empresa','$Ruc','$Porta',
			  '$Operador','$Unidades','$RentaBasica','$Pack','$Voz','$Estado','$FechaInicio','$FechaCierre','$Observacion','$CPyme','$CPymeP')";
		$result=mysqli_query($conexion,$query) or die(" Error ejecutar la instruccion SQL".
		mysql_error());
		echo "<script>alert('Registro Guardado');
			   window.location.href='?pagina=Cm_carpeta';
			  </script>";
	}
	$nmiusario++;
	}
}
if (isset($_GET['Eliminar'])) 
{
	$IdCarpeta=$_GET['IdCarpeta'];
	$usuario=mysqli_query($conexion,"DELETE FROM tcarpeta
						  WHERE IdCarpeta='".htmlentities($IdCarpeta)."'");	
	header("location:?pagina=l_carpeta");
}
if(isset($_POST['Editar']))
{
    $Empresa=ucwords($_POST['Empresa']);
	$Empresa=ucwords(strtolower($Empresa));
	$IdCarpeta=$_POST['IdCarpeta'];
	$IdConsultor=$_POST['IdConsultor'];
	$Dealer=$_POST['Dealer'];
	$Gerente=$_POST['Gerente'];
	$Ruc=$_POST['Ruc'];
	$Porta=$_POST['Porta'];
	$Operador=$_POST['Operador'];
	$Unidades=$_POST['Unidades'];
	$RentaBasica=$_POST['RentaBasica'];
	$Pack=$_POST['Pack'];
	$Voz=$_POST['Voz'];
	$Estado=$_POST['Estado'];
	$FechaInicio=$_POST['FechaInicio'];
	$FechaCierre=$_POST['FechaCierre'];
	$Observacion=$_POST['Observacion'];
	$CPyme=$_POST['CPyme'];
	$CPymeP=$_POST['CPymeP'];
	$query ="UPDATE tcarpeta 
			 SET IdCarpeta='".$IdCarpeta."',IdConsultor='".$IdConsultor."',Dealer='".$Dealer."',Gerente='".$Gerente."',
			     Empresa='".$Empresa."',Ruc='".$Ruc."',Porta='".$Porta."',Operador='".$Operador."',Unidades='".$Unidades."',
			     RentaBasica='".$RentaBasica."',Pack='".$Pack."',Voz='".$Voz."',Estado='".$Estado."',FechaInicio='".$FechaInicio."',
			     FechaCierre='".$FechaCierre."',Observacion='".$Observacion."',CPyme='".$CPyme."',CPymeP='".$CPymeP."' WHERE IdCarpeta='".$IdCarpeta."'";
	$result=mysqli_query($conexion,$query) or die("Error: ".
	mysqli_error());
	mysqli_close();
	header("location:?pagina=Cm_carpeta");
}

if(isset($_POST['Cancelar']))
{
	header("location:?pagina=Cm_carpeta");
}
if(isset($_POST['guardar_salir']))
{   
    $Empresa=ucwords($_POST['Empresa']);
	$Empresa=ucwords(strtolower($Empresa));
	$IdCarpeta=$_POST['IdCarpeta'];
	$IdConsultor=$_POST['IdConsultor'];
	$Dealer=$_POST['Dealer'];
	$Gerente=$_POST['Gerente'];
	$Ruc=$_POST['Ruc'];
	$Porta=$_POST['Porta'];
	$Operador=$_POST['Operador'];
	$Unidades=$_POST['Unidades'];
	$RentaBasica=$_POST['RentaBasica'];
	$Pack=$_POST['Pack'];
	$Voz=$_POST['Voz'];
	$Estado=$_POST['Estado'];
	$FechaInicio=$_POST['FechaInicio'];
	$FechaCierre=$_POST['FechaCierre'];
	$Observacion=$_POST['Observacion'];
	$CPyme=$_POST['CPyme'];
	$CPymeP=$_POST['CPymeP'];
	$query ="UPDATE tcarpeta 
			 SET IdCarpeta='".$IdCarpeta."',IdConsultor='".$IdConsultor."',Dealer='".$Dealer."',Gerente='".$Gerente."',
			     Empresa='".$Empresa."',Ruc='".$Ruc."',Porta='".$Porta."',Operador='".$Operador."',Unidades='".$Unidades."',
			     RentaBasica='".$RentaBasica."',Pack='".$Pack."',Voz='".$Voz."',Estado='".$Estado."',FechaInicio='".$FechaInicio."',
			     FechaCierre='".$FechaCierre."',Observacion='".$Observacion."',CPyme='".$CPyme."',CPymeP='".$CPymeP."'
			     WHERE IdCarpeta='".$IdCarpeta."'";
	$result=mysqli_query($conexion,$query) or die("Error: ".
	mysqli_error());
	mysqli_close();
	echo "<script type='text/javascript'>"; 
    echo "window.close()"; 
    echo "</script>"; 
    exit(); 
}
if (isset($_POST['cerrar'])) 
{
	session_destroy();
	echo "Sesion Cerrada";
	header ("Location:index.php");
}
?>