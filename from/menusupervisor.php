<!--<div id='cssmenu'>-->
<!--<ul id="nav">-->
<!--		   <li><a href="#"><img src="img/usuario.png"><span>php echo "".$_SESSION['username'];?></span></a>-->
<!--		   <li><a href='?pagina=Pl_carpeta'><span>Ingresar Carpeta</span></a></li>-->
<!--		   <li><a href="?pagina=Pm_carpeta"><span>Informe Funnel</span></a></li>-->
<!--		   <li><a href=pdf/R_Estado.php target="_blank"><span>Estado 0</span></a></li>-->
<!--		   <li class="has-sub"><a href="#"><span>REPORTE DE VENTAS</span></a>-->
<!--		    	<ul>-->
<!--		    	 <li><a href="?pagina=l_resumen2"><span>Resumen</span></a></li>-->
<!--		         <li><a href="?pagina=l_diario2"><span>Reporte Diario</span></a></li>-->
<!--		         <li><a href="?pagina=l_ranking2"><span>Raking</span></a></li>-->
<!--		      	</ul>-->
<!--		    </li>	-->
<!--		    <li id="cerrar">-->
<!--			<a  href="?pagina=logout">Cerrar Sesión</a>-->
<!--			</li>		-->

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
    font-size: 14px;" href="#"><img src="img/usuario.png"><?php echo "". $_SESSION['username']; ?></a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" onclick="timeI()" href="?pagina=Pl_carpeta">Nueva Carpeta</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=Pm_carpeta">Funnel</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=l_resumen2">Avance y Ranking</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=l_diario2">Reporte Diario</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href=pdf/R_Estado.php target="_blank">Estado</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=logout">Salir</a>
</div><br>