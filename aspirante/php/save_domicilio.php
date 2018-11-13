<?php
//error_reporting(E_ALL^E_NOTICE);
include ("../../conexion.php");

$id = $_POST['id'];
$calle = $_POST['calle'];
$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$cp = $_POST['cp'];
$colonia = $_POST['colonia'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$estado_civil = $_POST['estado_civil'];
$capacidad_diferente = $_POST['capacidad_diferente'];
$especifique_capacidad = isset($_POST['especifique_capacidad']) ? $_POST['especifique_capacidad']:"";
$beca = $_POST['beca'];
$especifique_beca = isset($_POST['especifique_beca']) ? $_POST['especifique_beca']:"";
$procedencia = $_POST['procedencia'];
$especifique_procedencia = isset($_POST['especifique_procedencia']) ? $_POST['especifique_procedencia']:"";
$oportunidades = $_POST['oportunidades'];
$nombre_padre = $_POST['nombre_padre'];
$paterno_padre = $_POST['paterno_padre'];
$materno_padre = $_POST['materno_padre'];
$vive_padre = $_POST['vive_padre'];
$nombre_madre = $_POST['nombre_madre'];
$paterno_madre = $_POST['paterno_madre'];
$materno_madre = $_POST['materno_madre'];
$vive_madre = $_POST['vive_madre'];

$sql = "INSERT INTO aspirante_datos_domicilio (id_aspirante, calle, estado, municipio,
       cp, colonia, correo, telefono, estado_civil, capacidad_diferente, especifique_capacidad,
       beca, especifique_beca, zona_procedencia, especifique_zona, oportunidades,
       nombre_padre, paterno_padre, materno_padre, vive_padre, nombre_madre,
       paterno_madre, materno_madre, vive_madre)
       VALUES ($id, '$calle', '$estado', '$municipio', $cp, '$colonia', '$correo', '$telefono',
       '$estado_civil', '$capacidad_diferente', '$especifique_capacidad', '$beca',
       '$especifique_beca', '$procedencia', '$especifique_procedencia', '$oportunidades',
       '$nombre_padre', '$paterno_padre', '$materno_padre', '$vive_padre', '$nombre_madre',
       '$paterno_madre', '$materno_madre', '$vive_madre')";


echo $sql;/*
$ans = mysqli_query($con,$sql);

if($ans){
  header("location:../home.php?op=socioeconomicos&id=$id");
}else{
  header("location:../home.php?op=domicilio&id=$id&context=error");
}
