<hr>
<form action="php/alta-usuario.php" method="POST">
	<label>Ingresa una contraseña.</label>
	<input type="hidden" name="num" value="<?php echo $_SESSION['id']; ?>">
	<input type="password" name="pass" maxlength="10" required>
	<input class="submit-two" type="submit" value="registrame.">
</form>