CREATE DATABASE IF NOT EXISTS `bd_recursos` DEFAULT CHARACTER SET utf8;
USE `bd_recursos`;

CREATE TABLE usuario(
	id_usuario int AUTO_INCREMENT NOT NULL,
	nom_usuari VARCHAR (20) NULL,
	nickname_usuari VARCHAR (20) NULL,
	correo_usuari VARCHAR (20) NULL,
	password_usuari VARCHAR (20) NULL,
  tipo_usuario VARCHAR (10) NULL,

	PRIMARY KEY (id_usuario)
);

INSERT INTO  usuario(nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ("David Marin","dmarin","davidmarin@fje.com","qaz123qaz","admin");
INSERT INTO  usuario(nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ("Ignasi Romero","iromero","ignasiromero@fje.com","qaz123qaz","normal");
INSERT INTO  usuario(nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ("Fernando Manzano","fmanzano","nandimanzano@fje.com","qaz123qaz","normal");
INSERT INTO  usuario(nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ("Agnés Plans","aplans","agnesplans@fje.com","qaz123qaz","normal");
INSERT INTO  usuario(nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ("Sergio Jimenez","sjimenez","sergiojimenez@fje.com","qaz123qaz","normal");
INSERT INTO  usuario(nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ("Miguel Delgado","mdelgado","migueldelgado@fje.com","qaz123qaz","normal");
INSERT INTO  usuario(nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ("Pedro Blanco","pblanco","pedroblanco@fje.com","qaz123qaz","normal");

CREATE TABLE tipo_recursos(
	id_tipo_recurs int AUTO_INCREMENT NOT NULL,
	tipo_recurs VARCHAR (30) NULL,
    
    PRIMARY KEY (id_tipo_recurs)
);

INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Aula de Teoria');
INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Aula de Informàtica');
INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Despatxos Entrevistes');
INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Sala de Reunions');
INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Projector Portàtil');
INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Carro de Portàtils');
INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Portàtil');
INSERT INTO tipo_recursos(tipo_recurs) VALUES ('Mòbil');

CREATE TABLE reservas(
  id_reserva int AUTO_INCREMENT NOT NULL,
  recurs_reservat int(11) NULL,
  usuari_reserva int(11) NULL,
  hora_inici TIMESTAMP NULL,
  hora_fi TIMESTAMP NULL,

  PRIMARY KEY (id_reserva)
);
ALTER TABLE reservas
ADD CONSTRAINT FK_reservas FOREIGN KEY (recurs_reservat) REFERENCES recursos(id_recurs);

ALTER TABLE reservas
ADD CONSTRAINT FK_reservaUser FOREIGN KEY (usuari_reserva) REFERENCES usuario(id_usuario);

CREATE TABLE recursos(
	id_recurs int AUTO_INCREMENT NOT NULL,
	nom_recurs VARCHAR (30) NULL,
	tipo_recurs int NULL,
	disponibilitat VARCHAR (15) NULL,
    
    PRIMARY KEY (id_recurs)
);
ALTER TABLE recursos
ADD CONSTRAINT FK_recursos FOREIGN KEY (tipo_recurs) REFERENCES tipo_recursos(id_tipo_recurs);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Aula de Teoria 1' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=1);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Aula de Teoria 2' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=1);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Aula de Teoria 3' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=1);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Aula de Teoria 4' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=1);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Aula Informàtica 1' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=2);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Aula Informàtica 2' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=2);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Despatxos Entrevistes 1' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=3);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Despatxos Entrevistes 2' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=3);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Sala de Reunions' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=4);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Projector Portàtil' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=5);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Carro Portàtils' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=6);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Portàtil 1' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=7);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Portàtil 2' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=7);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Portàtil 3' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=7);

INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Mòbil 1' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=8);
INSERT INTO `recursos`(`tipo_recurs`,`nom_recurs`,`disponibilitat`) (SELECT DISTINCT `id_tipo_recurs`, 'Mòbil 2' AS `nom_recurs`, 'disponible' AS `disponibilitat` FROM `tipo_recursos` WHERE `tipo_recursos`.`id_tipo_recurs`=8);

