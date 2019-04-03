/*
* Agregado para EJ - 3
*/

ALTER TABLE curso ADD iddocente INTEGER;
ALTER TABLE curso ADD FOREIGN KEY (iddocente) REFERENCES docente (identificador);


CREATE TABLE historia_academica(
    idalumno integer REFERENCES alumno (identificador),
    idcarrera integer REFERENCES carrera (identificador),
    idcurso integer REFERENCES curso (identificador,
    estado SMALLINT NO NULL,
    nota SMALLINT,
    fecha DATE
)