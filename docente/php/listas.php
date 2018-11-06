<div class="container-list">
	<?php 
	  $per = $_GET["per"];
	  echo"<p class='title'>Estas son las listas disponibles para el periodo: ".$per."</p> ";
	 ?>

	<hr class="divider">
    <table class="list">
    	<tr>
    		<th>Clave</th>
    		<th>Curso</th>
    		<th>Participantes</th>
    	</tr>

    <?php
    include ("../conexion.php");
    session_start();
    $clave = $_SESSION["clave"];
    $per = $_GET["per"];
    $sql="SELECT cursos.Id_Materia, Nombre_Materia FROM cursos INNER JOIN materias on cursos.Id_Materia = materias.Id_Materia WHERE Id_Catedratico = '$clave' && cursos.Id_Periodo = '$per' GROUP BY Id_Materia ORDER BY 1;";
    
    
    $ans = mysqli_query($con,$sql);
    $res = mysqli_fetch_array($ans);

    $cla = $res["Id_Materia"];
    $mat = $res["Nombre_Materia"];


    echo "<tr><td>$cla</td><td>".utf8_encode($mat)."</td>";

    ?>
    <?php
    include ("../conexion.php");
    session_start();
    $clave = $_SESSION["clave"];
    $per = $_GET["per"];
     $sql = "SELECT COUNT(Id_Materia) FROM cursos WHERE Id_Catedratico = '$clave' && cursos.Id_Periodo = '$per';";
     $ans = mysqli_query($con,$sql);
    $res = mysqli_fetch_array($ans);

    $par = $res["COUNT(Id_Materia)"];

    echo "<td>$par</td></tr>";

     ?>
</table>
<br>
<span class="record-search">
    	<p class="sub-title">Ver lista por curso.</p>
    	<form action="php/consulta-lis-curso.php" method="POST" target="frame">
    		<select name="slc_op">
    			<?php
    			  include ("../../conexion.php");
    			  session_start();
    			  $clave = $_SESSION["clave"];
    			  $per = $_GET["per"];
    			  $sql = "SELECT cursos.Id_Materia, Nombre_Materia FROM cursos INNER JOIN materias on cursos.Id_Materia = materias.Id_Materia WHERE Id_Catedratico = '$clave' && cursos.Id_Periodo = '$per' GROUP BY Id_Materia ORDER BY 1;";
    			  $ans = mysqli_query($con,$sql);
    			  while ($res = mysqli_fetch_array($ans)) {
    			  	$value = $res["Id_Materia"];
    			  	$naam = $res["Nombre_Materia"];
    			  	echo "<option value='$value'>$value - ".utf8_encode($naam)."</option>";
    			  }
    			?>
	        </select>
	        <br>
	        <input type="hidden" name="hdn-periodo" value="<?php echo $per;?>">
	        <input class="submit" type="submit" value="ver curso">
	    </form>
	</span>
</div>