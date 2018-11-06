<?php
error_reporting(E_ALL^E_NOTICE);
$nivel = $_GET["nivel"];
switch ($nivel) {
	case 'jefe de carrera':
		$contenido = "jefe de carrera/inicio-jefe.php";
		$mensaje = "coordinacion";
		break;

	case 'docente':
		$contenido = "docente/inicio-docente.php";
		$mensaje = "docencia";
		break;

	case 'alumno':
		$contenido = "alumno/inicio-alumno.php";
		$mensaje = "alumnado";
		break;
	
	case 'aspirante':
		$contenido = "aspirante/inicio-asp.php";
		$mensaje = "aspirantes";
		break;
	
	default:
		$contenido = "formulario-nivel.php";
		$mensaje = "default";
		break;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>SIE|Bienvenido</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<script type="text/javascript">var men = "<?php echo $mensaje; ?>";</script>
	<style type="text/css">html,body{height: 100%; width: 100%; overflow: hidden; margin: 0; padding: 0; color: #fff; font-family: sans-serif; text-align: center;}.background{position: absolute;z-index: -1; top: 0;left: 0;right: 0;bottom: 0; height: 100%; background:linear-gradient(rgb(0, 51, 128,0.5),rgb(0, 0, 0,0.5)),url('IMG_20181001_183707.JPG');background-size: cover;}.block-left{position: absolute;left: 0%;background-image: url('logo-itsco.svg');background-position: center;background-size: contain; height: 90%; width: 49.9%;background-repeat: no-repeat;margin-top: 2.5%;opacity: 0.5;}.line-left{width: 200px;position: absolute;top:25%;left: 10%;}.line-right{width: 200px;position: absolute;top:25%;right: 10%;}.block-right{position: absolute;right: 0%; height: 90%; width: 49.9%; margin-top: 2.5%;border-left:1px solid white;}.brand{height: 50px;width: 50px;}.main-title{font-size: 30px;margin-top: 10%;}.sub-title{font-size: 18px;}.main{height: auto;width: 50%;margin-left: 25%;margin-top: 10%;background-color: rgb(255,255,255,0.5);}.alt-title{font-size: 30px;margin:0;padding-top:10px;font-family: 'Lobster',cursive;}.alt-sub{font-size: 18px;margin:0;padding-top: 10px;}.cont-div{width: 90%;margin-bottom: 30px;}form{text-align: left;width: 70%;margin:auto;}.submit{width: 60%; margin-left: 20%;margin-top: 10%;height: 40px;margin-bottom: 20px;background-color: #35B635;border: 2px solid #fff;color: #fff;font-size: 18px;}.in-ingreso{text-align: center;width: 70%;}.in-sub{width: 60%;margin-top: 10%;height: 40px;margin-bottom: 20px;background-color: #35B635;border: 2px solid #fff;color: #fff;font-size: 18px;}.in-inp{margin-top: 10px;margin-bottom: 10px; height: 25px;width: 90%;}.contexto{font-size: 17px;padding-top: 5px;padding-bottom: 5px;}.form-asp{text-align: center;}select{width: 90%;border: 1px solid #AAA;color: #555;font-size: inherit;height: 30px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;margin-bottom: 15px;}.submit-asp{margin-top: 3px;width: 40%;height: 30px;background-color:  #35B635;border: 2px solid #fff;color: #fff;margin-bottom: 18px;}</style>
</head>
<body>
	<div class="background"></div>
	<div class="block-left">
		<p class="main-title">SIEv1.0 ITSCO</p>
		<hr class="line-left">
		<img class="brand" src="logo-sie-brain.svg">
		<hr class="line-right">
		<p class="sub-title" id="custom-msg"></p>
		<script src="javascript/men-nivel.js"></script>
	</div>
	<div class="block-right">
		<?php include ($contenido); ?>
	</div>
</body>
</html>