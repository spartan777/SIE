<?php
session_start(); 
error_reporting(E_ALL^E_NOTICE);
$nombre = $_GET["nombre"];
$paterno = $_GET["paterno"];
$materno = $_GET["materno"];
$carrera = $_GET["carrera"];
$documento = $_GET["documento"];
$clave = $_GET["clave"];

if (empty($clave)) {
	
	$clave = $_SESSION["clave"];
}

$cons = $_POST["slc-docs"];
if (empty($cons)) {
	
	$cons=$documento;
}
?>
<!DOCTYPE html>
<html = lang>
<head>
	<meta charset="utf-8">
	<script type="text/javascript">var clave = "<?php echo $clave ?>";</script>
	<script src="../javascript/desp-ins.js"></script>
	<script src="../javascript/default-value.js"></script>
	<script src="../javascript/enable.js"></script>
	<script src="../javascript/search-value.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<style type="text/css">html,body{margin: 0;padding:0;height: 100%;width: 100%;font-family: sans-serif;}.container-docs{border:1px solid #ccccccff;border-radius: 15px;width: 80%;margin: auto;margin-top: 2.5%;height: 85%;}.title{font-size: 28px; font-weight: lighter;margin-top: 10px;margin-bottom: 10px;color: #999999ff;margin-left: 40px;}.divider{width: 95%;border: 0.5px solid #ccccccff;margin-bottom: 20px;}.part-one{position: absolute;left:10%;width: 39.9%;height: 70%;}.part-two{border-left: 1px solid #ccccccff;position: absolute;right:10%;width: 39.9%;text-align: center;height: 70%;}.part-three{cursor: pointer;border:1px solid #ccccccff;width: 94%;margin: auto;margin-top: 2.5%;text-align: left;color: #999999ff;height: 50px;}form{text-align: left;margin: auto;width: 70%;margin-top: 10px;}.block{height: 20px; width: 100%;background-color: #ecececff;border: none;margin-bottom: 10px;margin-top: 5px;}.main-ins{font-size: 20px; font-weight: lighter;margin-top: 10px;margin-bottom: 10px;color: #999999ff;}.sub{margin: auto;height: 40px;width:31%;border: none;background-color:#5fd35fff;color: #fff;font-family: 'Lobster',cursive;margin-bottom: 15px; font-size: 13px;margin-top: 10px;}label{font-size: 18px; font-weight: lighter;color: #999999ff;}.cambio{height: 20px;background-color: #d35f5fff;border:none;color: #fff}.ver{height: 20px;margin-left: 5px;background-color: #87de87ff;border:none;color:#fff;}.form-line{width: 100%;border: 0.5px solid #ccccccff;margin-bottom: 20px;}.alt-ins{width: 94%;margin: auto;margin-top: 1%;text-align:left;color: #999999ff;height:0px;transition: 0.5s;overflow-y:scroll; }.alt-ins p{font-size: 13px;}</style>
</head>
<body onload="defaultValues()">
	<div class="container-docs">
		<p class="title"><?php echo $cons; ?></p>
		<hr class="divider">
		<div class="part-one">
			<form action="" method="POST">
				<input type="hidden" name="documento" value="<?php $cons?>">
				<label>Número de control.</label><br>
				<input class="block" id="numerodecontrol" type="text" name="numerodecontrol" disabled value="<?php echo $clave; ?>"><br><button type="button" class="cambio" onclick="enableText()">cambiar</button><button type="submit" formaction="valida-datos.php" class="ver" onclick="cookieVariable()">ver</button>
				<input type="hidden" name="documento" value="<?php echo $cons; ?>">
				<br>
				<hr class="form-line">
				<label>Nombre(s).</label><br>
				<input class="block" type="text" name="nombre"  disabled value="<?php echo utf8_encode($nombre);?>"><br>
				<label>Apellido Materno.</label><br>
				<input class="block" type="text" name="paterno" disabled value="<?php echo utf8_encode($paterno);?>"><br>
				<label>Apellido Paterno.</label><br>
				<input class="block" type="text" name="materno" disabled value="<?php echo utf8_encode($materno);?>"><br>
				<label>Carrera.</label><br>
				<input class="block" type="text" name="carrera" disabled value="<?php echo utf8_encode($carrera);?>"><br>
				
				<input class="sub" type="submit" value="realizar petición">
				
			</form>
		</div>
		<div class="part-two">
			<p class="main-ins">Esta página no genera el formato de págo OVH,<br>el tiempo de espera para recepción<br>de constancias es de uno a tres días<br>hábiles</p>
			<a href="http://ovh.veracruz.gob.mx/ovh/index.jsp" target="blank">Página OVH?</a>
			<div class="part-three" onclick="despIns()"><p>Instrucciones para obtención de formato OVH.</p></div>
			<div class="alt-ins" id="alt-ins">
				<p>
				1.-Ingresa a la página OVH, (link en la parte superior).
				<br>
				2.-Ingresa al menú OPDs tecnológios, (Menú lateral izquierdo).
				<br>
				3.-Selecciona "menú de acceso directo a Institutos tecnológicos".
				<br>
				4.-Selecciona "Instituto tecnológico superior de cosamaloapan".
				<br>
				5.-Ingresa tu matricula, (Número de control ;v).
				<br>
				6.-Ingresa tu nombre y apellidos .
				<br>
				7.-Seleccione el municipio en donde produce efecto el acto jurídico; Ejem: 47.-COSAMALOAPAN.
				<br>
				8.-Seleccione la referencia (concepto) de pago; Ejem: Nombre del documento solicitado. <mark>recuerda que debe concordar con la petición hecha por el formulario anterior</mark>.
				<br>
				9.-Cantidad Base de cálculo; Ejem: 1.
				<br>
				10.-Agregar el concepto al folder de pagos, (botón azúl debajo de la referencia).
				<br>
				11.-Continuar, (botón gris al final de la página).
				<br>
				12.-Realizar el págo en alguna de las dependencias listadas en tu documento.
				<br>
				13.-Una vez realizado el págo, pasar a la oficina de ingresos propios del ITSCO.
				<br>
				14.-Con tu arancel en máno pasa a la oficina de servicios escolares (ventanilla) y pide tu documento.
			    </p>
			</div>
		</div>
	</div>
</body>
</html>
