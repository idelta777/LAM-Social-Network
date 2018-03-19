function validaDatosUsuario() {

	var campoUsuario = document.forms["datosUsuario"]["usuario"].value;
	var campoPassword = document.forms["datosUsuario"]["password"].value;
	
	if (campoUsuario == null || campoUsuario == "" || campoPassword == null || campoPassword == "")
	{
		alert("Introduzca su usuario y contraseña");
		return false;
	}
}

function textAreaAdjust(o) {
    o.style.height = "1px";
    o.style.height = (25+o.scrollHeight)+"px";
}

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

function validaPost() {
	var campoPost = document.forms["publicacion"]["texto"].value;
	
	if(campoPost == "" || campoPost == null) {
		alert("No hay nada que postear");
		return false;
	}
}