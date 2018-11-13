CREATE DATABASE SIE;

USE SIE;

CREATE TABLE Administrador(
 Id_Admin VARCHAR (10) NOT NULL,
 Nombre_Admin VARCHAR (30) NOT NULL,
 A_Paterno VARCHAR (20) NOT NULL,
 A_Materno VARCHAR (20) NOT NULL,
 Password VARCHAR (10) NOT NULL,
 PRIMARY KEY (Id_Admin)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Periodos(
Id_Periodo VARCHAR (11) NOT NULL,
F_Inicio DATE,
F_Final DATE,
Estado VARCHAR (8) NOT NULL,
PRIMARY KEY (Id_Periodo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Carreras(
Id_Plan VARCHAR (13) NOT NULL,
Nombre_Carrera VARCHAR (38) NOT NULL,
Des_Carrera VARCHAR (50),
H_Teoricas INT (3) NOT NULL,
H_Practicas INT (3) NOT NULL,
Creditos INT (3) NOT NULL,
PRIMARY KEY (Id_Plan)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Aulas(
Id_Aula VARCHAR (4) NOT NULL,
Nombre_Aula VARCHAR (20) NOT NULL,
PRIMARY KEY (Id_Aula)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Grupos(
Id_Grupo VARCHAR (5) NOT NULL,
Participantes VARCHAR (2) NOT NULL,
PRIMARY KEY (Id_Grupo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE JefeCarrera(
Id_JefeCarrera VARCHAR (10) NOT NULL,
Nombre_Jefe VARCHAR (30) NOT NULL,
A_Paterno VARCHAR (20) NOT NULL,
A_Materno VARCHAR (20) NOT NULL,
Password VARCHAR (10),
Id_Plan VARCHAR (13) NOT NULL,
PRIMARY KEY (Id_jefeCarrera),
FOREIGN KEY (Id_Plan) REFERENCES Carreras (Id_Plan)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Materias(
Id_Materia VARCHAR (8) NOT NULL,
Nombre_Materia VARCHAR (53) NOT NULL,
Pos_Reticula VARCHAR (2) NOT NULL,
H_Teoricas INT (2) NOT NULL,
H_Prcaticas INT (2) NOT NULL,
Creditos INT (2) NOT NULL,
Id_Periodo VARCHAR (11) NOT NULL,
Id_plan VARCHAR (13) NOT NULL,
PRIMARY KEY (Id_Materia),
FOREIGN KEY (Id_Periodo) REFERENCES Periodos (Id_Periodo),
FOREIGN KEY (Id_Plan) REFERENCES Carreras (Id_plan)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Catedratico(
Id_Catedratico VARCHAR (10) NOT NULL,
Nombre_Catedratico VARCHAR (30) NOT NULL,
A_Paterno VARCHAR (20) NOT NULL,
A_Materno VARCHAR (20) NOT NULL,
Password VARCHAR (10),
Id_Plan VARCHAR (13) NOT NULL,
PRIMARY KEY (Id_Catedratico),
FOREIGN KEY (Id_Plan) REFERENCES Carreras (Id_Plan)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE DetallCatedratico(
Id_Catedratico VARCHAR (10) NOT NULL,
Turno VARCHAR (10) NOT NULL,
Id_Periodo VARCHAR (11) NOT NULL,
FOREIGN KEY (Id_Catedratico) REFERENCES Catedratico (Id_Catedratico),
FOREIGN KEY (Id_Periodo) REFERENCES Periodos (Id_Periodo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Alumno(
Numero_Control VARCHAR (10) NOT NULL,
Nombre_Alumno VARCHAR(30) NOT NULL,
A_Paterno VARCHAR (20) NOT NULL,
A_Materno VARCHAR (20) NOT NULL,
Password VARCHAR (10),
Id_Plan VARCHAR (13) NOT NULL,
PRIMARY KEY (Numero_Control),
FOREIGN KEY (Id_Plan) REFERENCES Carreras (Id_Plan)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE DetalleAlumno(
Numero_Control VARCHAR (10) NOT NULL,
Turno VARCHAR (10) NOT NULL,
Num_Semestre INT (2),
Let_Semestre VARCHAR (7) NOT NULL,
Id_Grupo VARCHAR (5) NOT NULL,
Id_Periodo VARCHAR (11) NOT NULL,
FOREIGN KEY (Numero_Control) REFERENCES Alumno (Numero_Control),
FOREIGN KEY (Id_Grupo) REFERENCES Grupos (Id_Grupo),
FOREIGN KEY (Id_Periodo) REFERENCES Periodos (Id_Periodo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Cursos(
Id_Materia VARCHAR (8) NOT NULL,
Id_Catedratico VARCHAR (10) NOT NULL,
Numero_Control VARCHAR (10) NOT NULL,
Id_Grupo VARCHAR (5) NOT NULL,
Id_Periodo VARCHAR (11) NOT NULL,
Tipo VARCHAR (10) NOT NULL,
Promedio INT (3),/*Calificacion y est_opcoion fueron agregadas*/
Est_Opcion VARCHAR (15),
1_Parcial INT (3),
2_Parcial INT (3),
3_Parcial INT (3),
4_Parcial INT (3),
5_Parcial INT (3),
6_Parcial INT (3),
7_Parcial INT (3),
8_Parcial INT (3),
FOREIGN KEY (Id_Periodo) REFERENCES Periodos (Id_Periodo),
FOREIGN KEY (Id_Materia) REFERENCES Materias (Id_Materia),
FOREIGN KEY (Id_Catedratico) REFERENCES Catedratico (Id_Catedratico),
FOREIGN KEY (Numero_Control) REFERENCES Alumno (Numero_Control),
FOREIGN KEY (Id_Grupo) REFERENCES Grupos (Id_Grupo)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE FechasParciales(
Id_Materia VARCHAR (8) NOT NULL,
Numero_Control VARCHAR (10) NOT NULL,
Id_Catedratico VARCHAR (10) NOT NULL,
Parcial INT (3) NOT NULL,
Fecha DATE NOT NULL,
Id_Periodo VARCHAR (11) NOT NULL,
FOREIGN KEY (Numero_Control) REFERENCES Alumno (Numero_Control),
FOREIGN KEY (Id_Catedratico) REFERENCES Catedratico (Id_Catedratico),
FOREIGN KEY (Id_Periodo) REFERENCES Periodos (Id_Periodo),
FOREIGN KEY (Id_Materia) REFERENCES Materias (Id_Materia)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Notificaciones(
Nombre VARCHAR (20) NOT NULL,
Fecha DATE NOT NULL,
Descripcion VARCHAR (50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE FechasAspirantes(
Nombre VARCHAR (15) NOT NULL,
F_Inicio DATE NOT NULL,
F_Final DATE NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--Tablas de aspirantes
CREATE TABLE `aspirantes_datos_contacto` (
  `id_aspirante` int(11) NOT NULL,
  `persona_contacto` varchar(50) NOT NULL,
  `domicilio_distinto` varchar(3) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `colonia` varchar(40) NOT NULL,
  `cp` int(5) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `estado` varchar(35) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `lugar_trabajo` varchar(50) NOT NULL,
  `telefono_trabajo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirantes_datos_generales`
--

CREATE TABLE `aspirantes_datos_generales` (
  `id_aspirante` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `paterno` varchar(30) NOT NULL,
  `materno` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(3) NOT NULL,
  `nacionalidad` varchar(11) NOT NULL,
  `otra_nacionalidad` varchar(15) NOT NULL,
  `id_carrera_1` varchar(5) NOT NULL,
  `id_carrera_2` varchar(5) NOT NULL,
  `escuela_procedencia` varchar(50) NOT NULL,
  `tipo_escuela` varchar(8) NOT NULL,
  `anio_egreso` int(4) NOT NULL,
  `promedio` varchar(4) NOT NULL,
  `secundaria_estudio` varchar(50) NOT NULL,
  `promedio_secundaria` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirantes_socioeconomicos`
--

CREATE TABLE `aspirantes_socioeconomicos` (
  `id_aspirante` int(11) NOT NULL,
  `nivel_estudios_padre` varchar(33) NOT NULL,
  `nivel_estudios_madre` varchar(33) NOT NULL,
  `vivienda_actual` varchar(15) NOT NULL,
  `vivienda_actual_especifique` varchar(30) NOT NULL,
  `ingresos_padre` varchar(6) NOT NULL,
  `ingresos_madre` varchar(6) NOT NULL,
  `ingresos_hermanos` varchar(6) NOT NULL,
  `ingresos_propio` varchar(6) NOT NULL,
  `ingresos_otros` varchar(6) NOT NULL,
  `ocupacion_padre` varchar(20) NOT NULL,
  `ocupacion_padre_especifique` varchar(50) NOT NULL,
  `ocupacion_madre` varchar(20) NOT NULL,
  `ocupacion_madre_especifique` varchar(50) NOT NULL,
  `dependencia_economica` varchar(15) NOT NULL,
  `vivienda_es` varchar(10) NOT NULL,
  `cuartos_casa` varchar(3) NOT NULL,
  `cuantos_viven_casa` varchar(3) NOT NULL,
  `personas_dependientes` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirante_datos_domicilio`
--

CREATE TABLE `aspirante_datos_domicilio` (
  `id_aspirante` int(11) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `estado` varchar(35) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `colonia` varchar(40) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `estado_civil` varchar(12) NOT NULL,
  `capacidad_diferente` varchar(11) NOT NULL,
  `especifique_capacidad` varchar(20) NOT NULL,
  `beca` varchar(3) NOT NULL,
  `especifique_beca` varchar(20) NOT NULL,
  `zona_procedencia` varchar(17) NOT NULL,
  `especifique_zona` varchar(20) NOT NULL,
  `oportunidades` varchar(3) NOT NULL,
  `nombre_padre` varchar(30) NOT NULL,
  `paterno_padre` varchar(30) NOT NULL,
  `materno_padre` varchar(30) NOT NULL,
  `vive_padre` varchar(3) NOT NULL,
  `nombre_madre` varchar(30) NOT NULL,
  `paterno_madre` varchar(30) NOT NULL,
  `materno_madre` varchar(30) NOT NULL,
  `vive_madre` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aspirantes_datos_contacto`
--
ALTER TABLE `aspirantes_datos_contacto`
  ADD PRIMARY KEY (`id_aspirante`);

--
-- Indices de la tabla `aspirantes_datos_generales`
--
ALTER TABLE `aspirantes_datos_generales`
  ADD PRIMARY KEY (`id_aspirante`);

--
-- Indices de la tabla `aspirantes_socioeconomicos`
--
ALTER TABLE `aspirantes_socioeconomicos`
  ADD PRIMARY KEY (`id_aspirante`);

--
-- Indices de la tabla `aspirante_datos_domicilio`
--
ALTER TABLE `aspirante_datos_domicilio`
  ADD PRIMARY KEY (`id_aspirante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aspirantes_datos_generales`
--
ALTER TABLE `aspirantes_datos_generales`
  MODIFY `id_aspirante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;
