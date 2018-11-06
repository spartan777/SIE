<?php
include ("../conexion.php");
session_start();
$clave=$_SESSION["clave"];
$sql = "SELECT * FROM detallealumno WHERE Numero_Control = '$clave' ORDER BY Num_Semestre";
$ans = mysqli_query($con,$sql);

while ($res = mysqli_fetch_array($ans)) {
	
	$per = $res["Id_Periodo"];

	echo "<a href=?op=calificaciones&per=$per>$per</a>";
}
?>