<?php
	session_start();
	
	if(!isset($_SESSION["usuario"])) {
		header("Location: /blog2/index.php");
	}
	
	include "plantillas/header.php";
?>

<div id="content">

<?php	
	$u = $_POST["buscaUsuario"];
	echo "<h1>Resultados de la busqueda de <b>$u</b></h1>";
	
	include "conexion.php";
	
	conectarBase("blog_db");
	
	$query = 'select * from usuarios where nomUsuario like "%'.$u.'%"';
	
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