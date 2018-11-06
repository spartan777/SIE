<?php
/*aqui se debe realizar una busqueda de los periodos para el uso del docente*/
$val = $_GET["val"];
switch ($val) {
	case "alta":
	    echo "<p class='sub-title'>Formato de ".$val." de calificaciones.</p>";
		echo "<form action='' method='POST' target='frame'>
		        <select name='slc-constancias'>
		        <option>Ejemplo de contenido...AGO-DIC2014</option>
		        </select><br>
		        <input class='submit' type='submit'value='ver formulario'>
		      </form>";
		break;

	case "consulta":
		echo "<p class='sub-title'>Formato para ".$val." de calificaciones.</p>";
		echo "<form form action='php/calificaciones.php' method='POST' target='frame'>
		        <select>
		        <option value=''>Ejemplo de contenido...AGO-DIC2014</option>
		        </select><br>
		        <input class='submit' type='submit'value='seleccionar'>
		      </form>";
		break;
}
?>