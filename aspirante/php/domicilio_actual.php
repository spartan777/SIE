<?php
error_reporting(E_ALL^E_NOTICE);
$context = $_GET["context"];
$id = $_GET["id"];
/*$opcion = $_GET["opcion"];
$inicio = $_GET["inicio"];
$fin = $_GET["fin"];*/
?>
<script type="text/javascript">var con = "<?php echo $context;?>"; var opcion = "<?php echo $opcion;?>"; var inicio = "<?php echo $inicio;?>"; var fin = "<?php echo $fin;?>";</script>
<div class="main">
	<p class="alt-sub">Domicilio Actual!</p>
	<hr class="cont-div">
	<form class="form-asp" action="php/save_domicilio.php" method="POST"><!--formulario de salida para el flujo de los aspirantes-->
    <label>Calle con No. Exterior y/o Interior:</label><br>
    <input class="in-inp" type="text" name="calle" maxlength="50" required></input><br>
    <label>Estado:</label><br>
    <input class="in-inp" type="text" name="estado" maxlength="35" required></input><br>
    <label>Municipio:</label><br>
    <input class="in-inp" type="text" name="municipio" maxlength="50" required></input><br>
    <label>Código Postal:</label><br>
    <input class="in-inp" type="number" name="cp" min="10000" max="99999" required></input><br>
    <label>Colonia o Localidad:</label><br>
    <input class="in-inp" type="text" name="colonia" maxlength="40" required></input><br>
    <label>Correo electrónico:</label><br>
    <input class="in-inp" type="email" name="correo" maxlength="50" required></input><br>
    <label>Teléfono:</label><br>
    <input class="in-inp" type="text" name="telefono" required></input><br>
    <label>Estado Civil:</label><br>
		<select class="select" name="estado_civil">
			<option value="soltero">Soltero</option>
			<option value="casado">Casado</option>
      <option value="viudo">Viudo</option>
			<option value="libre">Unión Libre</option>
      <option value="divorciado">Divorciado</option>
	  </select><br>
    <label>Capacidad Diferente:</label><br>
		<select class="select" name="capacidad_diferente" onchange="habilitarCapacidad(this);">
      <option value=""></option>
      <option value="auditiva">Auditiva</option>
			<option value="visual">Visual</option>
      <option value="motora">Motora</option>
			<option value="especifique">Especifique</option>
	  </select><br>
    <input class="in-inp" type="text" name="especifique_capacidad" id="especifique_capacidad" maxlength="20" disabled></input><br>
    <label>¿Cuentas con alguna beca?</label><br>
		<select class="select" name="beca" onchange="habilitarBeca(this);">
			<option value=""></option>
      <option value="si">Si</option>
			<option value="no">No</option>
	  </select><br>
    <input class="in-inp" type="text" name="especifique_beca" id="especifique_beca" maxlength="20" disabled></input><br>
    <label>Zona de Procedencia</label><br>
		<select class="select" name="procedencia" onchange="habilitarProcedencia(this);">
			<option value=""></option>
      <option value="indigena">Indígena</option>
			<option value="dialecto">Dialecto</option>
      <option value="rural">Rural</option>
      <option value="urbano_marginado">Urbano marginado</option>
      <option value="urbano">Urbano</option>
	  </select><br>
    <input class="in-inp" type="text" name="especifique_procedencia" id="especifique_procedencia" maxlength="20" disabled></input><br>
    <label>¿Tu familia pertenece al programa OPORTUNIDADES?</label><br>
    <select class="select" name="oportunidades">
      <option value=""></option>
      <option value="si">Si</option>
      <option value="no">No</option>
    </select><br>
    <label>Datos del Padre</label><br>
    <label>Nombre:</label><br>
    <input class="in-inp" type="text" name="nombre_padre" maxlength="30" required></input><br>
    <label>Apellido Paterno:</label><br>
    <input class="in-inp" type="text" name="paterno_padre" maxlength="30" required></input><br>
    <label>Apellido Materno:</label><br>
    <input class="in-inp" type="text" name="materno_padre" maxlength="30" required></input><br>
    <label>Vive</label><br>
    <select class="select" name="vive_padre">
      <option value=""></option>
      <option value="si">Si</option>
      <option value="no">No</option>
    </select><br>
    <label>Datos de la Madre</label><br>
    <label>Nombre:</label><br>
    <input class="in-inp" type="text" name="nombre_madre" maxlength="30" required></input><br>
    <label>Apellido Paterno:</label><br>
    <input class="in-inp" type="text" name="paterno_madre" maxlength="30" required></input><br>
    <label>Apellido Materno:</label><br>
    <input class="in-inp" type="text" name="materno_madre" maxlength="30" required></input><br>
    <label>Vive</label><br>
    <select class="select" name="vive_madre">
      <option value=""></option>
      <option value="si">Si</option>
      <option value="no">No</option>
    </select><br>
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
	    <br>
	    <input class="submit-asp" type="submit" value="Siguiente">
	</form>
	<div>
		<p id="contexto" class="contexto"></p>
		<script src="javascript/men-contexto.js"></script>
	</div>
</div>
<a style="color:black;" href="../index.php?nivel=aspirante">Página Inicio?</a>
