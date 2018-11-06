<?php
include ("../../conexion.php");
$clavedeacceso = $_POST["cla"];
$sql = "SELECT * FROM catedratico WHERE Id_Catedratico = '$clavedeacceso'";
$ans = mysqli_query($con,$sql);
$res = mysqli_fetch_array($ans);


if ($res) {
	$nombre = $res["Nombre_Catedratico"];
	$clave = $res["Id_Catedratico"];
	$pass = $res["Password"];
	session_start();
	$_SESSION["id"] = $clave;//Esta variable de sesión impide enviar el número de control por la función header, y reduce la vulneravilidad del proceso.
	if ($pass === NULL) {
	    
	    $contexto = "2";
	    header("location:../registro-docente.php?nom=$nombre&context=$contexto");
	}else{

		$contexto = "3";
		header("location:../registro-docente.php?context=$contexto");
	}
}else{

	$contexto = "1";
	header("location:../registro-docente.php?context=$contexto");
}
?>