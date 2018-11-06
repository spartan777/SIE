function mensaje()
{
	
	switch(men)
	{
		case "coordinacion":
		men = "Sólo empleados del personal acedemico <br> podran registrarse como usuarios.";
		return men;
		break;

		case "docencia":
		men = "Sólo empleados del personal acedemico <br> podran registrarse como usuarios.";
		return men;
		break;

		case "alumnado":
		men = "Sólo alumnos inscritos en tiempo y forma <br> podran registrarse como usuarios";
		return men;
		break;

		case "aspirantes":
		men = "Los procesos de inscripción sólo seran validos <br> dentro de las fechas establecidas";
		return men;
		break;

		case "default":
		men = "Instituto Tecnológico superior de cosamaloapan <br> SIEv1.0.";
		return men;
		break;
	}
}
document.getElementById("custom-msg").innerHTML = mensaje();