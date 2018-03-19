<?php

	session_start();
	
	if(!isset($_SESSION["usuario"])) {
		header("Location: /blog2/index.php");
	}
	
	// Obtiene el perfil que se esta visualizando
	if(isset($_GET["u"]))	// Si no se envio el usuario a consultar
		$usu = $_GET["u"];
	else
		header("Location: /blog2/");
	
	if($_SESSION["id_usu"] == $usu) {
		include 'conexion.php';
		conectarBase("blog_db");
		despliegaPerfil(0,$usu);
	} else {	
		// Checa si ya sigue al usuario
			// Si lo sigue despliega boton "Dejar de seguir"
			// Si no lo sigue despliega boton "Seguir"
			
		include 'conexion.php';
		
		conectarBase("blog_db");
		
		$query = "select id from usuariosmap where id_seguidor = ".$_SESSION["id_usu"]." and id_seguido = $usu";
		
		$resultado = mysql_query($query);
		
		if(mysql_num_rows($resultado) > 0) {
			despliegaPerfil(1,$usu);
		} else {
			despliegaPerfil(2,$usu);
		}
	}
	
	function despliegaPerfil($val,$usu) {
		include 'plantillas/header.php';
		
		echo '<div id="content">';
		
		$query = "select nomUsuario from usuarios where id=$usu";
		$resultado = mysql_query($query);
		$fila = mysql_fetch_array($resultado);
		$nom = $fila["nomUsuario"];
		
		echo "<h1>Perfil de <b>$nom</b></h1><br/>";
		
		if($val == 0) {	// El mismo
		}
		if($val == 1) {	// Lo sigue
			echo "<input value='Dejar de seguir' type='button' onclick=\"location.href='/blog2/dejarseguir.php?u=$usu';\">";
		}
		if($val == 2) {	// No lo sigue
			echo "<input value='Seguir' type='button' onclick=\"location.href='/blog2/seguir.php?u=$usu';\">";
		}
		/*
		include "conexion.php";
		
		conectarBase("blog_db");
		*/
		// Obtiene los posts del usuario ordenados en forma descendente por la fecha
		$query = "select a.id,a.texto,a.fecha from posts a, postsmap b where a.id = b.id_post and b.id_usuario = $usu order by a.fecha desc limit 0,10";
		
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
			//echo '<p class="meta"><span class="date">'. $fila['fecha'] .'</span><span class="posted">Posteado por <a href="/blog2/perfil.php?u='.$idpostby.'">'.$postby.'</a></span></p>';
			if($val == 0) {
				echo '<p class="meta"><a href="borrarPost.php"><img src="/blog2/images/eliminar.png"></a><span class="date">'. $fila['fecha'] .'</span><span class="posted">Posteado por <a href="/blog2/perfil.php?u='.$idpostby.'">'.$postby.'</a></span></p>';
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

		echo '<div style="clear: both;">&nbsp;</div>';
		echo '</div>';
		
		include 'plantillas/sidebar.php';
		include 'plantillas/footer.php';
	}
		
	// Despliega la información del usuario
?>