<?php
	if(session_id() == '') {
		session_start();
	}
	
	if(!isset($_SESSION["estilo"])) {
		$_SESSION["estilo"] = "style1.css";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>lam</title>
<link href="/blog2/<?php echo $_SESSION["estilo"];?>" rel="stylesheet" type="text/css" media="screen" />
<script src="/blog2/scripts/scriptsJS.js"></script>
<link rel="icon" type="image/png" href="/blog2/images/favicon.png">
</head>
<body>
<div id="wrapper">
	<div id="templatemo_top">
    	<div id="templatemo_login">
            <form action="/blog2/buscaUsuario.php" method="POST">
              <input type="text" value="Buscar Usuario" name="buscaUsuario" size="10" id="username" title="username" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field">
              <input type="submit" name="Search" value="Buscar" alt="Search" id="searchbutton" title="Search" class="sub_btn">
            </form>
		</div>
    </div>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">