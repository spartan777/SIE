<?php
error_reporting(E_ALL^E_NOTICE);
include ("../../conexion.php");
date_default_timezone_set("America/Mexico_City");
$opcion = $_POST["opcion"];
$sql = "SELECT F_Inicio, F_Final FROM fechasaspirantes WHERE Nombre = '$opcion'";
$ans = mysqli_query($con,$sql);
$res = mysqli_fetch_array($ans);
$fecha = date("Y-m-d");
$inicio = $res["F_Inicio"];
$fin = $res["F_Final"];
// Specify the start date. This date can be any English textual format
$date_from = $inicio;
$date_from = strtotime($date_from); // Convert date to a UNIX timestamp
// Specify the end date. This date can be any English textual format
$date_to = $fin;
$date_to = strtotime($date_to); // Convert date to a UNIX timestamp
//create array
$calendario = array();
// Loop from the start date to end date and place all dates in array
for ($i=$date_from; $i<=$date_to; $i+=86400) {
	$date = date("Y-m-d", $i);
    $calendario[] = $date;
    //echo $date."<br>";
}
if (in_array($fecha, $calendario)) {
	if($opcion == 'pre-inscripcion'){
		header("location:../home.php?op=generales");
	}elseif ($opcion == 'inscripcion') {
		header("location:../../inscripcion/home.php");
	}

}else{

  $contexto = "1";
  header("location:../../index.php?nivel=aspirante&context=$contexto");
  //&opcion=$opcion&inicio=$inicio&fin=$fin
}

?>
