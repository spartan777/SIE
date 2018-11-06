<?php
  include ("../../conexion.php");
  $cla = $_POST["cla"];
  $pass = $_POST["pass"];
  $sql = "SELECT * FROM catedratico WHERE Id_Catedratico = '$cla' && Password = '$pass'";
  $ans = mysqli_query($con,$sql);
  $res = mysqli_fetch_array($ans);
  if ($res) {
	$clave=$res["Id_Catedratico"];
	$nombre=$res["Nombre_Catedratico"];
	session_start();
	$_SESSION["clave"]=$clave;
	$_SESSION["nombre"]=$nombre;
	header("location:../home.php");
  }
  else{
	$contexto="1";
	header("location:../../index.php?nivel=docente&context=$contexto");
  }
?>