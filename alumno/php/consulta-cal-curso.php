<!DOCTYPE html>
<html>
<body>
	<style type="text/css">body{font-family: sans-serif;} table{border-collapse:collapse;width: 50%;margin-bottom: 5%;} th{font-size: 25px;height: 40px;border-bottom: 1px solid #ccccccff;font-weight: lighter;color: #5f8dd3ff;}td{border-bottom: 1px solid #ccccccff;text-align: center;}tr:nth-child(even) {background-color: #ecececff;}.head{text-align: left;}.average{color:#00ff00ff;}.title{font-size: 20px; font-weight: lighter;color: #999999ff;}.sub-title{font-size: 18px; font-weight: lighter;color: #999999ff;}.alt-title{font-size: 18px; font-weight: lighter;color: #999999ff;}</style>
	<table>
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
		$sql ="SELECT Nombre_Materia, H_Teoricas, H_Prcaticas FROM cursos INNER JOIN materias ON materias.Id_Materia = cursos.Id_Materia WHERE cursos.Id_Materia = '$op' && Numero_Control = '$clave' && cursos.Id_Periodo = '$per';";
		$ans = mysqli_query($con,$sql);
		$res = mysqli_fetch_array($ans);
		$nom=$res["Nombre_Materia"];
		$teoricas=$res["H_Teoricas"];
		$practicas=$res["H_Prcaticas"];
		echo "<p class='title'>".utf8_encode($nom)."| horas teóricas: ".$teoricas." horas practicas: ".$practicas."</p>";
		?>

		<?php
		//imprime cabecera secundaria de presentación.
		include ("../../conexion.php");
		$clave=$_SESSION["clave"];
		$op=$_POST["slc_op"];
		$per = $_POST["hdn-periodo"];
		$sql ="SELECT Nombre_Catedratico, A_Paterno, A_Materno FROM cursos INNER JOIN catedratico ON catedratico.Id_Catedratico = cursos.Id_Catedratico WHERE cursos.Id_Materia = '$op' && Numero_Control = '$clave' && cursos.Id_Periodo = '$per';";
		$ans = mysqli_query($con,$sql);
		$res = mysqli_fetch_array($ans);
		$cat=$res["Nombre_Catedratico"];
		$pat=$res["A_Paterno"];
		$mat=$res["A_Materno"];
		echo "<p class='sub-title'>".utf8_encode($cat)." ".utf8_encode($pat)." ".utf8_encode($mat)."</p>";
		echo "<p class='alt-title'>".$op."</p>";
		?>
		<tr>
			<th class="head">Tema</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>final</th>
		</tr>
		<tr>
			<th class="head">Calificación</th>
			<?php
		    error_reporting(E_ALL^E_WARNING);
		    //imprime los números que representan a las unidades.
		    include ("../../conexion.php");
		    $clave=$_SESSION["clave"];
		    $op=$_POST["slc_op"];
		    $per = $_POST["hdn-periodo"];
		    $sql = "SELECT 1_Parcial, 2_Parcial, 3_Parcial, 4_Parcial, 5_Parcial, 6_Parcial, 7_Parcial, 8_Parcial FROM cursos WHERE Numero_control = '$clave' && Id_Materia = '$op' && Id_Periodo = '$per';";
		    $ans = mysqli_query($con,$sql);
		    $res =  mysqli_fetch_assoc($ans);
		    $primero = $res["1_Parcial"];
		    $segundo = $res["2_Parcial"];
		    $tercero = $res["3_Parcial"];
		    $cuarto = $res["4_Parcial"];
		    $quinto = $res["5_Parcial"];
		    $sexto = $res["6_Parcial"];
		    $septimo = $res["7_Parcial"];
		    $octavo = $res["8_Parcial"];
		    if ($primero === NULL) {
		    	$primero = "---";
		    }
		    if ($segundo === NULL) {
		    	$segundo = "---";
		    }
		    if ($tercero === NULL) {
		    	$tercero = "---";
		    }
		    if ($cuarto === NULL) {
		    	$cuarto = "---";
		    }
		    if ($quinto === NULL) {
		    	$quinto = "---";
		    }
		    if ($sexto === NULL) {
		    	$sexto = "---";
		    }
		    if ($septimo === NULL) {
		    	$septimo = "---";
		    }
		    if ($octavo === NULL) {
		    	$octavo = "---";
		    }

		    echo"<td>$primero</td><td>$segundo</td><td>$tercero</td><td>$cuarto</td><td>$quinto</td><td>$sexto</td><td>$septimo</td><td>$octavo</td><td class='average'></td>";
		    ?>
		</tr>
	</table>
</body>
<html>