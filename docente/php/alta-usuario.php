<?php
include ("../../conexion.php"); 
  $cla = $_POST["num"];
  $pass = $_POST["pass"];

  $sql = "UPDATE catedratico SET Password = '$pass' WHERE Id_Catedratico = '$cla'";
  $ans = mysqli_query($con,$sql);

  if ($ans) {
  	
  	$contexto = "4";
  	header("location:../../index.php?nivel=docente&context=$contexto");
  }
 else
  {
    
    $contexto = "4";
  	header("location:../registro-docente.php?context=$contexto");
  }
?>