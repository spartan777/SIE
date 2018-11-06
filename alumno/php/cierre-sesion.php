<?php
 session_start();
 unset($_SESSION["clave"]);
 unset($_SESSION["nombre"]);
 $contexto = "2";
 header("location:../../index.php?nivel=alumno&context=$contexto");
?>