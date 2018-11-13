<?php
error_reporting(E_ALL^E_NOTICE);
$context = $_GET["context"];
$id = $_GET["id"];
/*$opcion = $_GET["opcion"];
$inicio = $_GET["inicio"];
$fin = $_GET["fin"];*/
?>
<script type="text/javascript">var con = "<?php echo $context;?>"; var opcion = "<?php echo $opcion;?>"; var inicio = "<?php echo $inicio;?>"; var fin = "<?php echo $fin;?>"; var id="<?php echo $id; ?>"</script>
<div class="main">
	<p class="alt-sub">Datos de Contacto!</p>
  <div>
		<p id="contexto" class="contexto"></p>
    <a style="color:black;" role="button" id="download-file" href="">Descargar formato</a>
	</div>
	<hr class="cont-div">
	<form class="form-asp" action="php/save_contacto.php" method="POST"><!--formulario de salida para el flujo de los aspirantes-->
    <label>En caso de emergencia, ¿Con que persona nos podemos comunicar?</label><br>
    <input class="in-inp" type="text" name="nombre" maxlength="50" required></input><br>
    <label>Domicilio si es distinto al del alumno(a):</label><br>
		<select class="select" name="domicilio" onchange="habilitarDomicilio(this);">
			<option value=""></option>
      <option value="si">Si</option>
			<option value="no">No</option>
	  </select><br>
    <label>Calle:</label><br>
    <input class="in-inp" type="text" name="calle" id="calle"  disabled></input><br>
    <label>Número:</label><br>
    <input class="in-inp" type="text" name="numero" id="numero" maxlength="5" disabled></input><br>
    <label>Colonia:</label><br>
    <input class="in-inp" type="text" name="colonia" id="colonia" maxlength="40" disabled></input><br>
    <label>Código Postal:</label><br>
    <input class="in-inp" type="number" name="cp" id="cp" min="5" max="5" disabled></input><br>
    <label>Municipio:</label><br>
    <input class="in-inp" type="text" name="municipio" id="municipio" maxlength="50" disabled></input><br>
    <label>Estado:</label><br>
    <input class="in-inp" type="text" name="estado" id="estado" maxlength="35" disabled></input><br>

    <label>Teléfono:</label><br>
    <input class="in-inp" type="tel" name="telefono" maxlength="10" required></input><br>
    <label>Lugar de Trabajo:</label><br>
    <input class="in-inp" type="text" name="lugar_trabajo" maxlength="50" required></input><br>
    <label>Teléfono del Trabajo:</label><br>
    <input class="in-inp" type="tel" name="telefono_trabajo" maxlength="10" required></input><br>
	  <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
     <br>
	    <input class="submit-asp" id="submit-form" type="submit" value="Terminar">
	</form>
</div>
<a style="color:black;" href="../index.php?nivel=aspirante">Página Inicio?</a>
<script src="javascript/men-contexto.js"></script>
