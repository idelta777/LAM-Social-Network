<?php
	session_start();
	
	if(!isset($_SESSION["usuario"])) {
		header("Location: /blog2/index.php");
	}
	
	include "plantillas/header.php";
?>

<div id="content">

<?php	
	echo "<h1>Bienvenido <b>".$_SESSION["usuario"]."</b></h1>";
	
	include "conexion.php";
	
	conectarBase("blog_db");
	$query = 	"select distinct a.id,a.texto,a.fecha ".
				"from posts a, postsmap b, usuariosmap c ".
				"where (a.id = b.id_post and b.id_usuario = ".$_SESSION["id_usu"].") or (a.id = b.id_post and c.id_seguidor = ".$_SESSION["id_usu"]." and b.id_usuario = c.id_seguido) ".
				"order by a.fecha ".
				"desc limit 0,10";
	
	$resultado = mysql_query($query);
	
	while($fila = mysql_fetch_array($resultado)) {
		// Obtiene quien lo posteo
		$q2 = "select id,nomUsuario from usuarios where id = (select id_usuario from postsmap where id_post = ".$fila['id'].")";
		$r2 = mysql_query($q2);
		while($f2 = mysql_fetch_array($r2)) {
			$postby = $f2["nomUsuario"];
			$idpostby = $f2["id"];
		}
		
		$q3 = "select a.id,a.tag from tags a, tagsmap b where a.id=b.tag_id and b.post_id = " . $fila["id"];
		$r3 = mysql_query($q3);
		
		echo '<div class="post">';
		if($idpostby == $_SESSION["id_usu"]) {	// Si el post es del mismo usuario
			echo '<p class="meta"><a href="borrarPost.php?p='.$fila["id"].'"><img src="/blog2/images/eliminar.png"></a><span class="date">'. $fila['fecha'] .'</span><span class="posted">Posteado por <a href="/blog2/perfil.php?u='.$idpostby.'">'.$postby.'</a></span></p>';
		}
		else {
			echo '<p class="meta"><span class="date">'. $fila['fecha'] .'</span><span class="posted">Posteado por <a href="/blog2/perfil.php?u='.$idpostby.'">'.$postby.'</a></span></p>';
		}
		echo '<div style="clear: both;">&nbsp;</div>';
		echo '<div class="entry">';
		echo '<p>'.$fila['texto'].'</p>';
		echo '<p><b>Tags: </b>';
		while($f3 = mysql_fetch_array($r3)) {
			echo '<a href="/blog2/consultaTag.php?t='.$f3["id"].'">'.$f3["tag"].'</a>&nbsp;&nbsp;';
		}
		echo '</p>';
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