<?php
include ("../../conexion.php"); 
  $cla = $_POST["num"];
  $pass = $_POST["pass"];

  $sql = "UPDATE alumno SET Password = '$pass' WHERE Numero_Control = '$cla'";
  $ans = mysqli_query($con,$sql);

  if ($ans) {
  	
  	$contexto = "4";
  	header("location:../../index.php?nivel=alumno&context=$contexto");
  }
 else
  {
    
    $contexto = "4";
  	header("location:../registro-alumno.php?context=$contexto");
  }
?>