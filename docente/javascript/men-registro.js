function contexto()//la función color() sólo compone el mensaje y define el background-color del elemento conocido como "mark"
{
	
	switch(con)
	{
		case "1":
		  con = "La clave de acceso no existe!";
		  document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		  return con;
		break;

		case "2":
		  con = `Hola! ${nom} Ingresa una contraseña.`;
		  document.getElementById("contexto").style.backgroundColor = "rgb(85, 255, 85)";
		  return con;
		break;

		case "3":
		  con = "Ya existe un registro!";
		  document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		  return con;
		break;

		case "4":
		  con = "Algo salio mal, contacta al administrador";
		  document.getElementById("contexto").style.backgroundColor = "red";
		  return con;
		break;

		default:
		  con = "";
		  return con;
		break;
	}
}
document.getElementById("contexto").innerHTML = contexto();