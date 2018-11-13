<?php
//error_reporting(E_ALL^E_NOTICE);
include ("../../conexion.php");

$id = $_POST['id'];
$maximo_estudios_padre = $_POST['maximo_estudios_padre'];
$maximo_estudios_madre = $_POST['maximo_estudios_madre'];
$vives_con = $_POST['vives_con'];
$especifique_vives_con = isset($_POST['especifique_vives_con']) ? $_POST['especifique_vives_con']:"";
$ingresos_padre = $_POST['ingresos_padre'];
$ingresos_madre = $_POST['ingresos_madre'];
$ingresos_hermanos = isset($_POST['ingresos_hermanos']) ? $_POST['ingresos_hermanos']:"";
$ingresos_propios = isset($_POST['ingresos_propios']) ? $_POST['ingresos_propios']:"";
$ingresos_otros = isset($_POST['ingresos_otros']) ? $_POST['ingresos_otros']:"";
$ocupacion_padre = $_POST['ocupacion_padre'];
$especifique_ocupacion_padre = isset($_POST['especifique_ocupacion_padre']) ? $_POST['especifique_ocupacion_padre']:"";
$ocupacion_madre = $_POST['ocupacion_madre'];
$especifique_ocupacion_madre = isset($_POST['especifique_ocupacion_madre']) ? $_POST['especifique_ocupacion_madre']:"";
$dependencia_economica = $_POST['dependencia_economica'];
$vivienda_es = $_POST['vivienda_es'];
$cuartos_casa = $_POST['cuartos_casa'];
$cuantos_viven_casa = $_POST['cuantos_viven_casa'];
$personas_dependientes = $_POST['personas_dependientes'];

$sql = "INSERT INTO aspirantes_socioeconomicos (id_aspirante, nivel_estudios_padre,
       nivel_estudios_madre, vivienda_actual, vivienda_actual_especifique, ingresos_padre,
       ingresos_madre, ingresos_hermanos, ingresos_propio, ingresos_otros, ocupacion_padre,
       ocupacion_padre_especifique, ocupacion_madre, ocupacion_madre_especifique,
       dependencia_economica, vivienda_es, cuartos_casa, cuantos_viven_casa, personas_dependientes)
       VALUES ($id, '$maximo_estudios_padre', '$maximo_estudios_madre', '$vives_con', '$especifique_vives_con',
       '$ingresos_padre', '$ingresos_madre', '$ingresos_hermanos', '$ingresos_propios', '$ingresos_otros', '$ocupacion_padre',
       '$especifique_ocupacion_padre', '$ocupacion_madre', '$especifique_ocupacion_madre', '$dependencia_economica',
       '$vivienda_es', '$cuartos_casa', '$cuantos_viven_casa', '$personas_dependientes')";

$ans = mysqli_query($con,$sql);

if($ans){
  header("location:../home.php?op=contacto&id=$id");
}else{
  header("location:../home.php?op=domicilio&id=$id&context=error");
}
