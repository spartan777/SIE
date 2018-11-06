<?php
error_reporting(E_ALL^E_NOTICE);
$context = $_GET["context"];
?>
<script type="text/javascript">var con = "<?php echo $context; ?>"</script>
<div class="main">
	<p class="alt-sub">Ingresa tus datos!</p>
	<hr class="cont-div">
	<form class="in-ingreso" action="alumno/php/inicio-sesion.php" method="POST">
		<label>Número de control.</label>
	    <input class="in-inp" type="text" name="num" maxlength="10" required>
	    <label>Contraseña.</label>
	    <input class="in-inp" type="password" name="pass" maxlength="10" required>
	    <input class="in-sub" type="submit" value="Ingresar">
    </form>
	<a href="alumno/registro-alumno.php">Registro?</a>
	<br>
	<br>
	<div>
		<p id="contexto" class="contexto"></p>
		<script src="alumno/javascript/men-contexto.js"></script>
	</div>
</div>
<a href="index.php?nivel="">Página Inicio?</a>
