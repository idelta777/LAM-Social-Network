<?php
	$pid = $_GET["p"];
	
	include 'conexion.php';
	
	conectarBase("blog_db");
	
	mysql_query("delete from postsmap where id_post = $pid");
	mysql_query("delete from tagsmap where post_id = $pid");
	mysql_query("delete from posts where id = $pid");
	
	header("Location: /blog2/principal.php");
?>