<?php 
include("funciones.php");
if (isset($_POST['guardar'])) 
{   
    $Empresa=ucwords($_POST['Empresa']);
	$Empresa=ucwords(strtolower($Empresa));
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
	$nmiusario=0;
	$sql=mysqli_query($conexion,"SELECT * FROM tconsultor c
					inner join tusuario u on u.IdUsuario=c.IdUsuario
					WHERE u.Usuario='".$_SESSION['username']."'");
	while ($row=mysqli_fetch_array($sql)) 
	{
	$usuario=mysqli_query($conexion,"SELECT * FROM  tcarpeta ca inner join tconsultor c on c.IdConsultor=ca.IdConsultor
		WHERE ca.Ruc='".$Ruc."'");

	$nmiusario=mysqli_num_rows($usuario);

	if ($nmiusario!=0) {
		echo "<script>alert('Empresa ya registrada');
			  window.location.href='?pagina=l_carpeta';
			  </script>";
	}
	else
	{
		$query="INSERT INTO tcarpeta VALUES('','".$row['IdConsultor']."','$Dealer','$Gerente','$Empresa','$Ruc','$Porta',
			  '$Operador','$Unidades','$RentaBasica','$Pack','$Voz','$Estado','$FechaInicio','$FechaCierre','$Observacion','$CPyme','$CPymeP')";
		$result=mysqli_query($conexion,$query) or die(" Error ejecutar la instruccion SQL");

		echo "<script>alert('Registro Guardado');
			   window.location.href='?pagina=l_carpeta';
			  </script>";
	}
	$nmiusario++;
	}
}

if (isset($_POST['guardar2'])) 
{ 
    $Empresa=ucwords($_POST['Empresa']);
	$Empresa=ucwords(strtolower($Empresa));
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
	$nmiusario=0;
	$sql=mysqli_query($conexion,"SELECT * FROM tconsultor c
					inner join tusuario u on u.IdUsuario=c.IdUsuario
					WHERE u.Usuario='".$_SESSION['username']."'");
	while ($row=mysqli_fetch_array($sql)) 
	{
	$usuario=mysqli_query($conexion,"SELECT * FROM  tcarpeta ca inner join tconsultor c on c.IdConsultor=ca.IdConsultor
		WHERE ca.Ruc='".$Ruc."'");

	$nmiusario=mysqli_num_rows($usuario);

	if ($nmiusario!=0) {
		echo "<script>alert('Empresa ya registrada');
			  window.location.href='?pagina=Pm_carpeta';
			  </script>";
	}
	else
	{
		$query="INSERT INTO tcarpeta VALUES('','".$row['IdConsultor']."','$Dealer','$Gerente','$Empresa','$Ruc','$Porta',
			  '$Operador','$Unidades','$RentaBasica','$Pack','$Voz','$Estado','$FechaInicio','$FechaCierre','$Observacion','$CPyme','$CPymeP')";
		$result=mysqli_query($conexion,$query) or die(" Error ejecutar la instruccion SQL");

		echo "<script>alert('Registro Guardado');
			   window.location.href='?pagina=Pm_carpeta';
			  </script>";
	}
	$nmiusario++;
	}
}

if (isset($_GET['Eliminar'])) 
{
	echo "Hola";
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
	$result=mysqli_query($conexion,$query) or die("Error: ");
	header("location:?pagina=Pm_carpeta");
}

if(isset($_POST['Edito']))
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
	$result=mysqli_query($conexion,$query) or die("Error: ");
	header("location:?pagina=Pm_carpeta");
}

if(isset($_POST['Cancelar']))
{
	header("location:?pagina=l_carpeta");
}
if(isset($_POST['Cancelar2']))
{
	header("location:?pagina=Pm_carpeta");
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
			     FechaCierre='".$FechaCierre."',Observacion='".$Observacion."',CPyme='".$CPyme."',CPymeP='".$CPymeP."' WHERE IdCarpeta='".$IdCarpeta."'";
	$result=mysqli_query($conexion,$query) or die("Error: ");
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

if (isset($_GET["Enviar"])){ 

    $IdCarpeta=$_GET['IdCarpeta'];
    $sql=mysqli_query($conexion,"SELECT DATEDIFF(CURDATE(),ca.FechaInicio) AS dias,u.Mail,ca.Ruc,ca.Empresa,c.Nombrec,ApellidoCP,c.Correo 
                    FROM tcarpeta ca
                    inner join tconsultor c on ca.IdConsultor=c.IdConsultor
					inner join tusuario u on u.IdUsuario=c.IdUsuario
					WHERE ca.IdCarpeta='".$IdCarpeta."'");
	while ($row=mysqli_fetch_array($sql))
	{
	    $mail = "|RUC: ".$row['Ruc']."| Empresa: ".utf8_decode($row['Empresa'])."| Consultor: ".$row['Nombrec']." ".utf8_decode($row['ApellidoCP']);
        //Titulo
        $titulo = "FUNNEL-Carpeta Vencida: ".$row['dias']." dias";
        //cabecera
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        //dirección del remitente 
        $headers .= "From:Help Desk<sistemas@entel-empresas.pe>\r\n";
        //Enviamos el mensaje a tu_dirección_email 
	    $bool = mail($row['@admin@entel-empresas.pe'],$titulo,$mail,$headers);
        if($bool){
            echo "<script>alert(' Enviado');
			   window.location.href='?pagina=l_carpeta';
			  </script>";
        }else{
            echo "<script>alert('Mensaje No Enviado');
			   window.location.href='?pagina=Pm_carpeta';
			  </script>";
        }
	}
}
if (isset($_GET["Envio"])){ 
	$IdCarpeta=$_GET['IdCarpeta'];
	$sql=mysqli_query($conexion,"SELECT DATEDIFF(CURDATE(),ca.FechaInicio) AS dias,u.Mail,ca.Ruc,ca.Empresa,c.Nombrec,ApellidoCP,c.Correo 
					FROM tcarpeta ca
					inner join tconsultor c on ca.IdConsultor=c.IdConsultor
					inner join tusuario u on u.IdUsuario=c.IdUsuario
					WHERE ca.IdCarpeta='".$IdCarpeta."'");
					
	while ($row=mysqli_fetch_array($sql))
	{
		$mail = "|RUC: ".$row['Ruc']."| Empresa: ".utf8_decode($row['Empresa'])."| Consultor: ".$row['Nombrec']." ".utf8_decode($row['ApellidoCP']);
		//Titulo
		$titulo = "FUNNEL-Carpeta Vencida: ".$row['dias']." dias";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//dirección del remitente 
		$headers .= "From:Help Desk<sistemas@entel-empresas.pe>\r\n";
		//Enviamos el mensaje a tu_dirección_email 
		$bool = mail($row['@admin@entel-empresas.pe'],$titulo,$mail,$headers);
		if($bool){
			echo "<script>alert('Registro Validado');
			   window.location.href='?pagina=Pm_carpeta';
			  </script>";
		}else{
			echo "<script>alert('Mensaje No Validado');
			   window.location.href='?pagina=Pm_carpeta';
			  </script>";
		}
	}

	$IdConsultor=$_GET['IdCarpeta'];

	$query2="INSERT INTO tiempovalidacion VALUES(TIMEDIFF('".$_COOKIE["finalValidacion"]."','".$_COOKIE["inicioValidacion"]."'),
	'".$_COOKIE["finalValidacion"]."',
	'".$_COOKIE["inicioValidacion"]."',
	'".$IdConsultor."'
	)";

	$result=mysqli_query($conexion,$query2) or die("Error ejecutar la instruccion SQL");

	header("location:?pagina=Pm_carpeta");
}
?>