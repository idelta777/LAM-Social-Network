<?php
	session_start();

	$est = $_GET["e"];
	
	$_SESSION["estilo"] = "style$est.css";
	
	header("Location: /blog2/");
?>