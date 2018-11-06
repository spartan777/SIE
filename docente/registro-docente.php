<?php
  error_reporting(E_ALL^E_NOTICE);
  $context = $_GET["context"];
  $nombre = $_GET["nom"];
  session_start();
  switch ($context) {
    case '2':
	  $content = "php/contenido-alta.php";
	  break;
	
	default:
	  $content = "php/contenido-alta-default.php";
	  break;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIE|REGISTRO</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<script type="text/javascript">var con = "<?php echo $context; ?>"; var nom = "<?php echo utf8_encode($nombre)?>";</script>
	<style type="text/css">
		html{width: 100%; height: 100%;}body{height: 100%; width: 100%; margin: 0;padding: 0;overflow: hidden;text-align: center;color: #fff;font-family: sans-serif;}.background{position: absolute;z-index: -1; top: 0;left: 0;right: 0;bottom: 0; height: 100%; background:linear-gradient(rgb(0, 51, 128,0.5),rgb(0, 0, 0,0.5)),url('../IMG_20181001_183707.JPG');background-size: cover;}.main-cont{height: auto;width: 50%;margin-left: 25%;margin-top: 10%;background-color: rgb(255,255,255,0.5);}form{text-align: center; width: 70%;margin: auto;padding: 20px;}hr{width: 80%;}.txt-main{font-size: 18px;margin:0;padding-top: 10px;}input{margin-top: 10px;margin-bottom: 10px; height: 25px;width: 90%;}.submit{width: 60%;margin-top: 10%;height: 40px;margin-bottom: 20px;background-color: #35B635;border: 2px solid #fff;color: #fff;font-size: 18px;}a{display: inline-block;margin-bottom: 10px;}.first{position: absolute;left: 0%;background-image: url('logo-itsco.svg');background-position: center;background-size: contain; height: 90%; width: 49.9%;background-repeat: no-repeat;margin-top: 2.5%;opacity: 0.5;}.second{position: absolute;right: 0%; height: 90%; width: 49.9%; margin-top: 2.5%;border-left:1px solid white;}.text-head{font-size: 30px;margin-top: 10%;}.logo{height: 50px;width: 50px;}.line-one{width: 200px;position: absolute;top:25%;left: 10%;}.line-two{width: 200px;position: absolute;top:25%;right: 10%;}.text-body{font-size: 18px;}.submit-two{width: 60%;margin-top: 5%;height: 40px;margin-bottom: 5px;background-color: #35B635;border: 2px solid #fff;color: #fff;font-size: 18px;}.contexto{font-size: 17px;padding-top: 5px;padding-bottom: 5px;}
	</style>
</head>
<body>
	<div class="background"></div>
	<div id="first" class="first">
		<p class="text-head">Comunidad electrónica del ITSCO.</p>
		<hr class="line-one">
		<img class="logo" src="logo-sie-brain.svg">
		<hr class="line-two">
		<p class="text-body">Registro directo con<br>encargado del departamento de servicios escolares.</p>
	</div>
	<div id="second" class="second">
	<div class="main-cont">
		<p class="txt-main">Ingresa tu clave de acceso!</p>
		<hr>
		<form action="php/consulta-registro.php" method="POST">
			<label>Clave de acceso.</label>
			<input type="text" name="cla" maxlength="10" required>
			<!--<label>Contraseña.</label>
			<input type="password" name="pass" maxlength="10" required>-->
			<input class="submit" type="submit" value="Buscar">
		</form>
		<a href="../index.php?nivel=docente">Pagina Ingreso?</a>
		<div>
			<p id="contexto" class="contexto"></p>
		</div>
		<script src="javascript/men-registro.js"></script>
		<div>
			<?php include ($content);?>
		</div>
	</div>
    </div>
</body>
</html>