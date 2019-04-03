
#--- ESTRUCTURAS DE DATOS PARA MODELO SIMPLIFICADO DE "Alumno inscriptos en varios cursos de una carrera" ----


drop TABLE IF exists inscripciones_curso;
drop table IF exists inscripciones_carrera;
drop table IF exists curso;
drop TABLE IF exists carrera;
drop table IF exists alumno;
drop table IF exists docente;
drop table IF exists persona;


CREATE TABLE persona (
    identificador  integer PRIMARY KEY NOT NULL,
    tipodoc        char(5) NOT NULL,
    documento 	    bigint NOT NULL,    
    nombre       varchar(40) NOT NULL,
    apellido       varchar(40) NOT NULL,
    fechanac		date NOT NULL
);


CREATE TABLE alumno (
    identificador  integer PRIMARY KEY NOT NULL,
    idpersona	    integer UNIQUE REFERENCES persona (identificador),
    legajo 	    integer  UNIQUE NOT NULL
);

/*
* Agregado para EJ - 3
*/
CREATE TABLE docente (
    identificador  integer PRIMARY KEY NOT NULL,
    idpersona	    integer UNIQUE REFERENCES persona (identificador)
);

   
CREATE TABLE carrera (
    identificador  integer PRIMARY KEY NOT NULL,
    nombre       varchar(40) NOT NULL,
    descripcion      varchar(250),
    fechadesde		date NOT NULL,
    fechahasta 	date
);    

CREATE TABLE curso (
    identificador  integer PRIMARY KEY NOT NULL,
    idcarrera 		integer REFERENCES carrera (identificador),    
    nombre       varchar(40) NOT NULL,
    descripcion      varchar(250),
    cupomaximo 	smallint NOT NULL,
    anio			smallint NOT NULL   
);


CREATE TABLE inscripciones_carrera(
    idalumno 		integer NOT NULL REFERENCES alumno (identificador),
    idcarrera		integer NOT NULL REFERENCES carrera (identificador),
    fechainscripcion	date NOT NULL
);

CREATE TABLE inscripciones_curso(
    idalumno 		integer NOT NULL REFERENCES alumno (identificador),
    idcurso 		integer NOT NULL REFERENCES curso (identificador),
    fechainscripcion	date NOT NULL
);

/*
* Agregado para EJ - 3
*/

ALTER TABLE curso ADD iddocente INTEGER;
ALTER TABLE curso ADD FOREIGN KEY (iddocente) REFERENCES docente (identificador);


CREATE TABLE historia_academica(
    idalumno integer REFERENCES alumno (identificador),
    idcarrera integer REFERENCES carrera (identificador),
    idcurso integer REFERENCES curso (identificador),
    estado ENUM('libre', 'en curso', 'aprobado'),
    nota smallint,
    fecha date
);


#----- Insert de datos iniciales persona

   INSERT INTO persona VALUES
    (1,'DNI', 31565839, 'Florencia', 'Maneiro', '1985-06-28');
   INSERT INTO persona VALUES
    (2,'DNI', 31000123, 'Patricia', 'Brumatti', '1985-01-13');
    INSERT INTO persona VALUES
    (3,'DNI', 20945422, 'Diego', 'Menendez', '1982-04-10');   
    INSERT INTO persona VALUES
    (4,'DNI', 30999281, 'Franzo', 'Perez', '1986-02-05');
    INSERT INTO persona VALUES
    (5,'DNI', 24112872, 'Leandro', 'Garcia', '1988-01-03');
    INSERT INTO persona VALUES
    (6,'DNI', 11788114, 'Alberto', 'Einstein', '1960-11-03');
    

#----- Insert de datos iniciales alumno

   INSERT INTO alumno VALUES
    (1,3, 98734);
   INSERT INTO alumno VALUES
    (2,4, 09213);
   INSERT INTO alumno VALUES
    (3,1, 35839);
   INSERT INTO alumno VALUES
    (4,5, 36299);
   INSERT INTO alumno VALUES
    (5,2, 11009);
    
#----- Insert de datos iniciales de docente

    INSERT INTO docente VALUES
    (1,6);

#----- Insert de datos iniciales carrera


   INSERT INTO carrera VALUES
    (1,'Ingenieria en sistema de información', 'Carrera a fines a programación y desarrollo de software en general','1960-01-01', NULL);

   INSERT INTO carrera VALUES
    (2,'Ingenieria civil', 'Carrera a fines a construcción, planificación y desarrollo de obras de desarrollo urbano','1980-01-01', NULL);


#----- Insert de datos iniciales curso


   INSERT INTO curso VALUES
    (1,1,1,'Análisis matemático', 'Curso sobre el desarrollo avanzado de matemáticas', 5,2018);
    
  INSERT INTO curso VALUES
    (2,1,1,'Diseño de sistemas', 'Curso sobre diseño de componentes de sistemas de software', 3,2018);

  INSERT INTO curso VALUES
    (3,1,1,'Java', 'Curso sobre el lenguaje de programación JAVA', 4,2018);

  INSERT INTO curso VALUES
    (4,1,1,'Base de datos-SQL', 'Curso sobre tipos de base de datos y consultas sql', 10,2018);

  INSERT INTO curso VALUES
    (5,2,1,'Fisica básica', 'Curso sobre fundamentos base de física', 5,2018);

  INSERT INTO curso VALUES
    (6,2,1,'Dibujo', 'Curso sobre dibujo de planos', 10,2018);
    

#----- Insert de datos iniciales inscripciones

INSERT INTO inscripciones_carrera VALUES
(1,1,'2000-01-01');
INSERT INTO inscripciones_carrera VALUES
(2,1,'2003-01-01');
INSERT INTO inscripciones_carrera VALUES
(3,1,'2004-01-01');
INSERT INTO inscripciones_carrera VALUES
(4,1,'2001-01-01');

INSERT INTO inscripciones_carrera VALUES
(5,2,'2000-01-01');
INSERT INTO inscripciones_carrera VALUES
(4,2,'2000-01-01');


INSERT INTO inscripciones_curso VALUES
(1,1,'2002-01-01');
INSERT INTO inscripciones_curso VALUES
(1,2,'2006-01-01');
INSERT INTO inscripciones_curso VALUES
(1,3,'2002-01-01');
INSERT INTO inscripciones_curso VALUES
(2,1,'2004-01-01');
INSERT INTO inscripciones_curso VALUES
(2,3,'2002-01-01');
INSERT INTO inscripciones_curso VALUES
(2,4,'2004-01-01');
INSERT INTO inscripciones_curso VALUES
(3,1,'2010-01-01');
INSERT INTO inscripciones_curso VALUES
(3,3,'2010-01-01');
INSERT INTO inscripciones_curso VALUES
(4,1,'2010-01-01');
INSERT INTO inscripciones_curso VALUES
(4,3,'2010-01-01');
INSERT INTO inscripciones_curso VALUES
(5,3,'2010-01-01');

INSERT INTO inscripciones_curso VALUES
(4,3,'2010-01-01');
INSERT INTO inscripciones_curso VALUES
(5,4,'2011-01-01');
INSERT INTO inscripciones_curso VALUES
(4,4,'2011-01-01');
INSERT INTO inscripciones_curso VALUES
(2,5,'2011-01-01');
INSERT INTO inscripciones_curso VALUES
(2,6,'2011-01-01');

/**
*
*/
INSERT INTO historia_academica VALUES
(4, 1, 1, 'aprobado', 6, CURRENT_DATE);

INSERT INTO historia_academica VALUES
(4, 1, 1, 'aprobado', 6, CURRENT_DATE);

INSERT INTO historia_academica VALUES
(4, 1, 1, 'aprobado', 7, CURRENT_DATE);

INSERT INTO historia_academica VALUES
(4, 1, 1, 'aprobado', 9, CURRENT_DATE);

INSERT INTO historia_academica VALUES
(4, 5, 2, 'aprobado', 6, CURRENT_DATE);

INSERT INTO historia_academica VALUES
(4, 5, 2, 'aprobado', 10, CURRENT_DATE);

