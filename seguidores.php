<?php
	session_start();
	
	if(!isset($_SESSION["usuario"])) {
		header("Location: /blog2/index.php");
	}
	
	include "plantillas/header.php";
?>

<div id="content">

<?php	
	echo "<h1>Gente que te sigue</h1>";
	
	include "conexion.php";
	
	conectarBase("blog_db");
	
	$query = "select a.* from usuarios a, usuariosmap b where a.id = b.id_seguidor and b.id_seguido = ".$_SESSION["id_usu"];
	
	$resultado = mysql_query($query);
	
	while($fila = mysql_fetch_array($resultado)) {
		
		echo '<div class="post">';	// Cambiar por una clase nueva para mostrar perfiles
		echo '<div style="clear: both;">&nbsp;</div>';
		echo '<div class="entry">';
		echo '<p><a href="/blog2/perfil.php?u='.$fila["id"].'">'.$fila['nomUsuario'].'</a></p>';
		echo '</div>';
		echo '</div>';
	}
?>

	<div style="clear: both;">&nbsp;</div>
</div>

<?php
	include "plantillas/sidebar.php";
	include "plantillas/footer.php";
?>