/*
* Agregado para EJ - 3
*/
CREATE TABLE docente (
    identificador  integer PRIMARY KEY NOT NULL,
    idpersona	    integer REFERENCES persona (identificador) UNIQUE
);

ALTER TABLE curso ADD iddocente INTEGER;
ALTER TABLE curso ADD FOREIGN KEY (iddocente) REFERENCES docente (identificador);


CREATE TABLE historia_academica(
    idalumno integer REFERENCES alumno (identificador),
    idcarrera integer REFERENCES 
)