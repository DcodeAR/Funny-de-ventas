<?php
@ob_start();
session_start();

  if(isset($_SESSION['contador'])) 
  { 
    $_SESSION['contador'] = $_SESSION['contador'] + 1; 
    $mensaje = 'Número de visitas: ' . $_SESSION['contador']; 
  } 
  else 
  { 
    $_SESSION['contador'] = 1; 
    $mensaje = 'Bienvenido a nuestra página web'; 
  } 
?>
<!DOCTYPE html>
<html>
<head>
	<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Funny</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="js/sweetalert2.min.css">
  <script type="text/javascript" src="js/sweetalert2.min.js" ></script>
  <link rel="icon" type="imagenes/png" href="img/favico.png"/>
  <link rel="stylesheet" type="text/css" href="css/miestilo.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <!--<link rel="stylesheet" type="text/css" href="css/cuerpo.css">-->
  	<!--(c)Todos los derechos reservados David Aguilar-->
  <title>jQuery UI Datepicker - Uso básico</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <script src="js/efecto.js"></script>
  <script>
  $(function () {
  $("#FechaInicio").datepicker({dateFormat:'yy/mm/dd',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
  'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
  'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
  dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
  });
  $("#FechaCierre").datepicker({dateFormat:'yy/mm/dd',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
  'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
  'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
  dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
  });
  });
</script>

<style type="text/css">
	/* latin-ext */
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v14/S6uyw4BMUTPHjxAwXjeu.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v14/S6uyw4BMUTPHjx4wXg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
</style>
<script language="JavaScript" type="text/javascript">
<!--Código "co creado" con los colaboradores de forosdelweb -->
function Open(Id)
      {
  		      
window.open('?pagina=Pm_gestion&Editar_Carpeta=Editar_Carpeta&IdCarpeta='+Id,'popup','mis parámetros de apertura del popup');

}
function Opena(Id)
      {
  		      
window.open('?pagina=m_gestion&Editar_Carpeta=Editar_Carpeta&IdCarpeta='+Id,'popup','mis parámetros de apertura del popup');

}
function Openb(Id)
      {
window.open('?pagina=m_gestion&Reporte_consultor=Reporte_consultor&IdConsultor='+Id,'popup', "width=1200,height=300");
}
function Openc(Id)
      {
window.open('?pagina=m_gestion&Reporte_venta=Reporte_venta','popup', "width=1200,height=300");
}
<!-- a no olvidarse del segundo parámetro!!-->
</script> 
</head>
<body>

	  <header id="cabezera">
</header>
<div id="agrupar">
