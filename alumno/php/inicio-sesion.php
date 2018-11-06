<?php
  include ("../../conexion.php");
  $num = $_POST["num"];
  $pass = $_POST["pass"];
  $sql = "SELECT * FROM alumno WHERE Numero_Control = '$num' && Password = '$pass'";
  $ans = mysqli_query($con,$sql);
  $res = mysqli_fetch_array($ans);
  if ($res) {
	$clave=$res["Numero_Control"];
	$nombre=$res["Nombre_Alumno"];
	session_start();
	$_SESSION["clave"]=$clave;
	$_SESSION["nombre"]=$nombre;
	header("location:../home.php");
  }
  else{
	$contexto="1";
	header("location:../../index.php?nivel=alumno&context=$contexto");
}
?>