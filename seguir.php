<?php
	session_start();

	include 'conexion.php';
	conectarBase("blog_db");
	
	$usu = $_GET["u"];
	
	$query = "insert into usuariosmap(id_seguidor,id_seguido) values(".$_SESSION["id_usu"].",$usu)";
	mysql_query($query);
	header("Location: /blog2/");
?>