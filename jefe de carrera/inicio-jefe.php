<div class="main">
	<p class="alt-sub">Ingresa tus datos!</p>
	<hr class="cont-div">
	<form class="in-ingreso" action="php/inicio-sesion.php" method="POST">
		<label>Clave de acceso.</label>
	    <input class="in-inp" type="text" name="num" maxlength="10" required>
	    <label>Contraseña.</label>
	    <input class="in-inp" type="password" name="pass" maxlength="10" required>
	    <input class="in-sub" type="submit" value="Ingresar">
    </form>
	<a href="registro-alumno.php">Registro?</a>
	<br>
	<br>
	<div id="mark">
		<p>
		<?php echo $contexto; ?>
		</p>
	</div>
	<script src="javascript/men-inicio.js"></script>
</div>
	