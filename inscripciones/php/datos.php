<?php
//error_reporting(E_ALL^E_NOTICE);
$context = $_GET["context"];
include ("../conexion.php");
$id = $_GET["id"];
/*$opcion = $_GET["opcion"];
$inicio = $_GET["inicio"];
$fin = $_GET["fin"];*/
$sql = "SELECT gen.paterno, gen.materno, gen.nombre, gen.fecha_nacimiento, dom.estado_civil,
               dom.calle, dom.colonia, dom.municipio, dom.estado, dom.cp, dom.telefono,
               dom.paterno_padre, dom.materno_padre, dom.nombre_padre, con.domicilio_distinto,
               con.calle as calle_tutor, con.colonia as colonia_tutor, con.municipio as municipio_tutor,
               con.estado as estado_tutor, con.cp as cp_tutor, con.telefono as telefono_tutor,
               gen.escuela_procedencia, gen.promedio, gen.secundaria_estudio, gen.promedio_secundaria
        FROM aspirantes_datos_generales gen, aspirante_datos_domicilio dom, aspirantes_datos_contacto con
        WHERE gen.id_aspirante = $id AND gen.id_aspirante = dom.id_aspirante AND gen.id_aspirante = con.id_aspirante";

$ans = mysqli_query($con,$sql);
while ($res = mysqli_fetch_array($ans)) {
  if($res['domicilio_distinto'] == "no"){
    $calleTutor = $res['calle'];
    $coloniaTutor = $res['colonia'];
    $municipioTutor = $res['municipio'];
    $estadoTutor = $res['estado'];
    $cpTutor = $res['cp'];
  }else{
    $calleTutor = $res['calle_tutor'];
    $coloniaTutor = $res['colonia_tutor'];
    $municipioTutor = $res['municipio_tutor'];
    $estadoTutor = $res['estado_tutor'];
    $cpTutor = $res['cp_tutor'];
  }
?>
<script type="text/javascript">var con = "<?php echo $context;?>"; var opcion = "<?php echo $opcion;?>"; var inicio = "<?php echo $inicio;?>"; var fin = "<?php echo $fin;?>";</script>
<div class="main">
	<p class="alt-sub">Datos del Alumno!</p>
	<hr class="cont-div">
	<form class="form-asp" action="php/save_datos.php" method="POST"><!--formulario de salida para el flujo de los aspirantes-->
    <label>Nombre:</label><br>
    <input class="in-inp" type="text" name="nombre" maxlength="30" value="<?php echo $res["nombre"]; ?>" required></input><br>
    <label>Apellido Paterno:</label><br>
    <input class="in-inp" type="text" name="paterno" maxlength="30" value="<?php echo $res["paterno"]; ?>" required></input><br>
    <label>Apellido Materno:</label><br>
    <input class="in-inp" type="text" name="materno" maxlength="30" value="<?php echo $res["materno"]; ?>" required></input><br>
    <label>Fecha nacimiento:</label><br>
    <input class="in-inp" type="date" name="fecha_nacimiento" value="<?php echo $res["fecha_nacimiento"]; ?>" required></input><br>
    <label>Estado Civil:</label><br>
		<select class="select" name="estado_civil">
      <option value=""></option>
      <option value="soltero" <?php if($res["estado_civil"] == "soltero"){echo "selected"; } ?>>Soltero</option>
			<option value="casado" <?php if($res["estado_civil"] == "casado"){echo "selected"; } ?>>Casado</option>
      <option value="viudo" <?php if($res["estado_civil"] == "viudo"){echo "selected"; } ?>>Viudo</option>
			<option value="libre" <?php if($res["estado_civil"] == "libre"){echo "selected"; } ?>>Unión Libre</option>
      <option value="divorciado" <?php if($res["estado_civil"] == "divorciado"){echo "selected"; } ?>>Divorciado</option>
	  </select><br>
    <label>Dirección Alumno:</label><br>
    <label>Calle:</label><br>
    <input class="in-inp" type="text" name="calle" maxlength="50" value="<?php echo $res["calle"]; ?>" required></input><br>
    <label>Colonia:</label><br>
    <input class="in-inp" type="text" name="colonia" maxlength="40" value="<?php echo $res["colonia"]; ?>" required></input><br>
    <label>Municipio:</label><br>
    <input class="in-inp" type="text" name="municipio" maxlength="50" value="<?php echo $res["municipio"]; ?>" required></input><br>
    <label>Estado:</label><br>
    <input class="in-inp" type="text" name="estado" maxlength="35" value="<?php echo $res["estado"]; ?>" required></input><br>
    <label>Código Postal:</label><br>
    <input class="in-inp" type="number" name="cp" min="10000" max="99999" value="<?php echo $res["cp"]; ?>" required></input><br>
    <label>Teléfono:</label><br>
    <input class="in-inp" type="text" name="telefono" value="<?php echo $res["telefono"]; ?>" required></input><br>

    <label>Datos Tutor(a):</label><br>
    <label>Nombre:</label><br>
    <input class="in-inp" type="text" name="nombre_padre" maxlength="30" value="<?php echo $res["nombre_padre"]; ?>" required></input><br>
    <label>Apellido Paterno:</label><br>
    <input class="in-inp" type="text" name="paterno_padre" maxlength="30" value="<?php echo $res["paterno_padre"]; ?>" required></input><br>
    <label>Apellido Materno:</label><br>
    <input class="in-inp" type="text" name="materno_padre" maxlength="30" value="<?php echo $res["materno_padre"]; ?>" required></input><br>

    <label>Dirección Tutor(a):</label><br>
    <label>Calle:</label><br>
    <input class="in-inp" type="text" name="calle_tutor" maxlength="50" value="<?php echo $calleTutor; ?>" required></input><br>
    <label>Colonia:</label><br>
    <input class="in-inp" type="text" name="colonia_tutor" maxlength="40" value="<?php echo $coloniaTutor; ?>" required></input><br>
    <label>Municipio:</label><br>
    <input class="in-inp" type="text" name="municipio_tutor" maxlength="50" value="<?php echo $municipioTutor; ?>" required></input><br>
    <label>Estado:</label><br>
    <input class="in-inp" type="text" name="estado_tutor" maxlength="35" value="<?php echo $estadoTutor; ?>" required></input><br>
    <label>Código Postal:</label><br>
    <input class="in-inp" type="number" name="cp_tutor" min="10000" max="99999" value="<?php echo $cpTutor; ?>" required></input><br>
    <label>Teléfono:</label><br>
    <input class="in-inp" type="text" name="telefono_tutor" value="<?php echo $res['telefono_tutor']; ?>" required></input><br>
    <label>Escuela de procedencia:</label><br>
    <label>Nombre de la Escuela:</label><br>
    <input class="in-inp" type="text" name="escuela_procedencia" maxlength="50" value="<?php echo $res['escuela_procedencia']; ?>" required></input><br>
    <label>Promedio:</label><br>
    <input class="in-inp" type="text" name="promedio" value="<?php echo $res['promedio']; ?>" required></input><br>
    <label>Secundaria donde estudio:</label><br>
    <input class="in-inp" type="text" name="secundaria_estudio" maxlength="50" value="<?php echo $res['secundaria_estudio']; ?>" required></input><br>
    <label>Promedio:</label><br>
    <input class="in-inp" type="text" name="promedio_secundaria" value="<?php echo $res['promedio_secundaria']; ?>" required></input><br>

    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <input type="hidden" id="domicilio_distinto" name="domicilio_distinto" value="<?php echo $res["domicilio_distinto"]; ?>">
	    <br>
	    <input class="submit-asp" type="submit" value="Guardar Datos">
	</form>
<?php } ?>
	<div>
		<p id="contexto" class="contexto"></p>
		<script src="javascript/men-contexto.js"></script>
	</div>
</div>
<a style="color:black;" href="../index.php?nivel=aspirante">Página Inicio?</a>
