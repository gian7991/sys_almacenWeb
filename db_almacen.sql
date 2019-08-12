DROP DATABASE IF EXISTS db_almacen;
CREATE DATABASE db_almacen;
ALTER DATABASE db_almacen charset=utf8;

USE db_almacen;

DROP TABLE if exists control;
CREATE TABLE control(
FechaHora DATETIME NOT NULL,
usuario varchar(30)NOT NULL
);

DROP TABLE if exists usuario;
CREATE TABLE usuario(
id INT PRIMARY KEY AUTO_INCREMENT,
usuario varchar(50)NOT NULL,
contrasena char(50)NOT NULL,
correo varchar(30)not null,
type_user boolean,
f_registro datetime
);
insert into usuario values (null,'admin',md5('123'),'admin@gmail.com',false,now());

/*DROP TABLE IF EXISTS CATEGORIA;
CREATE TABLE CATEGORIA(
ID INT PRIMARY KEY AUTO_INCREMENT,
NOMBRE VARCHAR(30)not null,
F_REGISTRO DATETIME DEFAULT(now())
);

INSERT INTO CATEGORIA VALUES 
(NULL,'ACIDOS',DEFAULT),
(NULL,'LIMPIADORES',DEFAULT),
(NULL,'PULIDORES',DEFAULT),
(NULL,'CELLADORES',DEFAULT);*/

DROP TABLE IF EXISTS umedida;
CREATE TABLE umedida(
id INT PRIMARY KEY AUTO_INCREMENT,
unidad VARCHAR(30)not null,
abreviatura char(5)not null
);

INSERT INTO umedida VALUES 
(NULL,'kilogramo','kg'),
(NULL,'metro','m'),
(NULL,'metro cuadrado','m²'),
(NULL,'litro','L');

DROP TABLE IF EXISTS producto;
CREATE TABLE producto(
id INT PRIMARY KEY AUTO_INCREMENT,
nombre varchar(30) NOT NULL,
cantidad INT NOT NULL,
precio FLOAT NOT NULL,
presentacion VARCHAR(30)not null,
id_medida INT not null,
id_usuario INT NOT NULL,
estado CHAR(2)not null,
f_registro date not null,
f_caducidad date NOT NULL,
FOREIGN KEY (id_medida) REFERENCES umedida(id),
FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);
insert into producto values (null,'Pulidor',10,50.5,'Botella',4,1,'d',curdate(),'2019-10-08');

DROP TRIGGER IF EXISTS rg_usuario;
DELIMITER //
CREATE TRIGGER rg_usuario
AFTER INSERT
ON usuario
FOR EACH ROW	
BEGIN
	INSERT INTO control VALUES (now(),'admin');
END // DELIMITER ;