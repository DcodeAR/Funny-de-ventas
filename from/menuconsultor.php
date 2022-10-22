<!--<div id='cssmenu'>-->
<!--<ul id="nav">-->
<!--		   <li><a href="#"><img src="img/usuario.png"><span>php echo "".$_SESSION['username'];?></span></a>-->
<!--		   <li><a href='?pagina=Cl_carpeta'><span>Ingresar Carpeta</span></a></li>-->
<!--		   <li><a href="?pagina=Cm_carpeta"><span>Informe Funnel</span></a></li>-->
<!--		   <li><a href=pdf/R_Estado.php target="_blank"><span>Estado 0</span></a></li>-->
<!--		    <li id="cerrar">-->
<!--			<a  href="?pagina=logout">Cerrar Sesión</a>-->
<!--			</li>		-->
<!--			<li><a href='javascript:document.location.reload();'><img src='img/f9.png'></a>-->
<!--			</li>-->
			
<!--	 </ul>-->
<!--</div>-->
<script>
    function timeI() {
        var today = new Date()
        var horas = today.getHours()
        var minutos = today.getUTCMinutes()
        var segundos = today.getUTCSeconds()
        document.cookie = "inicio="+horas+":"+minutos+":"+segundos;
    }
</script>

<div id='cssmenu'>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="#"><img src="img/usuario.png"><?php echo "".$_SESSION['username'];?></a>
     <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" onclick="timeI()" href="?pagina=Cl_carpeta">Nueva Carpeta</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=Cm_carpeta">Funnel</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href=pdf/R_Estado.php target="_blank">Estado 0</a>
    <?php
    $query=mysqli_query($conexion,"SELECT * FROM tconsultor WHERE Nombrec='".$_SESSION['username']."'");
    while($fila=mysqli_fetch_array($query)){
    echo '<a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="javascript:Openb('.$fila['IdConsultor'].')"><img src="img/grafico.png"></a>';
    }
    ?>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=logout">Salir</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href='javascript:document.location.reload();'><img src='img/f9.png'></a>
</div><br>
	