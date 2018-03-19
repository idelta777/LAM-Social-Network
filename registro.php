<?php
	// Cosas de registro
	
	include "conexion.php";
	
	conectarBase("blog_db");
	
	$query = "select * from usuarios where nomUsuario='" . $_POST["usuario"] . "'";
	
	$resultado = mysql_query($query);
	
	if(mysql_num_rows($resultado) > 0) {
		header("Location: /blog2/usuarioExistente.php");
	} else {
		// Crea una cadena md
		$query = "insert into usuarios(nomUsuario,password) values('" . $_POST["usuario"] ."','" . substr(md5($_POST["password"]),0,20) . "')";
		
		mysql_query($query);
		
		
		// Despues de registrarlo (exitosamente) lo logea
		
		session_start();
		
		$usu = $_POST["usuario"];
		$pass = $_POST["password"];
		
		$_SESSION["usuario"] = $usu;
		
		// ya que esta registrado y logeado
		header("Location: /blog2/principal.php");
	}
?>