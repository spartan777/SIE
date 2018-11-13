<?php
//error_reporting(E_ALL^E_NOTICE);
include ("../conexion.php");
$context = $_GET["context"];
/*$opcion = $_GET["opcion"];
$inicio = $_GET["inicio"];
$fin = $_GET["fin"];*/
?>
<script type="text/javascript">var con = "<?php echo $context;?>"; var opcion = "<?php echo $opcion;?>"; var inicio = "<?php echo $inicio;?>"; var fin = "<?php echo $fin;?>";</script>
<div class="main">
	<p class="alt-sub">Datos Generales!</p>
	<hr class="cont-div">
	<form class="form-asp" action="home.php?op=busqueda" method="POST"><!--formulario de salida para el flujo de los aspirantes-->
    <label>Nombre:</label><br>
    <input class="in-inp" type="text" name="nombre" maxlength="30" required></input><br>
    <label>Apellido Paterno:</label><br>
    <input class="in-inp" type="text" name="paterno" maxlength="30" required></input><br>
    <label>Apellido Materno:</label><br>
    <input class="in-inp" type="text" name="materno" maxlength="30" required></input><br>
	    <br>
	    <input class="submit-asp" type="submit" value="Buscar">
	</form>
	<div>
		<p id="contexto" class="contexto"></p>
	</div>
</div>

<?php if($_POST){
  $nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:"";
  $paterno = isset($_POST["paterno"]) ? $_POST["paterno"]:"";
  $materno = isset($_POST["materno"]) ? $_POST["materno"]:"";

  $sql = "SELECT gen.id_aspirante, gen.nombre, gen.paterno, gen.materno, gen.fecha_nacimiento, gen.escuela_procedencia
          FROM aspirantes_datos_generales gen, aspirante_datos_domicilio dom, aspirantes_datos_contacto con, aspirantes_socioeconomicos soc
          WHERE (gen.nombre LIKE '%$nombre%' OR gen.paterno LIKE '%$paterno%' OR gen.materno LIKE '%$materno%')
          AND gen.id_aspirante = dom.id_aspirante AND gen.id_aspirante = con.id_aspirante AND gen.id_aspirante = soc.id_aspirante";
  $ans = mysqli_query($con,$sql);
  ?>
<table align="center">
      <tr>
          <th>Nombre</th>
          <th>Paterno</th>
          <th>Materno</th>
          <th>Fecha de Nacimiento</th>
          <th>Escuela de Procedencia</th>
          <th>Link</th>
      </tr>
      <?php while ($res = mysqli_fetch_array($ans)) { ?>
        <tr>
          <td><?php echo $res["nombre"]; ?></td>
          <td><?php echo $res["paterno"]; ?></td>
          <td><?php echo $res["materno"]; ?></td>
          <td><?php echo $res["fecha_nacimiento"]; ?></td>
          <td><?php echo $res["escuela_procedencia"]; ?></td>
          <td><a style="color:black;" href="home.php?op=datos&id=<?php echo $res["id_aspirante"]; ?>">Siguiente</a></td>
        </tr>
      <?php } ?>
  </table>
<?php

} ?>
<a style="color:black;" href="../index.php?nivel=aspirante">Página Inicio?</a>
<script src="javascript/men-contexto.js"></script>
