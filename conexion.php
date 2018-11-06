<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $bd = "sie";
  $con = new mysqli($server,$user,$pass,$bd);
  if ($con->connect_error ) {
    die("conexión fallida:".$con->connect_error);
}
?>