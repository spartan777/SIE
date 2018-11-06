<div class="container-records">
	<?php 
	  $per = $_GET["per"];
	  echo"<p class='title'>Estos son los cursos para el periodo: ".$per."</p> ";
?>
    <hr class="divider">
    <table class="records">
    	<tr>
    		<th>clave</th>
    		<th>curso/catedrático</th>
    		<th>creditos</th>
    		<th>calificación</th>
    		<th>opción</th>
    	</tr>
<?php
  include ("../conexion.php");
  session_start();
  $clave = $_SESSION["clave"];
  $per = $_GET["per"];
  $sql = "SELECT cursos.Id_Materia,Promedio,Est_Opcion,Nombre_Materia,Creditos,Nombre_Catedratico,A_Paterno,A_Materno FROM cursos INNER JOIN materias ON materias.Id_Materia = cursos.Id_Materia INNER JOIN catedratico ON catedratico.Id_Catedratico = cursos.Id_Catedratico WHERE cursos.Id_Periodo = '$per' && cursos.Numero_Control = '$clave'";
  $ans = mysqli_query($con,$sql);
  while ($res = mysqli_fetch_array($ans)) {
    $cla=$res["Id_Materia"];
    $nom=$res["Nombre_Materia"];
    $cat=$res["Nombre_Catedratico"];
    $catap=$res["A_Paterno"];
    $catam=$res["A_Materno"];
    $cre=$res["Creditos"];
    $cal=$res["Calificacion"];
    $est=$res["Est_Opcion"];
  if ($cal===NULL) {
	$cal="Aun no hay calificación";
	$est="---";
	echo " <tr><td>$cla</td><td class='name'>".utf8_encode($nom)."/".utf8_encode($cat)." ".utf8_encode($catap)." ".utf8_encode($catam)."</td><td>$cre</td><td>$cal</td><td>$est</td></tr>";
  }
  else {
  echo " <tr><td>$cla</td><td class='name'>".utf8_encode($nom)."/$cat $catap $catam</td><td>$cre</td><td>$cal</td><td>$est</td></tr>";
  }
  }
?>
        <tr>
        	<th>promedio</th>
        </tr>
        <tr>
<?php
  error_reporting(E_ALL^E_WARNING);
  include ("../conexion.php");
  $clave = $_SESSION["clave"];
  $per = $_GET["per"];
  $sql = "SELECT AVG (Promedio) FROM cursos WHERE Id_Periodo = '$per' && Numero_Control = '$clave'";
  $ans = mysqli_query($con,$sql);
  $res = mysqli_fetch_array($ans);
  $ave = $res["0"];
  if (empty($ave)) {
    $ave = "---";
  }
  echo "<td class='average'>".$ave."</td>";
?>
        </tr>
    </table>
    <br>
    <span class="record-search">
    	<p class="sub-title">Ver parciales por curso.</p>
    	<form action="php/consulta-cal-curso.php" method="POST" target="frame">
    		<select name="slc_op">
    			<?php
    			  include ("../../conexion.php");
    			  session_start();
    			  $clave = $_SESSION["clave"];
    			  $per = $_GET["per"];
    			  $sql = "SELECT cursos.Id_Materia,Nombre_Materia FROM cursos INNER JOIN materias ON materias.Id_Materia = cursos.Id_Materia INNER JOIN catedratico ON catedratico.Id_Catedratico = cursos.Id_Catedratico WHERE cursos.Id_Periodo = '$per' && cursos.Numero_Control = '$clave'";
    			  $ans = mysqli_query($con,$sql);
    			  while ($res = mysqli_fetch_array($ans)) {
    			  	$value = $res["Id_Materia"];
    			  	$naam = $res["Nombre_Materia"];
    			  	echo "<option value='$value'>$value-".utf8_encode($naam)."</option>";
    			  }
    			?>
	        </select>
	        <br>
	        <input type="hidden" name="hdn-periodo" value="<?php echo $per;?>">
	        <input class="submit" type="submit" value="ver curso">
	    </form>
	</span>
</div>