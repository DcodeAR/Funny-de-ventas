<?php
include("funciones.php");
include("menuadmi.php");
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Consultor">';
	echo '<br>';
	echo '<table class="tabla">';
	echo '<td colspan="10" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Reporte de acceso</td>';
	echo "<tr>";
	echo "<td><h3>Supervisor</h3>";
	echo "<select name='IdUsuario' id='IdUsuario'>"; 
	$sql="SELECT * FROM tusuario WHERE Nivel='Editor' ORDER BY IdUsuario"; 
	$result=mysqli_query($conexion,$sql);
	while ($row=mysqli_fetch_array($result)) 
	{ 
	echo "<option value=".$row['IdUsuario'].">".$row['Usuario']." ".$row['ApellidoP']." ".$row['ApellidoM']."</option>\n"; 
	} 
	echo "</select> ";
	echo "</td>";

	echo "<td><h3>Dni</h3>";
	echo '<input type="text"  maxlength="8" id="Dni" name="Dni" placeholder=" Ingrese Dni"/><br/>';
	echo "</td>";

	echo "<td><h3>Correo</h3>";
	echo '<input type="text"  name="Correo" placeholder=" Ingrese Correo"/><br/>';
	echo "</td>";
	echo '<td><h3>Acción</h3><input type="submit" id="buscar" name="buscar" value="Buscar"/></td>';
	echo "<td><a href=pdf/R_Consultor.php target='_blank'><img src='img/imprimir.png'></a></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td><h3>Nombre</h3>";
	echo '<input type="text"  name="Nombrec" placeholder=" Ingrese Celular"/><br/>';
	echo "</td>";
	echo "<td><h3>Apellido Paterno</h3><input type='text'  name='ApellidoCP' placeholder=' Ingrese Nombre'/>";
	echo "</td>";
	echo "<td><h3>Apellido Materno</h3><input type='text'  name='ApellidoCM' placeholder=' Ingrese Apellidos'/>";
	echo "</td>";
	echo "<td>";
	echo '<input type="submit" id="guardar" name="guardar" value="Guardar"/>';
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<table class='tabla'>";
	$usuario=mysqli_query($conexion,"SELECT COUNT(c.IdConsultor) as suma,u.Usuario,u.ApellidoP
						FROM  tconsultor c
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    ORDER BY suma");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
	echo '<td colspan="14" style="font-weight: bold;
    color: #0f243e;box-shadow: inset 0px -2px 0px 0px;
    font-size: 15px;">Total de Consultores: '.$fila2['suma'].'c</td>';
	echo '<tr>';
	}
	$usuario=mysqli_query($conexion,"SELECT COUNT(c.IdConsultor) as suma,u.Usuario,u.ApellidoP
						FROM  tconsultor c
						inner join tusuario u on u.IdUsuario=c.IdUsuario
					    GROUP BY u.Usuario ORDER BY suma DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{  	
	    echo '<td><h4>'.$fila2['Usuario'].' '.$fila2['ApellidoP'].'</h4></td>';
	    echo '<td style="text-align: center; font-weight: bold; color: #ff7373; background-color: #5a677738;
		    font-size:15px;">'.$fila2['suma'].'c</td>';
	}
	echo '</tr>';
	echo '</table>';

	mysqli_query($conexion,'set @fila=0');
	$query=mysqli_query($conexion,"SELECT * FROM tusuario WHERE Nivel='editor' AND Usuario<>'Cesados'");
	while($row=mysqli_fetch_array($query)) 
	{   
    	echo '<table border="1" class="tabla">';
    	echo "<tr><td><b>".$row['Usuario']." ".$row['ApellidoP']."</b></td></tr>";
    	echo "<th>IdC</th>";
    	echo "<th>Consultor</th>";
    	echo "<th>Dni</th>";
    	echo "<th>Actividad</th>";
    	echo "<th>Clic</th>";
    	echo "<th>Correo</th>";
    	echo "<th colspan='2'>Acción</th>";
	    $usuario=mysqli_query($conexion,"SELECT *,@fila:= @fila+1  as fila
	    FROM tusuario u 
		inner join tconsultor c on u.IdUsuario=c.IdUsuario 
		WHERE u.Usuario='".$row['Usuario']."' 
		ORDER BY c.Sesiones DESC");
    while ($fila2=mysqli_fetch_array($usuario)) 
	    {
 		echo "<tbody >"
		."<tr>"
		."<td>".$fila2['IdConsultor']."</td>"
		."<td>".$fila2['Nombrec']." ".$fila2['ApellidoCP']." ".$fila2['ApellidoCM']."</td>"
		."<td>".$fila2['Dni']."</td>"		
		."<td>".$fila2['Sesiones']."</td>"	
		."<td>".$fila2['Clic']."</td>"	
		."<td>".$fila2['Correo']."</td>"	
		."<td><a href=?pagina=m_gestion&IdConsultor=".$fila2['IdConsultor']."&Editar_Consultor=Editar_Consultor><img src='img/editar.png'></img></a></td>"
		."<td><a href=?pagina=CRUD_Consultor&IdConsultor=".$fila2['IdConsultor']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
		."</tr>"	
		."</tbody>";	
    	}
    		echo "</table>";
	}
	

	echo '</form>';
?>