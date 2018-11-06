<?php
include ("../../conexion.php");
$documento = $_POST["documento"];
$clave = $_COOKIE["valor"];
$sql = "SELECT Nombre_Alumno,A_Paterno,A_Materno,Nombre_Carrera FROM alumno INNER JOIN carreras ON carreras.Id_Plan = alumno.Id_Plan WHERE Numero_Control = '$clave';";
$ans = mysqli_query($con,$sql);
$res = mysqli_fetch_array($ans);

if ($res) {

  $nombre=$res["Nombre_Alumno"];
  $paterno=$res["A_Paterno"];
  $materno = $res["A_Materno"];
  $carrera = $res["Nombre_Carrera"];

  header("location:formulario-peticion.php?nombre=$nombre&paterno=$paterno&materno=$materno&carrera=$carrera&documento=$documento&clave=$clave");

}else{

	$mensaje = "Número inexistente";
	$clave = $mensaje;
	header("location:formulario-peticion.php?clave=$clave&documento=$documento");
}
?>