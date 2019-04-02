/*
﻿----EJERCICIOS
-- SOLO ES REQUERIDO REALIZAR LOS EJERCICIOS DE COMPLEJIDAD BAJA, realizar los demas ejercicios serán puntos extras para la evaluación del examen.


--- EJERCICIO 1 - COMPLEJIDAD BAJA: 
--Realizar una consulta para consultar todos los alumnos existentes, mostrar: TipoDoc, Documento, Nombre, Apellido, Legajo.
*/
SELECT persona.tipodoc, persona.documento, persona.nombre, persona.apellido, alumno.legajo FROM alumno INNER JOIN persona ON alumno.idpersona = persona.identificador;


/*
--- EJERCICIO 2 - COMPLEJIDAD BAJA: 
--Realizar una consulta para consultar todas las carreras a la que un alumno esta inscripto, mostrar: Legajo, nombre, apellido, nombre carrera, fechainscripcioncarrera
--ordenado por legajo descendiente
*/
SELECT alumno.legajo, persona.nombre, persona.apellido , carrera.nombre , inscripciones_carrera.fechainscripcion
FROM (((inscripciones_carrera
INNER JOIN carrera ON inscripciones_carrera.idcarrera = carrera.identificador)
INNER JOIN alumno ON inscripciones_carrera.idalumno = alumno.identificador)
INNER JOIN persona ON alumno.idpersona = persona.identificador) ORDER BY alumno.legajo DESC;

/*
--- EJERCICIO 3 - COMPLEJIDAD MEDIA: 
--Realizar una consulta para consultar la cantidad de inscriptos por curso, mostrando: nombre carrera, nombre curso, cantidad inscriptos, cupo máximo por curso
*/
SELECT curso.nombre , carrera.nombre, COUNT(inscripciones_curso.idcurso), curso.cupomaximo
FROM ((curso
INNER JOIN carrera ON curso.idcarrera = carrera.identificador) 
INNER JOIN inscripciones_curso ON inscripciones_curso.idcurso = curso.identificador) GROUP BY curso.nombre, carrera.nombre, curso.cupomaximo;

/*
--- EJERCICIO 4 - COMPLEJIDAD ALTA: 
--Sobre la consulta anterior (copiar y pegarla y modificarla) modificar la sql para que la consulta retorne solo los cursos cuya cantidad de inscripciones 
--supera su cupo maximo
*/
SELECT curso.nombre , carrera.nombre, COUNT(inscripciones_curso.idcurso), curso.cupomaximo
FROM ((curso
INNER JOIN carrera ON curso.idcarrera = carrera.identificador) 
INNER JOIN inscripciones_curso ON inscripciones_curso.idcurso = curso.identificador)
GROUP BY curso.nombre, carrera.nombre, curso.cupomaximo
HAVING COUNT(inscripciones_curso.idcurso) > curso.cupomaximo;

/*
--- EJERCICIO 5 -  COMPLEJIDAD BAJA: 
-- actualizar todos las cursos que posean anio 2018 y cuyo cupo sea menor a 5, y actualizar el cupo de todos ellos a 10.
*/
UPDATE curso
SET cupomaximo = 10
WHERE anio = 2018;

/*
--- EJERCICIO 6 -  COMPLEJIDAD ALTA: 
-- actualizar todas las fechas de inscripcion a cursados que posean el siguiente error: la fecha de inscripcion al cursado de un 
-- alumno es menor a la fecha de inscripcion a la carrera. La nueva fecha que debe tener es la fecha del dia. Se puede hacer en dos pasos, primero
-- realizando la consulta y luego realizando el update manual
-- SELECT FROM inscripciones_curso.fechainscripcion, inscripciones_carrera.fechainscripcion FROM (inscripciones_curso INNER JOIN inscripciones_carrera ON inscripciones_curso.idalumno = inscripciones_carrera.idalumno);

--- EJERCICIO 7 - COMPLEJIDAD BAJA:  
--INSERTAR un nuevo registro de alumno con tus datos personales, (hacer todos inserts que considera necesario)
*/
INSERT INTO persona
VALUES (6,'DNI', 35583274, 'Ignacio', 'Moya', '1991-01-17');
    
INSERT INTO alumno
VALUES (6, 6, 40022);

/*
--- EJERCICIO 8 -  COMPLEJIDAD BAJA: 
-- si se desea comenzar a persistir de ahora en mas el dato de direccion de un alumno y considerando que este es un único cambio string de 200 caracteres.
-- Determine sobre que tabla seria mas conveniente persistir esta información y realizar la modificación de estructuras correspondientes.
*/
/**
* Acá decidí incluir la columna dirección en la tabla persona porque me pareció que a futuro podría ser más útil.
* Por ejemplo, si  se desea incluir la tabla docente, y la direccion del docente tambien es un dato reelevante.
* No habria columnas repetidas en las tablas alumno y docente. Basta simplemente con la tabla persona.
*/
ALTER TABLE persona ADD direccion VARCHAR(200) DEFAULT NULL;
