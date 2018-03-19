<?php
	session_start();
	
	if(!isset($_SESSION["usuario"])) {
		header("Location: /blog2/index.php");
	}
	// Da de alta el nuevo post
	
	if($_POST["texto"] != "") {
		include 'conexion.php';
		
		conectarBase("blog_db");
		
		$query = "insert into posts(texto,fecha) values('".$_POST["texto"]."',(select now()))";
		mysql_query($query);
		
		// Obtiene el id del posts que acaba de insertar
		$query = "select max(id) as maximo from posts";
		$resultado = mysql_query($query);
		while($fila = mysql_fetch_array($resultado)) {
			$max = $fila['maximo'];
		}
		
		$query = "insert into postsmap(id_usuario,id_post) values(".$_SESSION['id_usu'].",$max)";
		mysql_query($query);
		
		// Parte sobre los tags
			
		// En este momento la cadena esta sin tratar
		$tags = $_POST["tags"];
		
		// Elimina los espacios extra
		$tags1 = trim($tags);
		
		// Quita todos los espacios
		$tags2 = str_replace(" ","",$tags1);
		
		$tagsArray = explode(",",$tags2);
		
		// Recorre todos los tags
		foreach($tagsArray as $t) {
			// Si la cadena esta vacia se la salta
			if(strcmp($t,"")==0) continue;
			
			$query = "select id from tags where tag='$t'";
			$resultado = mysql_query($query);
			if(mysql_num_rows($resultado) > 0) {
				// Si ya existe en la tabla solo lo inserta en la tabla de mapeo
				$fila = mysql_fetch_array($resultado);
				$idtag = $fila["id"];
				mysql_query("insert into tagsmap(post_id,tag_id) values($max,$idtag)");
			} else {
				// Inserta una nueva fila en el tag
				mysql_query("insert into tags(tag) values('$t')");
				
				// Obtiene el id del ultimo tag insertado
				
				$r = mysql_query("select max(id) as id from tags");
				$f = mysql_fetch_array($r);
				
				$idtag = $f["id"];
				
				mysql_query("insert into tagsmap(post_id,tag_id) values($max,$idtag)");
			}
		}
	}
	
	header("Location: /blog2/principal.php");
?>