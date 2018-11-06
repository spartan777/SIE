<?php
$val = $_GET["val"];
switch ($val) {
	case "constancias":
	    echo "<p class='sub-title'>Formato de solicitud para ".$val.".</p>";
		echo "<form action='php/formulario-peticion.php' method='POST' target='frame'>
		        <select name='slc-docs'>
		          <option>Constancia para presentacion de examen de ingles</option>
		          <option>Constancia de avance reticular</option>
		          <option>Constancia para presentacion de examen especial</option>
		          <option>Constancia para presentacion de examen global</option>
		          <option>Constancia de estudios</option>
		          <option>Constancia de estudios de inglés</option>
		          <option>Constancia de liberación de residencia</option>
		          <option>Constancia de servicio social</option>
		          <option>Constancia de terminación de estudios</option>
		        </select><br>
		        <input class='submit' type='submit'value='ver formulario'>
		      </form>";
		break;

	case "cedulas":
		echo "<p>Formato de solicitud para ".$val.".</p>";
		echo "<form action='php/formulario-peticion.php' method='POST' target='frame'>
		        <select name='slc-docs'>
		          <option>Cédula de actividades extraescolares</option>
		          <option>Cédula de baja definitiva</option>
		          <option>Cédula de inscripción</option>
		          <option>Cédula de registro de admisión</option>
		          <option>Cédula de re-inscripción</option>
		          <option>Cédula para curso de inglés por módulo</option>
		          <option>Cédula para curso de inglés tradicional</option>
		          <option>Cédula para curso de titulación</option>
		          <option>Cédula para curso de verano</option>
		        </select><br>
		        <input class='submit' type='submit'value='seleccionar'>
		      </form>";
		break;

	case "cartas":
		echo "<p>Formato de solicitud para ".$val.".</p>";
		echo "<form action='php/formulario-peticion.php' method='POST' target='frame'>
		        <select name='slc-docs'>
		          <option>Carta de buena conducta</option>
		          <option>Carta de pasante</option>
		        </select><br>
		        <input class='submit' type='submit'value='seleccionar'>
		      </form>";
		break;

	case "kardex":
		echo "<p>Formato de solicitud para generación del ".$val.".</p>";
		echo "<form><br>
		      <input class='submit' type='submit' value='ver formato'>
		      </form>";
		break;

	case "boletas":
		echo "<p>Formato de solicitud para ".$val." por periodos.</p>";
		echo "<form>
		      <select>";
		      include ("php/periodos-boletas.php");
		echo "</select><br>
		      <input class='submit' type='submit' value='seleccionar'>
		      </form>";
		break;

	case "credencial":
		echo "<p>Formato de solicitud para generación de ".$val.".</p>";
		echo "<form><br>
		      <input class='submit' type='submit' value='ver formato'>
		      </form>";
		break;
	
	default:
		# code...
		break;
}
?>