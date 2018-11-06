function contexto()
{
	
	switch(con)
	{
		case "1":
		con = "Datos incorrectos!, Intenta de nuevo.";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		return con;
		break;

		case "2":
		con = "Hasta luego usuario!";
		document.getElementById("contexto").style.backgroundColor = "rgb(85, 255, 85)";
		return con;
		break;

		case "3":
		con = "Debes iniciar sesión primero!";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		return con;
		break;

		case "4":
		con = "Tus datos se han actualizado!";
		document.getElementById("contexto").style.backgroundColor = "rgb(223, 210, 17)";
		return con;
		break;

		default:
		con = "";
		return con;
		break;
	}
}
document.getElementById("contexto").innerHTML = contexto();