<?php
 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
 
function conectarBase($db="") {
	global $dbhost, $dbuser, $dbpass;
	 
	$conexion = @mysql_connect($dbhost, $dbuser, $dbpass)
	or die("The site database appears to be down.");
	 
	if ($db!="" and !@mysql_select_db($db))
	die("The site database is unavailable.");
	 
	return $conexion;
}
?>