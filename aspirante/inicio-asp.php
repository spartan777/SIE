<?php
error_reporting(E_ALL^E_NOTICE);
$context = $_GET["context"];
/*$opcion = $_GET["opcion"];
$inicio = $_GET["inicio"];
$fin = $_GET["fin"];*/
?>
<script type="text/javascript">var con = "<?php echo $context;?>"; var opcion = "<?php echo $opcion;?>"; var inicio = "<?php echo $inicio;?>"; var fin = "<?php echo $fin;?>";</script>
<div class="main">
	<p class="alt-sub">Selecciona un forma de ingreso!</p>
	<hr class="cont-div">
	<form class="form-asp" action="aspirante/php/evaluacion.php" method="POST"><!--formulario de salida para el flujo de los aspirantes-->
		<select class="select" name="opcion">
			<option value="pre-inscripcion">pre-inscripción</option>
			<option value="inscripcion">inscripción</option>
			<option value="re-inscripcion">re-inscripción</option>
	    </select>
	    <br>
	    <input class="submit-asp" type="submit" value="Ver">
	</form>
	<a href="alumno/registro-alumno.php">Registro?</a>
	<div>
		<p id="contexto" class="contexto"></p>
		<script src="aspirante/javascript/men-contexto.js"></script>
	</div>
</div>
<a href="index.php?nivel="">Página Inicio?</a>