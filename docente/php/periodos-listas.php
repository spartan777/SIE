<?php
include ("../conexion.php");
session_start();
$clave=$_SESSION["clave"];
$sql = "SELECT Id_Periodo FROM detallcatedratico WHERE Id_Catedratico = '$clave';";
$ans = mysqli_query($con,$sql);

while ($res = mysqli_fetch_array($ans)) {
	
	$per = $res["Id_Periodo"];

	echo "<a href=?op=listas&per=$per>$per</a>";
}
?>