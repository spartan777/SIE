<?php
error_reporting(E_ALL^E_NOTICE);
$context = $_GET["context"];
/*$opcion = $_GET["opcion"];
$inicio = $_GET["inicio"];
$fin = $_GET["fin"];*/
?>
<script type="text/javascript">var con = "<?php echo $context;?>"; var opcion = "<?php echo $opcion;?>"; var inicio = "<?php echo $inicio;?>"; var fin = "<?php echo $fin;?>";</script>
<div class="main">
	<p class="alt-sub">Datos Generales!</p>
	<hr class="cont-div">
	<form class="form-asp" action="php/save_generales.php" method="POST"><!--formulario de salida para el flujo de los aspirantes-->
    <label>Nombre:</label><br>
    <input class="in-inp" type="text" name="nombre" maxlength="30" required></input><br>
    <label>Apellido Paterno:</label><br>
    <input class="in-inp" type="text" name="paterno" maxlength="30" required></input><br>
    <label>Apellido Materno:</label><br>
    <input class="in-inp" type="text" name="materno" maxlength="30" required></input><br>
    <label>Fecha nacimiento:</label><br>
    <input class="in-inp" type="date" name="nacimiento" required></input><br>
    <label>Edad:</label><br>
    <input class="in-inp" type="number" name="edad" min="1" max="100" required></input><br>
    <label>Nacionalidad:</label><br>
		<select class="select" name="nacionalidad" onchange="habilitar(this);">
			<option value="mexicana">Mexicana</option>
			<option value="extranjera">Extranjera</option>
	  </select><br>
    <input class="in-inp" type="text" name="especifique" id="especifique" maxlength="15" disabled></input><br>
    <label>Primera opción de carrera:</label><br>
		<select class="select" name="opcion_1" >
			<option value="1">Informática</option>
			<option value="2">Sistemas</option>
	  </select><br>
    <label>Segunda opción de carrera:</label><br>
		<select class="select" name="opcion_2" >
			<option value="1">Informática</option>
			<option value="2">Sistemas</option>
	  </select><br>
    <label>Escuela de procedencia:</label><br>
    <input class="in-inp" type="text" name="procedencia" maxlength="50" required></input><br>
    <label>Tipo de escuela:</label><br>
		<select class="select" name="tipo_escuela" >
			<option value="federal">Federal</option>
			<option value="estatal">Estatal</option>
      <option value="privada">Privada</option>
	  </select><br>
    <label>Año de egreso:</label><br>
    <input class="in-inp" type="number" name="egreso" min="1950" required></input><br>
    <label>Promedio:</label><br>
    <input class="in-inp" type="text" name="promedio" required></input><br>
	    <br>
	    <input class="submit-asp" type="submit" value="Siguiente">
	</form>
	<div>
		<p id="contexto" class="contexto"></p>
		<script src="javascript/men-contexto.js"></script>
	</div>
</div>
<a style="color:black;" href="../index.php?nivel=aspirante">Página Inicio?</a>
