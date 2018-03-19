<?php

	session_start();
	
	if(isset($_SESSION["usuario"])) {
		header("Location: /blog2/principal.php");
	}
	
	include "plantillas/header.php";
?>

<div id="content">

	<h1>Introduce los datos de tu usuario</h1>
	<form name="datosUsuario" action="/blog2/login.php" method="POST" onsubmit="return validaDatosUsuario();">

	<table border="0" cellpadding="0" cellspacing="5">
		<tr><td><label for="usuario">Usuario</label></td><td><input name="usuario" type="text"></td></tr>
		<tr><td><label for="password">Password</label></td><td><input name="password" type="password"></td></tr>
	</table>
	<input type="submit"><input type="reset" value="Borrar">
	</form>

	<a href="/blog2/nuevoUsuario.php">Registrarse</a>

	<div style="clear: both;">&nbsp;</div>
</div>

<?php
	include "plantillas/footer.php";
?>