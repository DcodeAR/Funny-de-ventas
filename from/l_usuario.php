<?php
include("funciones.php");
include("menuadmi.php");
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Usuario">';
	echo '<br>';
	echo '<table class="tabla">';
	echo '<td colspan="10" style="text-align: center; font-weight: bold; color: #fff; background-color: #0f243e;
		font-size:15px;">Gestión Usuario</td>';
	echo "<tr>";

	echo "<td><h3>Usuario</h3>";
	echo '<input type="text"  maxlength="8" id="Usuario" name="Usuario" placeholder=" Ingrese Usuario"/><br/>';
	echo "</td>";

	echo "<td><h3>Apellido Paterno</h3>";
	echo '<input type="text"  name="ApellidoP" maxlength="9" placeholder=" Ingrese Apellido Paterno"/><br/>';
	echo "</td>";
	echo "<td><h3>Apellido Materno</h3><input type='text'  name='ApellidoM' placeholder=' Ingrese Apellido Materno'/>";
	echo "</td>";
	echo "</tr>";

	echo "<tr>";	
	echo "<td><h3>Clave</h3><input type='password'  name='Clave' placeholder=' Ingrese Clave'/>";
	echo "</td>";
	echo "<td><h3>Correo</h3>";
	echo '<input type="text"  name="Mail" placeholder=" Ingrese correo"/><br/>';
	echo "</td>";
	echo "<td><h3>Nivel</h3>";
	echo "<select name='Nivel' id='Nivel'>";
	echo "<option value='editor'>editor</option>";
	echo "<option value='consultor'>consultor</option>";
	echo "<option value='administrador'>administrador</option>";
	echo "</select>";
	echo "</td>";
	echo '<td><h3>Acción</h3><input type="submit" id="guardar" name="guardar" value="Guardar"/></td>';
	echo "</tr>";
	echo "</table>";
	echo '<table border="1" class="tabla">';
	echo "<th>Id</th>";
	echo "<th>Usuario</th>";
	echo "<th>Clave</th>";
	echo "<th>Nivel</th>";
	echo "<th>Correo</th>";
	echo "<th>Sesion</th>";
	echo "<th>Uso</th>";
	echo "<th colspan='2'>Acción</th>";
	$usuario=mysqli_query($conexion,"SELECT Usuario,ApellidoP,ApellidoM,Clave,Nivel,Mail,Sesion,Uso,IdUsuario
	    FROM tusuario 
	    WHERE Usuario<>'admin'
		ORDER BY Sesion DESC");
	while ($fila2=mysqli_fetch_array($usuario)) 
	{
		echo "<tbody >"
		."<tr>"
		."<td>".$fila2['IdUsuario']."</td>"
		."<td>".$fila2['Usuario']." ".$fila2['ApellidoP']." ".$fila2['ApellidoM']."</td>"
		."<td>".sha1($fila2['Clave'])."</td>"
		."<td>".$fila2['Nivel']."</td>"	
		."<td>".$fila2['Mail']."</td>"
		."<td>".$fila2['Sesion']."</td>"	
		."<td>".$fila2['Uso']."</td>"
		."<td><a href=?pagina=m_gestion&IdUsuario=".$fila2['IdUsuario']."&Editar_Usuario=Editar_Usuario><img src='img/editar.png'></img></a></td>"
		."<td><a href=?pagina=CRUD_Usuario&IdUsuario=".$fila2['IdUsuario']."&Eliminar=Eliminar><img src='img/tacho.png'></a></td>"
		."</tr>"	
		."</tbody>";	
	}
	echo "</table>";
	echo '</form>';
?>