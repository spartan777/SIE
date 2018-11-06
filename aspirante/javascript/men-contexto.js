function contexto()
{
	
	switch(con)
	{
		case "1":
		con = "Fechas incompatibles! fuera de tiempo.";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		return con;
		break;

		case "2":
		con = "Proceso completo!";
		document.getElementById("contexto").style.backgroundColor = "rgb(85, 255, 85)";
		return con;
		break;

		default:
		con = "";
		return con;
		break;
	}
}
document.getElementById("contexto").innerHTML = contexto();