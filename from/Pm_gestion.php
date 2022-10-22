<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 170px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>

<script>
    function timeI() {
        var today = new Date()
        var horas = today.getHours()
        var minutos = today.getUTCMinutes()
        var segundos = today.getUTCSeconds()
        document.cookie = "final="+horas+":"+minutos+":"+segundos;
    }
</script>

<?php 
include("funciones.php");

// *GESTION CONSULTOR
if(isset($_GET["Editar_Consultor"])){
	echo "<br><h2>Gestión Consultor</h2>";
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Consultor">';
	echo '<br>';
	echo '<table>';

	echo "<tr>";
		echo "<td>";
		echo '<h3>IdConsultor</h3><input type="text" name="IdConsultor" id="IdConsultor" value="'.$_GET['IdConsultor'].'"><br>';
		echo "</td>";
		echo "<td>";
			$usuario=mysqli_query($conexion,"SELECT * 
							  FROM tconsultor c
							  INNER JOIN tusuario u on u.IdUsuario=c.IdUsuario 
							  WHERE c.IdConsultor='".$_GET['IdConsultor']."'");
			while ($fila2=mysqli_fetch_array($usuario))
			{ 
			echo '<h3>Supervisor</h3><select name=IdUsuario id=IdUsuario>';
			echo "<option value=".$fila2['IdUsuario'].">".$fila2['Usuario']." ".$fila2['ApellidoP']." ".$fila2['ApellidoM']."</option>\n"; 		
			echo "</select><br>";
			echo "</td>";
			echo "<td>";
			echo '<h3>Nombre</h3><input type="text"  name="Nombrec" value="'.$fila2['Nombrec'].'" /><br/>';	
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo '<h3>Apellidos Paterno</h3><input type="text"  name="ApellidoCP" value="'.$fila2['ApellidoCP'].'" /><br/>';
			echo "</td>";
			echo "<td>";
			echo '<h3>Apellidos Materno</h3><input type="text"  name="ApellidoCM" value="'.$fila2['ApellidoCM'].'" /><br/>';
			echo "</td>";
			echo "<td>";
			echo '<h3>Dni</h3><input type="text"  name="Dni" value="'.$fila2['Dni'].'" /><br/>';
			echo "</td>";
		
		echo "</tr>";
		echo '</table>';
		
		}
	echo "</br>"; 
	echo '<input type="submit" id="Editar" name="Editar" value="Guardar"/>';
	echo '<input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>';
echo '</form>';
}

// *GESTION Usuario
if(isset($_GET["Editar_Usuario"])){
	echo "<br><h2>Gestión Usuario</h2>";
	echo '<form name="datos" id="datos" method="post" action="?pagina=CRUD_Usuario">';
	echo '<br>';
	echo '<table>';

	echo "<tr>";
			echo "<td>";
			$usuario=mysqli_query($conexion,"SELECT * 
							  FROM tusuario
							  WHERE IdUsuario='".$_GET['IdUsuario']."'");
			while ($fila2=mysqli_fetch_array($usuario))
			{ 
			echo "<h3>Usuario</h3>";
			echo '<input type="text"  maxlength="8" id="Usuario" name="Usuario" value="'.$fila2['Usuario'].'"/><br/>';
			echo "</td>";

			echo "<td><h3>Apellido Paterno</h3>";
			echo '<input type="text"  name="ApellidoP" maxlength="9" value="'.$fila2['ApellidoP'].'"/><br/>';
			echo "</td>";
			echo '<td><h3>Apellido Materno</h3><input type="text"  name="ApellidoM" value="'.$fila2['ApellidoM'].'" />';
			echo "</td>";
	echo "</tr>";

	echo "<tr>";	
			echo "<td>";
			echo '<h3>IdUsuario</h3><input type="text" name="IdUsuario" id="IdUsuario" value="'.$_GET['IdUsuario'].'"><br>';
			echo "</td>";
			echo '<td><h3>Clave</h3><input type="password"  name="Clave" value="'.$fila2['Clave'].'"/>';
			echo "</td>";
			echo "<td><h3>Nivel</h3>";
			echo "<select name='Nivel' id='Nivel'>";
			echo "<option value='".$fila2['Nivel']."'>".$fila2['Nivel']."</option>";
			echo "<option value='editor'>editor</option>";
			echo "<option value='administrador'>administrador</option>";
			echo "</select>";
			echo "</td>";
		
	echo "</tr>";
		echo '</table>';
		
		}
	echo "</br>"; 
	echo '<input type="submit" id="Editar" name="Editar" value="Guardar"/>';
	echo '<input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>';
echo '</form>';
}
if (isset($_GET["Editar_Carpeta"])) {
	echo '<form name="datos" id="datos" method="post" action="?pagina=Pl_CRUD_Carpeta">';
	echo '<br>';
	echo '<table>';
		echo "<tr>";
	echo "</tr>";
	echo '<tr>';
	echo '<td colspan="10" style="text-align: center; font-weight: bold; color: #fff; background-color: #fe6467;
		font-size:15px;">GESTIÓN DE CARPETAS</td>';
	echo '</tr>';

	echo '<tr>';
	
	echo '<td><h4>Dealer</h4>';
	echo '<input type="text" name="Dealer"  readonly="readonly" value="CYSCOM" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>';
	
	echo '<td><h4>Gerente</h4>';
	echo '<input type="text" name="Gerente" readonly="readonly" value="Fernando Vasquez"></td>';
	$query=mysqli_query($conexion,"SELECT * from tcarpeta ca 
						INNER JOIN tconsultor c on c.IdConsultor=ca.IdConsultor
						INNER JOIN tusuario u on u.IdUsuario=c.IdUsuario
						WHERE ca.IdCarpeta='".$_GET['IdCarpeta']."'");
	while($fila=mysqli_fetch_array($query)) 
	{
	echo '<td><h4>Supervisor</h4>';

	echo '<input type="text" name="IdUsuario" readonly="readonly" value="'.$fila['Usuario']." ".$fila['ApellidoP'].'"></td>';

	echo '<td><h4>Consultor</h4>';
	echo '<select name=IdConsultor id=IdConsultor style="width:100%;height:30px;border-radius:3px;">'; 
	echo "<option value=".$fila['IdConsultor'].">".$fila['Nombrec']." ".$fila['ApellidoCP']."</option>\n"; 
	$result=mysqli_query($conexion,"SELECT * FROM tusuario u 
							INNER JOIN tconsultor c on c.IdUsuario=u.IdUsuario
						    WHERE u.Usuario='".$_SESSION['username']."' AND c.IdConsultor!='".$fila['IdConsultor']."'");
	while ($row=mysqli_fetch_array($result)) 
	{ 
	echo "<option value=".$row['IdConsultor'].">".$row['Nombrec']." ".$row['ApellidoCP']."</option>\n"; 
	} 	
	echo "</select> ";
	echo '</td>';

	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="2"><h4>Razón Social</h4>';
	echo '<input type="text" name="Empresa" maxlength="50" value="'.$fila['Empresa'].'"></td>';
	
	echo '<td><h4>RUC</h4>';
	echo '<input type="text" name="Ruc" maxlength="11" value="'.$fila['Ruc'].'"></td>';

	echo '<td><h4>Renta básica</h4>';
	echo '<input type="text" name="RentaBasica" value="'.$fila['RentaBasica'].'" maxlength="28"></td>';

	echo '</tr>';

	echo '<tr>';

	echo '<td><h4>Porta</h4>';
	echo '<select name="Porta" style="width:100px;height:30px;border-radius:3px;" >';
	echo "<option>".$fila['Porta']."</option>";
	echo '<option value="Si">Si</option>';
	echo '<option value="No">No</option>';
	echo '</select>';

	echo '<h4>Operador</h4>';
	echo '<select name="Operador" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Operador']."</option>";
	echo '<option value="Claro">Claro</option>';
	echo '<option value="Movistar">Movistar</option>';
	echo '<option value="Bitel">Bitel</option>';
	echo '<option value="Alta">Alta</option>';
	echo '</select>';
	
	echo '<h4>Unidades</h4>';
	echo '<select name="Unidades" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Unidades']."</option>";
	for ($i=1; $i <180 ; $i++) { 
	echo '<option>'.$i.'</option>';
	}
	echo '</select></td>';

	echo '<td><h4>Pack/Chip</h4>';
	echo '<select name="Pack" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Pack']."</option>";
	echo '<option>Pack/Chip</option>';
	echo '<option>Pack</option>';
	echo '<option>Chip</option>';
	echo '</select>';
	
	echo '<h4>Voz/Bam</h4>';
	echo '<select name="Voz" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Voz']."</option>";
	echo '<option>Voz</option>';
	echo '<option>Bam</option>';
	echo '<option>Bafi</option>';
	echo '</select>';

	echo '<h4>Estado</h4>';
	echo '<select name="Estado" style="width:100px;height:30px;border-radius:3px;">';
	echo "<option>".$fila['Estado']."</option>";
	for ($i=0; $i <6 ; $i++) { 
	echo '<option>'.$i.'</option>';
	}
	echo '</select></td>';

	echo '<td><h4>Fecha Inicio</h4>';
	echo '<input type="text" name="FechaInicio" readonly="readonly" value="'.$fila['FechaInicio'].'">';
	echo '<h4>Fecha Tentativa Cierre</h4>';
	echo '<input type="text" name="FechaCierre" id="FechaCierre" value="'.$fila['FechaCierre'].'">';
    echo '<b>CPyme </b>';
	echo '<select name="CPyme" style="width:100px;height:30px;border-radius:3px;" >';
	echo "<option>".$fila['CPyme']."</option>";
	echo '<option value=" "> </option>';
	echo '<option value="Si">Si</option>';
	echo '</select>';
	echo '<b>CPyme+ </b>';
	echo '<select name="CPymeP" style="width:100px;height:30px;border-radius:3px;" >';
	echo "<option>".$fila['CPymeP']."</option>";
	echo '<option value=" "> </option>';
	echo '<option value="Si">Si</option>';
	echo '</select></td>';
	echo '<td><h4>Observación</h4>';
	echo '<textarea rows="4" cols="25" maxlength="90" name="Observacion" id="Observacion">'.$fila['Observacion'].'</textarea>';
	echo '<input type="text" name="IdCarpeta" id="IdCarpeta" style="visibility:hidden" readonly="readonly" value="'.$_GET['IdCarpeta'].'"><br>';
	echo "</td>";
	echo '</tr>';
	}

	echo '</table>';

	echo "</br>"; 
	echo '<input type="submit" style="margin-left:50px;" onclick="timeI()" id="guardar_salir" name="guardar_salir" value="Guardar y Salir"/><br><br>';
	echo "<table border='1' style='width:300px;'>";
	echo "<tr>";
	    echo "<td style='background:#f9f96a; color:#333'>Estado</td>";
	    echo "<td style='background:#f9f96a; color:#333'>Constenido</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>0</td>";
	    echo "<td>La cuenta no va.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>1</td>";
	    echo "<td>La empresa dio si verbal.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>2</td>";
	    echo "<td>Falta definir propuesta.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>3</td>";
	    echo "<td>Propuesta presentada.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>4</td>";
	    echo "<td>Empresa contactada.</td>";
	echo "</tr>";
	echo "<tr>";
	    echo "<td>5</td>";
	    echo "<td>Empresa cerrada.</td>";
	echo "</tr>";
		echo "<tr>";
	    echo "<td></td>";
	    echo "<td></td>";
	echo "</tr>";
	echo "</table>";
	echo '</form>';
}
?>