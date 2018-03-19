<div id="sidebar">
	<div id="logo">
		<h1><a href="/blog2/">L A M </a></h1>
		<p>look at me<a href="/blog2/principal.php"></a></p>
	</div>
	
		
	
	<div id="menu">
		<ul>
			<!--<li class="current_page_item"><a href="#">Home</a></li>-->
			<li>
				<form name="publicacion" method="POST" action="/blog2/nuevoPost.php" onsubmit="return validaPost();">
					<textarea onkeyup="textAreaAdjust(this)" name="texto" id="texto" rows="3" cols="30" style="overflow:hidden" placeholder="Nuevo Post"></textarea><br/>
					<input type="text" placeholder="Tags (Separados por comas)" name="tags" style="width: 258px;"><br/>
					<input type="submit">
				</form>
			</li>
			<li><a href="/blog2/principal.php">Inicio</a></li>
			<li><a href="/blog2/seguidores.php">Seguidores</a></li>
			<li><a href="/blog2/siguiendo.php">Siguiendo</a></li>
			<li><a href="/blog2/estilos.php">Estilos</a></li>
			<!--
			<li><a href="#">Fotos</a></li>
			<li><a href="#">Perfil</a></li>-->
			<li><a href="logout.php">Cerrar Sesi&oacute;n</a></li>
		</ul>
	</div>
</div>
<!-- end #sidebar -->