<?php
  error_reporting(E_ALL ^ E_NOTICE);
  $op = $_GET["op"];
  switch ($op) {
    case 'calificaciones':
	  $contenido = "php/consulta-calificacion.php";
	  break;
	
	case 'horarios':
	  $contenido = "php/horarios.php";
	  break;
	
	case 'listas':
	  $contenido = "php/listas.php";
      break;
	
	default:
	  $contenido = "contenido-default.php";
	  break;
}
  session_start();
  if (isset($_SESSION["clave"])) {
	
  }
  else {
    $contexto ="3";
	header("location:../index.php?nivel=docente&context=$contexto");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIE|Docente</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<style type="text/css">
	    html,body{margin: 0;height: 100%;font-family: sans-serif;font-weight: lighter;width: 100%;}header{height: 70px;background-color: #1b396bff;}.img-logo{float: left; height: 70px;width: 70px;}/*.img-user{float:right;height:70px;width: 70px;position: absolute; visibility:visible;right: 272px;}*/.username{float: right;height: 70px;width: 200px;position: absolute; visibility: visible; right: 71px;background-color: #346cc0ff;color: #fff;display: table;}.username p{text-align:center;vertical-align: middle;display: table-cell;}.desp-salir{float:right;height: 70px;background-color:#1b396bff;width: 70px;border-left: solid 1px #fff;}.desp-salir p{text-align:center;font-size: 22px;color: #fff;cursor: pointer;vertical-align: middle;}nav {background-color:#5f8dd3ff;width: 100%;height: 60px;}ul{list-style-type: none;margin: 0;padding: 0;}li{display: inline-block;float: left;border-right: 1px solid #fff;min-width: 160px;}a{padding:19.9px 16px;display:block; text-align:center;font-size: 17px;color: #fff;text-decoration: none;}li a:hover{background-color: #346cc0ff;}.dropdown-content {display: none;position: absolute;background-color: rgb(27,57,107,0.5);min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 1;}.dropdown:hover .dropdown-content {display: block;}.dropdown-content a {color: #fff;padding: 12px 16px;text-decoration: none;display: block;text-align: center;}.op-salir{width: 271px;height: 0px;background-color:rgb(255,255,255,0.5);transition: 0.5s;overflow-y:hidden;text-align: center;position: absolute; visibility: visible; right: 0px; top: 70px;}.opcion{display: block;padding-top: 23px;text-decoration: none;color: #fff;}section{text-align: center;padding: 8px;}iframe{height:100%;width: 90%;margin-left: 5%;border:none;}.list {width: 92%;margin: auto;border-collapse: collapse;}td{border-bottom: 1px solid #ccccccff;height: 40px;font-size: 14px;color: #4d4d4dff;}th{font-weight: lighter;border-bottom: 1px solid #ccccccff;color: #5f8dd3ff;font-size: 25px;height: 40px;}tr:nth-child(even) {background-color: #ecececff;}.op-documentacion{height: 300px; width: 30%; background-color: black;border: 1px solid green;}.container-list{border:1px solid #ccccccff;border-radius: 15px;width: 94%;margin: auto;margin-top: 2.5%;}.divider{width: 95%;border: 0.5px solid #ccccccff;margin-bottom: 20px;}.name{text-align: left;}.title{font-size: 28px; font-weight: lighter;margin-top: 10px;margin-bottom: 10px;color: #999999ff;}.sub-title{color: #999999ff;}select{border: 1px solid #AAA;color: #555;font-size: inherit;height: 30px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;margin-bottom: 15px;}.submit{height: 40px;width:100px;border: none;background-color:#5fd35fff;color: #fff;font-family: 'Lobster',cursive;margin-bottom: 15px; font-size: 16px;}.average{color: #00ff00ff;}
	</style>
	<script src="javascript/desp-salir.js"></script>
</head>
<body>
	<header>
		<img class="img-logo" src="../logo-sie.svg">
		<!--<img class="img-user" src="../../img/logo-user.svg">-->
		<span title="Nombre del alumno" class="username">
			<p><?php echo $_SESSION["nombre"];?></p>
		</span>
		<div class="desp-salir" onclick="despSalir()">
			<p>&#x25BC;</p>
		</div>
	</header>
	<nav>
		<ul>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Calificaciones</a>
				<div class="dropdown-content">
					<a href="?op=calificaciones&val=alta">Alta</a>
					<a href="?op=calificaciones&val=consulta">Consulta</a>	
					</div><!--se debe buscar una lista diferente por opción ya que el elemento anchor se compone de la variable op segun sea el caso y el periodo ejem--><!--Ejemplo de contenido <a href="?op=cursos&per="$Id_Curso"><//?php echo $Id_Curso?></a>-->
			</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Horarios</a>
					<div class="dropdown-content">
						<?php include("php/periodos-horarios.php");?>
							
						</div>
				</li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Listas</a>
					<div class="dropdown-content">
						<?php include("php/periodos-listas.php");?>
					</div>
				</li>
		</ul>
	</nav>
	<div class="op-salir" id="op-salir">
		<a onclick="oculSalir()" class="opcion" href="php/cierre-sesion.php">Salir</a>
	</div>
	<section>
		<?php include($contenido);?>
			
		</section>
		<iframe name="frame" src="home-default.php"></iframe>
</body>
</html>