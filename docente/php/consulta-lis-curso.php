<!DOCTYPE html>
<html>
<body>
	<style type="text/css">body{font-family: sans-serif;} table{border-collapse:collapse;width: 50%;margin-bottom: 5%;} th{font-size: 25px;height: 40px;border-bottom: 1px solid #ccccccff;font-weight: lighter;color: #5f8dd3ff;}.head{text-align: left;}.average{color:#00ff00ff;}.title{font-size: 20px; font-weight: lighter;color: #999999ff;}.sub-title{font-size: 18px; font-weight: lighter;color: #999999ff;}.alt-title{font-size: 18px; font-weight: lighter;color: #999999ff;}td{border-bottom: 1px solid #ccccccff;height: 40px;font-size: 14px;color: #4d4d4dff;text-align: center;}th{font-weight: lighter;border-bottom: 1px solid #ccccccff;color: #5f8dd3ff;font-size: 25px;height: 40px;}tr:nth-child(even) {background-color: #ecececff;}.esp{width: 80%;}</style>
	
		<?php
		//imprime cabecera principal de presentación.
		include ("../../conexion.php");
		session_start();
		$clave=$_SESSION["clave"];
		$op=$_POST["slc_op"];
		$per = $_POST["hdn-periodo"];
		//echo $clave;
		//echo $op;
		//echo $per;
		$sql ="SELECT Nombre_Materia, H_Teoricas, H_Prcaticas, cursos.Id_Periodo, cursos.Id_Grupo, cursos.Id_Materia FROM cursos INNER JOIN materias ON materias.Id_Materia = cursos.Id_Materia WHERE cursos.Id_Materia = '$op' && Id_Catedratico = '$clave' && cursos.Id_Periodo = '$per' GROUP BY cursos.Id_Materia ORDER BY 1;";
		$ans = mysqli_query($con,$sql);
		$res = mysqli_fetch_array($ans);
		$nom=$res["Nombre_Materia"];
		$teoricas=$res["H_Teoricas"];
		$practicas=$res["H_Prcaticas"];
		$periodo = $res["Id_Periodo"];
		$grupo = $res["Id_Grupo"];
		$cla = $res["Id_Materia"];
		echo "<p class='title'>".utf8_encode($nom)."| horas teóricas: ".$teoricas." horas practicas: ".$practicas."</p>";
		echo "<p class='sub-title'>Periodo: ".$periodo."</p>";
		echo "<p class='sub-title'>Paquete/Grupo: ".$grupo."</p>";
		echo "<p class='sub-title'>Clave: ".$cla."</p>";
		?>

		<?php
		//imprime numero de entradas por clave de materia para clave de catedratico en cierto periodo.
		include ("../../conexion.php");
		$clave=$_SESSION["clave"];
		$op=$_POST["slc_op"];
		$per = $_POST["hdn-periodo"];
		//echo $clave;
		//echo $op;
		//echo $per;
		$sql ="SELECT COUNT(Id_Materia) FROM cursos WHERE Id_Catedratico = '$clave' && cursos.Id_Periodo = '$per' && cursos.Id_Materia = '$op';";
		$ans = mysqli_query($con,$sql);
		$res = mysqli_fetch_array($ans);
		$participantes=$res["COUNT(Id_Materia)"];
		echo "<p class='sub-title'>Participantes: ".$participantes."</p>";
		?>
	<table class="esp">
		<?php
		error_reporting(E_ALL^E_WARNING);
		//imprime los números que representan a las unidades.
		include ("../../conexion.php");
		$clave=$_SESSION["clave"];
		$op=$_POST["slc_op"];
		$per = $_POST["hdn-periodo"];
		$sql = "SELECT Num_Tema FROM parciales WHERE Id_Materia = '$op' && Id_Periodo = '$per' GROUP BY Num_Tema ORDER BY 1;";
		$ans = mysqli_query($con,$sql);
		$res = mysqli_fetch_array($ans);
		$parcial=$res["Num_Tema"];
		$total = $parcial+1; 
		?>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Número de control</th>
			<th rowspan="2">Nombre</th>
			<th colspan="<?php echo $total; ?>">Parciales</th>
		</tr>
		<?php
		include ("../../conexion.php");
		$clave=$_SESSION["clave"];
		$op=$_POST["slc_op"];
		$per = $_POST["hdn-periodo"];
		$sql = "SELECT Num_Tema FROM parciales WHERE Id_Materia = '$op' && Id_Periodo = '$per' GROUP BY Num_Tema ORDER BY 1;";
		$ans = mysqli_query($con,$sql);
		while ($res = mysqli_fetch_array($ans)) {
		  $uni=$res["Num_Tema"];
		  echo "<td>$uni</td>";
		}
	    ?>
	    <?php
			include ("../../conexion.php");
		    $clave=$_SESSION["clave"];
		    $op=$_POST["slc_op"];
		    $per = $_POST["hdn-periodo"];
		    $sql = "SELECT cursos.Numero_Control, Nombre_Alumno, A_Paterno, A_Materno FROM cursos INNER JOIN alumno ON cursos.Numero_Control = alumno.Numero_Control WHERE Id_Catedratico= '$clave' && Id_Materia = '$op' && Id_Periodo='$per' ORDER BY Numero_Control;";
		    $ans = mysqli_query($con,$sql);
		    while ($res = mysqli_fetch_array($ans)) {
		    $numero = $res["Numero_Control"];
		    $nombre = $res["Nombre_Alumno"];
		    $paterno = $res["A_Paterno"];
		    $materno = $res["A_Materno"];

		    echo "<tr><td>1</td><td>$numero</td><td>".utf8_encode($nombre)." ".utf8_encode($paterno)." ".utf8_encode($materno)."</td>";
		}

			?>
			<?php
			include ("../../conexion.php");
		    $clave=$_SESSION["clave"];
		    $op=$_POST["slc_op"];
		    $per = $_POST["hdn-periodo"];
		    $sql = "SELECT Calificacion FROM parciales WHERE Id_Materia = '$op' && Id_Periodo='$per' ORDER BY Numero_Control;";
		    $ans = mysqli_query($con,$sql);
		    while ($res = mysqli_fetch_array($ans)) {
		    	$calificaion = $res["Calificacion"];
		    	echo "<td>$calificaion</td></tr>";
		    }
			?>
	</table>
</body>
<html>