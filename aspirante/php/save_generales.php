<?php
error_reporting(E_ALL^E_NOTICE);
include ("../../conexion.php");

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$nacimiento = $_POST['nacimiento'];
$edad = $_POST['edad'];
$nacionalidad = $_POST['nacionalidad'];
$especifique = isset($_POST['especifique']) ? $_POST['especifique']:"";
$opcion_1 = $_POST['opcion_1'];
$opcion_2 = $_POST['opcion_2'];
$procedencia = $_POST['procedencia'];
$tipo_escuela = $_POST['tipo_escuela'];
$egreso = $_POST['egreso'];
$promedio = $_POST['promedio'];

$sql = "INSERT INTO aspirantes_datos_generales
       (nombre, paterno, materno, fecha_nacimiento, edad, nacionalidad,
       otra_nacionalidad, id_carrera_1, id_carrera_2, escuela_procedencia,
       tipo_escuela, anio_egreso, promedio)
       VALUES ('$nombre', '$paterno', '$materno', '$nacimiento', $edad, '$nacionalidad',
       '$especifique', '$opcion_1', '$opcion_2', '$procedencia',
       '$tipo_escuela', $egreso, '$promedio')";

$ans = mysqli_query($con,$sql);

if($ans){
  $last_id = mysqli_insert_id($con);
  header("location:../home.php?op=domicilio&id=$last_id");
}else{
  header("location:../home.php?op=generales&context=error");
}
