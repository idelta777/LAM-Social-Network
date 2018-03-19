<?php
	// Cosas de login
	
	include "conexion.php";
	
	conectarBase("blog_db");
	
	$query = "select * from usuarios where nomUsuario='" . $_POST["usuario"] . "'";
	
	$resultado = mysql_query($query);
	
	// Si no existe
	if(!mysql_num_rows($resultado)>0) {
		header("Location: /blog2/errorLogin.php");
	} else {
		// Checa la contraseña
		/*
		$query = "select * from usuarios where nomUsuario='" . $_POST["usuario"] . "'";
		$resultado = mysql_query($query);
		*/
		
		$fila = mysql_fetch_array($resultado);
		
		if($fila["password"] == substr(md5($_POST["password"]),0,20)) {
	
			session_start();
			
			$usu = $_POST["usuario"];
			
			$_SESSION["id_usu"] = $fila["id"];
			$_SESSION["usuario"] = $usu;
			
			// Redirige
			header("Location: /blog2/principal.php");
		} else {
			header("Location: /blog2/errorLogin.php");
		}
	}
?>