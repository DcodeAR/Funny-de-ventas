<!--<div id='cssmenu'>-->
<!--<ul id="nav">-->
<!-- 		   <li><a href='?pagina=Pl_carpeta'><span>Ingresar Carpeta</span></a></li> -->
<!--		   <li><a href="#"><img src="img/usuario.png"><span>php echo "".$_SESSION['username'];</span></a>-->
<!--		   <li class="has-sub"><a href='?pagina=l_carpeta'><span>Gestionar Carpeta</span></a>-->
<!--		     <ul>-->
		     	 <!--<li class='last'><a href="?pagina=l_usuario"><span>Usuario</span></a></li>-->
<!--		         <li class='last'><a href='?pagina=l_consultor'><span>Consultor</span></a></li>-->
<!--		         <li class='last'><a href='?pagina=l_carpeta'><span></span>Carpeta</a></li>   -->
<!--		     </ul>-->

<!--		   </li>-->
<!--		   <li class="has-sub"><a href="#"><span>REPORTE DE VENTAS</span></a>-->
<!--		    	<ul>-->
<!--		    	 <li><a href="?pagina=l_resumen"><span>Resumen</span></a></li>-->
<!--		         <li><a href="?pagina=l_diario"><span>Reporte Diario</span></a></li>-->
<!--		         <li><a href="?pagina=l_ranking"><span>Raking</span></a></li>-->
<!--		      	</ul>-->
<!--		    </li>-->
<!--		    <li class="has-sub"><a href="#"><span>Compromisos</span></a>-->
<!--		    	<ul>-->
<!--		         <li><a href=pdf/R_Estado.php target="_blank"><span>Estado</span></a></li>-->
<!--		         <li><a href=pdf/R_CPyme.php target="_blank"><span>Compromiso Pyme</span></a></li>-->
<!--		         <li class='last'><a  href=pdf/R_CPymep.php target="_blank"><span>Compromiso Pyme +</span></a></li>	        -->
<!--		      	</ul>-->
<!--		    </li>-->
<!--		    <li id="cerrar">-->
<!--			<a  href="?pagina=logout">Salir</a>-->
<!--			</li>					-->
<!--	 </ul>-->
<!--</div>-->
<div id='cssmenu'>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=l_consultor"><img src="img/usuario.png"><?php echo "".$_SESSION['username'];?></a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=l_carpeta">Funnel </a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=l_resumen">Avance y Ranking</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=l_diario">Reporte Diario</a>
    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="javascript:Openc()"><img src="img/grafico.png"></a>

    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=tiemposEntrega">T.Entrega</a>

    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=tiemposValidacion">T.Validacion</a>

    <a style="color: #333;
    padding: 10px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;" href="?pagina=logout">Salir</a>
</div><br>

	