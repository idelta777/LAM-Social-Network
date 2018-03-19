<?php

	session_start();
	
	include 'conexion.php';
	conectarBase("blog_db");
	
	$usu = $_GET["u"];
	
	$query = "delete from usuariosmap where id_seguidor = ".$_SESSION["id_usu"]." and id_seguido = $usu";
	mysql_query($query);
	header("Location: /blog2/");
?>