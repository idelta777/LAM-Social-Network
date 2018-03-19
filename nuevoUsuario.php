<?php
	include "plantillas/header.php";
?>

<div id="content">

	<h1>Nuevo Usuario</h1>
	<form name="datosUsuario" action="/blog2/registro.php" method="POST" onsubmit="return validaDatosUsuario();">
		<table border="0" cellpadding="0" cellspacing="5">
			<tr><td><label for="usuario">Usuario</label></td><td><input type="text" name="usuario"></td></tr>
			<tr><td><label for="password">Password</label></td><td><input type="password" name="password"></td></tr>
		</table>
		<input type="submit"><input type="reset" value="Borrar">
	</form>

	<div style="clear: both;">&nbsp;</div>
</div>

<?php
	include "plantillas/footer.php";
?>