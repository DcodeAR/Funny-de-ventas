<?php

$host_db="localhost";
$user_db="root";
$pass_db="";
$db_name="cinparco_bdcinpar";
$tbl_name="tusuario";
$tbl_name2="tconsultor";

$conexion=new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {

 die("La conexion falló: ".$conexion->connect_error);

}

$username = $_POST['username'];

$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE Usuario = '$username'";
$sql2 = "SELECT * FROM $tbl_name2 WHERE Nombrec = '$username'";

$result = $conexion->query($sql);
$result2 = $conexion->query($sql2);

if ($result->num_rows > 0) {  

 }

 $row = $result->fetch_array(MYSQLI_ASSOC);
 $row2 = $result2->fetch_array(MYSQLI_ASSOC);

 if ($password==$row['Clave'] && $row['Nivel']=='editor') { 

    $_SESSION['loggedin'] =true;

    $_SESSION['username'] = $username;

    $_SESSION['XD'] = $row['IdUsuario'];

    $_SESSION['start'] =time();

    $_SESSION['expire'] =$_SESSION['start'] + (60*60);
    
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"hu_HU.UTF8");
    $dia=strftime("%Y/%m/%d %X");
    $quer="UPDATE tusuario SET Sesion='".$dia."',Uso='".$_SESSION['contador']."' WHERE Usuario='".$_SESSION['username']."'";
    $result=mysqli_query($conexion,$quer) or die(" Error ejecutar la instruccion SQL".
    mysqli_error());
    // echo "<br><a style='background-color: #e4e4e4;
    // color: #111213;
    // padding: 6px;
    // font-size: 13px;
    // margin-right: 5px;
    // border-radius: 4px;
    // border: 1px solid #403f3f2b;' href=?pagina=Pm_carpeta>Bienvenido: ".$_SESSION['username']."</a><br><br>"; 
    // echo "<img src='img/esa4.png'>";
//     $usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 						WHERE u.Usuario='".$_SESSION['username']."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre<CURDATE() AND u.Usuario<>'Cesados'");
// 	while ($fila2=mysqli_fetch_array($usuario)) 
// 	{
// 	if($fila2['fila']>0)
// 	{
//     echo "<script>alert('Bienvenido: ".$_SESSION['username'].", tienes ".$fila2['fila']." Carpetas Vencidas');
// 			   window.location.href='?pagina=Pm_carpeta';
// 			  </script>";
// 	}
// 	else{
// 	 echo "<script>alert('Felicidades: No tienes Carpetas Vencidas');
// 			   window.location.href='?pagina=Pm_carpeta';
// 			  </script>";   
// 	}
// 	}
 echo "<script>
			   window.location.href='?pagina=Pm_carpeta_alerta';
			  </script>";

 }

 else if ($password==$row['Clave'] && $row['Nivel']=='administrador') {

    $_SESSION['loggedin']= true;

    $_SESSION['username']= $username;
    

    $_SESSION['start']=time();

    $_SESSION['expire']=$_SESSION['start']+(60*60);
    
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"hu_HU.UTF8");
    $dia=strftime("%Y/%m/%d %X");
    $quer="UPDATE tusuario SET Sesion='".$dia."',Uso='".$_SESSION['contador']."' WHERE Usuario='".$_SESSION['username']."'";
    $result=mysqli_query($conexion,$quer) or die(" Error ejecutar la instruccion SQL".
    mysqli_error());
    // echo "<br><a style='background-color: #e4e4e4;
    // color: #111213;
    // padding: 6px;
    // font-size: 13px;
    // margin-right: 5px;
    // border-radius: 4px;
    // border: 1px solid #403f3f2b;' href=?pagina=l_carpeta>Bienvenido: ".$_SESSION['username']."</a><br><br>"; 
    // echo "<img src='img/esa4.png'>";
    //ALERT
     echo "<script>
			   window.location.href='?pagina=l_carpeta_alert';
			  </script>";

 } 
else if ($password==$row2['Dni']) {

    $_SESSION['loggedin']= true;

    $_SESSION['username']= $username;

    $_SESSION['username']= $username;

    $_SESSION['start']=time();

    $_SESSION['expire']=$_SESSION['start']+(60*60);
    
    date_default_timezone_set("America/Lima");
    setlocale(LC_ALL,"hu_HU.UTF8");
    $dia=strftime("%Y/%m/%d %X");
    $quer2="UPDATE tconsultor SET Sesiones='".$dia."',Clic='".$_SESSION['contador']."' WHERE Nombrec='".$_SESSION['username']."'";
    $result2=mysqli_query($conexion,$quer2) or die(" Error ejecutar la instruccion SQL".mysqli_error());

    // echo "<br><a style='background-color: #e4e4e4;
    // color: #111213;
    // padding: 6px;
    // font-size: 13px;
    // margin-right: 5px;
    // border-radius: 4px;
    // border: 1px solid #403f3f2b;' href=?pagina=Cl_carpeta>Bienvenido: ".$_SESSION['username']."</a><br><br>"; 
    // echo "<img src='img/esa4.png'>";
//     $usuario=mysqli_query($conexion,"SELECT COUNT(ca.IdCarpeta) as fila
// 						FROM tcarpeta ca 
// 						inner join tconsultor c on c.IdConsultor=ca.IdConsultor 
// 						inner join tusuario u on u.IdUsuario=c.IdUsuario
// 						WHERE c.Nombrec='".$_SESSION['username']."' AND ca.Estado NOT IN ('0','5') AND ca.FechaCierre<CURDATE() AND u.Usuario<>'Cesados'");
// 	while ($fila2=mysqli_fetch_array($usuario)) 
// 	{
// 	if($fila2['fila']>0)
// 	{
//     echo "<script>alert('Bienvenido: ".$_SESSION['username'].", tienes ".$fila2['fila']." Carpetas Vencidas');
// 			   window.location.href='?pagina=Cm_carpeta';
// 			  </script>";
// 	}
// 	else{
// 	 echo "<script>alert('Felicidades: No tienes Carpetas Vencidas');
// 			   window.location.href='?pagina=Cm_carpeta';
// 			  </script>";   
// 	}
// 	}
  echo "<script>
			   window.location.href='?pagina=Cm_carpeta_alerta';
			  </script>";
 } 
 else { 

   echo "Username o Password estan incorrectos.";
   echo "<br>";
   echo "<br><a href='http://localhost/cyscomruc'>Volver a Intentarlo</a>";

 }

 mysqli_close($conexion); 

 ?>