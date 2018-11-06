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
