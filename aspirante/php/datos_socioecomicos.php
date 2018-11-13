<?php
error_reporting(E_ALL^E_NOTICE);
$context = $_GET["context"];
$id = $_GET["id"];
/*$opcion = $_GET["opcion"];
$inicio = $_GET["inicio"];
$fin = $_GET["fin"];*/
?>
<script type="text/javascript">var con = "<?php echo $context;?>"; var opcion = "<?php echo $opcion;?>"; var inicio = "<?php echo $inicio;?>"; var fin = "<?php echo $fin;?>";</script>
<div class="main">
	<p class="alt-sub">Datos Socioeconómicos!</p>
	<hr class="cont-div">
	<form class="form-asp" action="php/save_socioeconomicos.php" method="POST"><!--formulario de salida para el flujo de los aspirantes-->
    <label>¿Cual es el nivel máximo de estudios alcanzado por tus padres aunque hayan fallecido?</label><br>
    <label>Padre:</label><br>
    <select class="select" name="maximo_estudios_padre" required>
      <option value=""></option>
      <option value="no_se">No lo sé</option>
			<option value="no_sabe_leer_escribir">No sabe leer ni escribir</option>
      <option value="no_fue_escuela">No fue a la escuela</option>
      <option value="no_termino_primaria">No terminó la Primaria</option>
      <option value="termino_primaria">Terminó la Primaria</option>
      <option value="capacitacion_tecnica_primaria">Tiene alguna capacitación técnica después de la Primaria</option>
      <option value="no_termino_secundaria">No terminó la Secundaria</option>
      <option value="termino_secuandaria">Terminó la Secundaria</option>
      <option value="capacitacion_tecnica_secuandaria">Tiene alguna capacitación técnica después de la Secundaria</option>
      <option value="tecnico_prof_incompleto">Tiene estudios de técnico profesional incompletos</option>
      <option value="tecnico_prof_completo">Tiene estudios de técnico profesional completos</option>
      <option value="no_termino_prepa">No terminó la Preparatoria o Bachillerato</option>
      <option value="preparatoria">Terminó la Preparatoria o Bachillerato</option>
      <option value="no_termino_licenciatura">No terminó la Licenciatura, Ingeniería o Normal</option>
      <option value="termino_licenciatura">Terminó la Licenciatura, Ingeniería o Normal</option>
      <option value="no_termino_maestria">No terminó la Maestría o Doctorado</option>
      <option value="termino_maestria">Terminó la Maestría o Doctorado</option>
      <option value="otro">Otro</option>
	  </select><br>
    <label>Madre:</label><br>
    <select class="select" name="maximo_estudios_madre" required>
      <option value=""></option>
			<option value="no_se">No lo sé</option>
			<option value="no_sabe_leer_escribir">No sabe leer ni escribir</option>
      <option value="no_fue_escuela">No fue a la escuela</option>
      <option value="no_termino_primaria">No terminó la Primaria</option>
      <option value="termino_primaria">Terminó la Primaria</option>
      <option value="capacitacion_tecnica_primaria">Tiene alguna capacitación técnica después de la Primaria</option>
      <option value="no_termino_secundaria">No terminó la Secundaria</option>
      <option value="termino_secuandaria">Terminó la Secundaria</option>
      <option value="capacitacion_tecnica_secuandaria">Tiene alguna capacitación técnica después de la Secundaria</option>
      <option value="tecnico_prof_incompleto">Tiene estudios de técnico profesional incompletos</option>
      <option value="tecnico_prof_completo">Tiene estudios de técnico profesional completos</option>
      <option value="no_termino_prepa">No terminó la Preparatoria o Bachillerato</option>
      <option value="preparatoria">Terminó la Preparatoria o Bachillerato</option>
      <option value="no_termino_licenciatura">No terminó la Licenciatura, Ingeniería o Normal</option>
      <option value="termino_licenciatura">Terminó la Licenciatura, Ingeniería o Normal</option>
      <option value="no_termino_maestria">No terminó la Maestría o Doctorado</option>
      <option value="termino_maestria">Terminó la Maestría o Doctorado</option>
      <option value="otro">Otro</option>
	  </select><br>
    <label>¿Con quien vives actualmente?</label><br>
    <select class="select" name="vives_con" onchange="habilitarVivesCon(this);" required>
      <option value=""></option>
      <option value="padre_madre">Padre y Madre</option>
      <option value="padre">Padre</option>
      <option value="madre">Madre</option>
      <option value="hermanos">Hermanos</option>
      <option value="pareja">Cónyuge o pareja</option>
      <option value="otro_familiar">Otro familiar</option>
      <option value="amigo">Amigo o amigos</option>
      <option value="solo">Sólo</option>
      <option value="hijos">Hijos</option>
      <option value="otro">Otro</option>
	  </select><br>
    <input class="in-inp" type="text" name="especifique_vives_con" id="especifique_vives_con" maxlength="30" disabled></input><br>
    <label>¿Cuales son los ingresos familiares?</label><br>
    <label>Padre:</label><br>
    <input class="in-inp" type="text" name="ingresos_padre" maxlength="6" required></input><br>
    <label>Madre:</label><br>
    <input class="in-inp" type="text" name="ingresos_madre" maxlength="6"></input><br>
    <label>Hermanos:</label><br>
    <input class="in-inp" type="text" name="ingresos_hermanos" maxlength="6"></input><br>
    <label>Propio:</label><br>
    <input class="in-inp" type="text" name="ingresos_propios" maxlength="6"></input><br>
    <label>Otros:</label><br>
    <input class="in-inp" type="text" name="ingresos_otros" maxlength="6"></input><br>

    <label>¿Cuál es la ocupación de tus padre o tutores?</label><br>
    <label>Padre:</label><br>
    <select class="select" name="ocupacion_padre" onchange="habilitarOcupacionPadre(this);" required>
      <option value=""></option>
      <option value="no_se">No lo sé</option>
      <option value="labores_hogar">Labores del Hogar</option>
      <option value="dueno_negocio">Dueño de negocio, empresa, despacho o comercio estable</option>
      <option value="profesor">Profesor, investigador.</option>
      <option value="profesional">Profesional que ejerce por su cuenta</option>
      <option value="obrero">Obrero</option>
      <option value="ganadero">Ganadero, agricultor o similar</option>
      <option value="campesino">Campesino, jornalero, pescador o similar</option>
      <option value="jubilado">Jubilado o pensionado</option>
      <option value="gerente">Funcionario o Gerente de empresa privada</option>
      <option value="funcionario">Funcionario de empresa pública</option>
      <option value="empleado">Empleado, oficinista o secretaría de empresa privada</option>
      <option value="burocrata">Burócrata, oficinista o secretaria de empresa pública</option>
      <option value="trabajador">Trabajador de oficio con personal a su cargo</option>
      <option value="vendedor_comercio">Vendedor en comercio o empresa</option>
      <option value="vendedor_ambulante">Vendedor por su cuenta o ambulante</option>
      <option value="peon">Peón, ayudante, mozo o empleada doméstica</option>
      <option value="miembro">Miembro de las fuerzas armadas</option>
      <option value="otro">Otro</option>
    </select><br>
    <input class="in-inp" type="text" name="especifique_ocupacion_padre" id="especifique_ocupacion_padre" maxlength="50" disabled></input><br>

    <label>Madre:</label><br>
    <select class="select" name="ocupacion_madre" onchange="habilitarOcupacionMadre(this);" required>
      <option value=""></option>
      <option value="no_se">No lo sé</option>
      <option value="labores_hogar">Labores del Hogar</option>
      <option value="dueno_negocio">Dueño de negocio, empresa, despacho o comercio estable</option>
      <option value="profesor">Profesor, investigador.</option>
      <option value="profesional">Profesional que ejerce por su cuenta</option>
      <option value="obrero">Obrero</option>
      <option value="ganadero">Ganadero, agricultor o similar</option>
      <option value="campesino">Campesino, jornalero, pescador o similar</option>
      <option value="jubilado">Jubilado o pensionado</option>
      <option value="gerente">Funcionario o Gerente de empresa privada</option>
      <option value="funcionario">Funcionario de empresa pública</option>
      <option value="empleado">Empleado, oficinista o secretaría de empresa privada</option>
      <option value="burocrata">Burócrata, oficinista o secretaria de empresa pública</option>
      <option value="trabajador">Trabajador de oficio con personal a su cargo</option>
      <option value="vendedor_comercio">Vendedor en comercio o empresa</option>
      <option value="vendedor_ambulante">Vendedor por su cuenta o ambulante</option>
      <option value="peon">Peón, ayudante, mozo o empleada doméstica</option>
      <option value="miembro">Miembro de las fuerzas armadas</option>
      <option value="otro">Otro</option>
    </select><br>
    <input class="in-inp" type="text" name="especifique_ocupacion_madre" id="especifique_ocupacion_madre" maxlength="50" disabled></input><br>
    <label>¿De quien dependes económicamente?</label><br>
    <select class="select" name="dependencia_economica" required>
      <option value=""></option>
      <option value="padre_madre">Padre y Madre</option>
      <option value="padre_madre_yo">Padre y Madre y Yo mismo</option>
      <option value="padre">Padre</option>
      <option value="padre_yo">Padre y Yo mismo</option>
      <option value="madre">Madre</option>
      <option value="madre_yo">Madre y Yo mismo</option>
      <option value="hermanos">Hermanos</option>
      <option value="hermanos_yo">Hermanos y Yo mismo</option>
      <option value="pareja">Cónyuge o pareja</option>
      <option value="pareja_yo">Cónyuge, pareja y Yo mismo</option>
      <option value="otro_familiar">Otro familiar o amigo</option>
      <option value="yo">Yo mismo</option>
      <option value="otro">Otro</option>
    </select><br>
    <label>¿La casa donde vives es?</label><br>
    <select class="select" name="vivienda_es" required>
      <option value=""></option>
      <option value="propia">Propia</option>
      <option value="rentada">Rentada</option>
      <option value="prestada">Prestada</option>
      <option value="pagando">Se está pagando</option>
      <option value="otro">Otro</option>
    </select><br>
    <label>¿Cuántos cuartos tiene esa casa, sin contar baños ni pasillos?</label><br>
    <select class="select" name="cuartos_casa" required>
      <option value=""></option>
      <option value="1">Uno</option>
      <option value="2">Dos</option>
      <option value="3">Tres</option>
      <option value="4">Cuatro</option>
      <option value="5">Cinco</option>
      <option value="6">Seis</option>
      <option value="7">Siete</option>
      <option value="8">Ocho</option>
      <option value="9">Nueve</option>
      <option value="10">Más de nueve</option>
    </select><br>
    <label>¿Cuántas personas viven en esa casa?</label><br>
    <select class="select" name="cuantos_viven_casa" required>
      <option value=""></option>
      <option value="1">Uno</option>
      <option value="2">Dos</option>
      <option value="3">Tres</option>
      <option value="4">Cuatro</option>
      <option value="5">Cinco</option>
      <option value="6">Seis</option>
      <option value="7">Siete</option>
      <option value="8">Ocho</option>
      <option value="9">Nueve</option>
      <option value="10">Más de nueve</option>
    </select><br>
    <label>¿ Cuátas personas incluyéndote a ti, depende económicamente de su principal apoyo o sustento?</label><br>
    <select class="select" name="personas_dependientes" required>
      <option value=""></option>
      <option value="1">Uno</option>
      <option value="2">Dos</option>
      <option value="3">Tres</option>
      <option value="4">Cuatro</option>
      <option value="5">Cinco</option>
      <option value="6">Seis</option>
      <option value="7">Siete</option>
      <option value="8">Ocho</option>
      <option value="9">Nueve</option>
      <option value="10">Más de nueve</option>
    </select><br>
	  <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <br>
	  <input class="submit-asp" type="submit" value="Siguiente">
	</form>
	<div>
		<p id="contexto" class="contexto"></p>
		<script src="javascript/men-contexto.js"></script>
	</div>
</div>
<a style="color:black;" href="../index.php?nivel=aspirante">Página Inicio?</a>
