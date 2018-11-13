<?php
//error_reporting(E_ALL^E_NOTICE);
include ("../../conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$domicilio = $_POST['domicilio'];
$calle = isset($_POST['calle']) ? $_POST['calle']:"";
$numero = isset($_POST['numero']) ? $_POST['numero']:"";
$colonia = isset($_POST['colonia']) ? $_POST['colonia']:"";
$cp = isset($_POST['cp']) ? $_POST['cp']:0;
$municipio = isset($_POST['municipio']) ? $_POST['municipio']:"";
$estado = isset($_POST['estado']) ? $_POST['estado']:"";
$telefono = $_POST['telefono'];
$lugar_trabajo = $_POST['lugar_trabajo'];
$telefono_trabajo = $_POST['telefono_trabajo'];

$sql = "INSERT INTO aspirantes_datos_contacto (id_aspirante, persona_contacto,
       domicilio_distinto, calle, numero, colonia, cp, municipio,
       estado, telefono, lugar_trabajo, telefono_trabajo)
       VALUES ($id, '$nombre', '$domicilio', '$calle', '$numero', '$colonia',
       $cp, '$municipio', '$estado', '$telefono', '$lugar_trabajo', '$telefono_trabajo')";

$ans = mysqli_query($con,$sql);

if($ans){
  header("location:../home.php?op=contacto&context=success&id=$id");
}else{
  header("location:../home.php?op=socioeconomicos&context=error&id=$id");
}
