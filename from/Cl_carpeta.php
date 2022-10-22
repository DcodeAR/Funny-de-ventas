<script>
    function timeF() {
        var today = new Date()
        var horas = today.getHours()
        var minutos = today.getUTCMinutes()
		var segundos = today.getUTCSeconds()
        document.cookie = "final="+horas+":"+minutos+":"+segundos;
    }
</script>

<?php 
include("funciones.php");
include("menuconsultor.php");

date_default_timezone_set("America/Lima");
setlocale(LC_ALL,"hu_HU.UTF8");
$dia=strftime("%Y/%m/%d");
			
	echo '<form name="datos" id="datos" method="post" action="?pagina=Pl_CRUD_Carpeta">';
	echo "<br>";
	echo '<table class="tabla">';
	echo "<tr>";
	echo "</tr>";
	echo '<tr>';
	echo '<td colspan="10" style="text-align: center; font-weight: bold; color: #fff; background-color: #fe6467;
		font-size:15px; padding: 7px;">FORMULARIO DE REGISTRO DE EMPRESAS</td>';
	echo '</tr>';

	echo '<tr>';
	
	echo '<td><h4>Dealer</h4>';
	echo '<input type="text" name="Dealer" maxlength="30"  readonly="readonly" value="CYSCOM" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>';
	
	echo '<td><h4>Gerente</h4>';
	echo '<input type="text" name="Gerente" maxlength="11" readonly="readonly" value="Fernando Vasquez"></td>';
	$query=mysqli_query($conexion,"SELECT * from tusuario u 
	        INNER JOIN tconsultor c ON c.IdUsuario=u.IdUsuario WHERE Nombrec='".$_SESSION['username']."'");
	while($fila=mysqli_fetch_array($query)) 
	{
	echo '<td><h4>Supervisor</h4>';
	echo '<input type="text" name="Supervisor" maxlength="11" readonly="readonly" value="'.$fila['Usuario']." ".$fila['ApellidoP'].'"></td>';
	}
	echo '<td><h4>Consultor</h4>';
	echo '<select name="Consultor" id="Consultor" style="width:100%;height:30px;border-radius:3px;">'; 
	$result=mysqli_query($conexion,"SELECT * from tconsultor
							WHERE Nombrec='".$_SESSION['username']."'");
	while ($row=mysqli_fetch_array($result)) 
	{ 
	echo "<option value=".$row['IdConsultor'].">".$row['Nombrec']." ".$row['ApellidoCP']."</option>\n"; 
	} 	
	echo "</select> ";
	echo '</td>';

	echo '</tr>';
	echo '<tr>';
	echo '<td colspan="2"><h4>Razón Social</h4>';
	echo '<input type="text" name="Empresa" maxlength="50" placeholder="Ingrese Empresa"></td>';
	
	echo '<td><h4>RUC</h4>';
	echo '<input type="text" name="Ruc" maxlength="11" placeholder="Ingrese RUC"></td>';

	echo '<td><h4>Renta básica</h4>';
	echo '<input type="text" name="RentaBasica" placeholder="Ingrese RentaB" maxlength="28"></td>';

	echo '</tr>';

	echo '<tr>';

	echo '<td><h4>Porta</h4>';
	echo '<select name="Porta" style="width:100px;height:30px;border-radius:3px;" >';
	echo '<option>Si</option>';
	echo '<option>No</option>';
	echo '</select>';

	echo '<h4>Operador</h4>';
	echo '<select name="Operador" style="width:100px;height:30px;border-radius:3px;">';
	echo '<option>Claro</option>';
	echo '<option>Movistar</option>';
	echo '<option>Bitel</option>';
	echo '<option>Alta</option>';
	echo '</select>';
	
	echo '<h4>Unidades</h4>';
	echo '<select name="Unidades" style="width:100px;height:30px;border-radius:3px;">';
	for ($i=1; $i <180 ; $i++) { 
	echo '<option>'.$i.'</option>';
	}
	echo '</select></td>';

	echo '<td><h4>Pack/Chip</h4>';
	echo '<select name="Pack" style="width:100px;height:30px;border-radius:3px;">';
	echo '<option>Pack/Chip</option>';
	echo '<option>Pack</option>';
	echo '<option>Chip</option>';
	echo '</select>';
	
	echo '<h4>Voz/Bam</h4>';
	echo '<select name="Voz" style="width:100px;height:30px;border-radius:3px;">';
	echo '<option>Voz</option>';
	echo '<option>Bam</option>';
	echo '<option>Bafi</option>';
	echo '<option>M2M</option>';
	echo '</select>';

	echo '<h4>Estado</h4>';
	echo '<select name="Estado" style="width:100px;height:30px;border-radius:3px;">';
	for ($i=0; $i <6 ; $i++) { 
	echo '<option>'.$i.'</option>';
	}
	echo '</select></td>';

	echo '<td><h4>Fecha Inicio</h4>';
	echo '<input type="text" name="FechaInicio" readonly="readonly" value="'.$dia.'">';
	echo '<h4>Fecha Tentativa Cierre</h4>';
	echo '<input type="text" name="FechaCierre" id="FechaCierre" value="'.$dia.'">';
    echo '<b>CPyme </b>';
	echo '<select name="CPyme" style="width:100px;height:30px;border-radius:3px;" >';
	echo '<option value=" "> </option>';
	echo '<option value="Si">Si</option>';
	echo '</select>';
	echo '<b>CPyme+ </b>';
	echo '<select name="CPymeP" style="width:100px;height:30px;border-radius:3px;" >';
	echo '<option value=" "> </option>';
	echo '<option value="Si">Si</option>';
	echo '</select></td>';
	echo '<td><h4>Observación</h4>';
	echo '<textarea rows="4" cols="25" name="Observacion" maxlength="28" placeholder="Ingrese  las observaciones"></textarea>';
	echo '</td>';

	echo '</tr>';

	echo "<tr>";
	echo '<td colspan="20"><input type="submit" onclick="timeF()" id="guardas" name="guardas" style="margin-left:10px; margin-top:10px" value="Guardar"/><br/></td>';
	echo "</tr>";

	echo "</table><br>";
	echo "<table border='1' style='width:300px;'>";
	echo "<tr>";
	    echo "<td style='background:#f9f96a; color:#333'>Estado</td>";
	    echo "<td style='background:#f9f96a; color:#333'>Contenido</td>";
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
	
	// echo '<a  href="?pagina=logout" style="margin-left:120px;">Cerrar Sesion</a>';
	echo '</form><br>';
?>