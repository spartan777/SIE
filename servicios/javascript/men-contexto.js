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

		case "success":
		con = "Proceso completo! El Número de Control del alumno es: ".concat(nocontrol);
		document.getElementById("contexto").style.backgroundColor = "rgb(85, 255, 85)";
		document.getElementById("submit-form").disabled = true;
		document.getElementById("download-file").style.display = 'visible';
		document.getElementById("download-file").href = "php/downloadarchivo.php?id=".concat(id);
		return con;
		break;

		case "error":
		con = "Ocurrió un error al guardar la información!";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		return con;
		break;

		case "error-inscripcion":
		con = "Ocurrió un error al guardar la información de la inscripción!";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		return con;
		break;
		case "error-update":
		con = "Ocurrió un error al guardar la información del No. de Control!";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		return con;
		break;
		case "error-documentos":
		con = "Ocurrió un error al guardar la información de los documentos!";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		return con;
		break;

		case "inscrito":
		con = "El aspirante ya se encuentra inscrito. Favor de validar!";
		document.getElementById("contexto").style.backgroundColor = "rgb(255, 127, 42)";
		document.getElementById("submit-form").disabled = true;
		return con;
		break;

		default:
		con = "";
		document.getElementById("download-file").style.display = 'none';
		return con;
		break;
	}
}
document.getElementById("contexto").innerHTML = contexto();

var input = document.getElementById('especifique');
function habilitar(elemento) {
  d = elemento.value;

  if(d == "mexicana"){
    input.disabled = true;
		input.value = "";
		input.required = false;
  }else{
    input.disabled = false;
		input.required = true;
  }
}

var inputCapacidad = document.getElementById('especifique_capacidad');
function habilitarCapacidad(elemento) {
  d = elemento.value;

  if(d == "especifique"){
		inputCapacidad.disabled = false;
		inputCapacidad.required = true;
  }else{
		inputCapacidad.disabled = true;
		inputCapacidad.value = "";
		inputCapacidad.required = false;
  }
}

var inputBeca = document.getElementById('especifique_beca');
function habilitarBeca(elemento) {
  d = elemento.value;

  if(d == "si"){
		inputBeca.disabled = false;
		inputBeca.required = true;
  }else{
		inputBeca.disabled = true;
		inputBeca.value = "";
		inputBeca.required = false;
  }
}

var inputProcedencia = document.getElementById('especifique_procedencia');
function habilitarProcedencia(elemento) {
  d = elemento.value;

  if(d == "indigena" || d == "dialecto"){
		inputProcedencia.disabled = false;
		inputProcedencia.required = true;
  }else{
		inputProcedencia.disabled = true;
		inputProcedencia.value = "";
		inputProcedencia.required = false;
  }
}

var inputVivesCon = document.getElementById('especifique_vives_con');
function habilitarVivesCon(elemento) {
  d = elemento.value;

  if(d == "otro"){
		inputVivesCon.disabled = false;
		inputVivesCon.required = true;
  }else{
		inputVivesCon.disabled = true;
		inputVivesCon.value = "";
		inputVivesCon.required = false;
  }
}

var inputOcupacionPadre = document.getElementById('especifique_ocupacion_padre');
function habilitarOcupacionPadre(elemento) {
  d = elemento.value;

  if(d == "otro"){
		inputOcupacionPadre.disabled = false;
		inputOcupacionPadre.required = true;
  }else{
		inputOcupacionPadre.disabled = true;
		inputOcupacionPadre.value = "";
		inputOcupacionPadre.required = false;
  }
}

var inputOcupacionMadre = document.getElementById('especifique_ocupacion_madre');
function habilitarOcupacionMadre(elemento) {
  d = elemento.value;

  if(d == "otro"){
		inputOcupacionMadre.disabled = false;
		inputOcupacionMadre.required = true;
  }else{
		inputOcupacionMadre.disabled = true;
		inputOcupacionMadre.value = "";
		inputOcupacionMadre.required = false;
  }
}

var inputCalle = document.getElementById("calle");
var inputNumero = document.getElementById('numero');
var inputColonia = document.getElementById('colonia');
var inputCP = document.getElementById('cp');
var inputMunicipio = document.getElementById('municipio');
var inputEstado = document.getElementById('estado');
function habilitarDomicilio(elemento) {
  d = elemento.value;
	console.log(inputCalle.value);
  if(d == "si"){
		inputCalle.disabled = false;
		inputCalle.required = true;

		inputNumero.disabled = false;
		inputNumero.required = true;

		inputColonia.disabled = false;
		inputColonia.required = true;

		inputCP.disabled = false;
		inputCP.required = true;

		inputMunicipio.disabled = false;
		inputMunicipio.required = true;

		inputEstado.disabled = false;
		inputEstado.required = true;
  }else{
		inputCalle.disabled = true;
		inputCalle.value = "";
		inputCalle.required = false;

		inputNumero.disabled = true;
		inputNumero.value = "";
		inputNumero.required = false;

		inputColonia.disabled = true;
		inputColonia.value = "";
		inputColonia.required = false;

		inputCP.disabled = true;
		inputCP.value = "";
		inputCP.required = false;

		inputMunicipio.disabled = true;
		inputMunicipio.value = "";
		inputMunicipio.required = false;

		inputEstado.disabled = true;
		inputEstado.value = "";
		inputEstado.required = false;
  }
}
