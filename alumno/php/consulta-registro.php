<?php
include ("../../conexion.php");
$numerodecontrol = $_POST["num"];
$sql = "SELECT * FROM alumno WHERE Numero_Control = '$numerodecontrol'";
$ans = mysqli_query($con,$sql);
$res = mysqli_fetch_array($ans);

if ($res) {
	$nombre = $res["Nombre_Alumno"];
	$clave = $res["Numero_Control"];
	$pass = $res["Password"];
	session_start();
	$_SESSION["id"] = $clave;//Esta variable de sesión impide enviar el número de control por la función header, y reduce la vulneravilidad del proceso.
	if ($pass === NULL) {
	    
	    $contexto = "2";
	    header("location:../registro-alumno.php?nom=$nombre&context=$contexto");
	}else{

		$contexto = "3";
		header("location:../registro-alumno.php?context=$contexto");
	}
}else{

	$contexto = "1";
	header("location:../registro-alumno.php?context=$contexto");
}
?>