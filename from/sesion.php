<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {

   echo "Esta pagina es solo para usuarios registrados.<br>";

   echo "<br><a href='login.html'>Login</a>";

   echo "<br><br><a href='index.html'>Registrarme</a>";

exit;

}

$now = time();


if($now > $_SESSION['expire']) {

session_destroy();
echo "Su sesion a terminado,
<a href=?pagina=logout>Login</a>";
exit;
mysqli_close();
}

?>