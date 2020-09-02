-- drop database if exists testuser;
-- create database testuser;
-- use testuser;

CREATE TABLE usuario (
  idusuario int NOT NULL AUTO_INCREMENT,
  nombrecompleto varchar(100) NOT NULL,
  correo varchar(50) NOT NULL,
  contrasena varchar(100) NOT NULL,
  imagen varchar(100) NOT NULL,
  telefono varchar(20) NOT NULL,
  primary key(idusuario)
);

INSERT INTO usuario (idusuario,  nombrecompleto, correo, contrasena,imagen, telefono) VALUES
(2, 'Juan', 'Joooo@gmail.com', '$2y$10$9Um4EtGtozc44EFbAgqRseXeV9JE3J6UdXK2VA6XU8dLI5n1lSkca', 'custom/imgimg/avatar.png', '0000000000'),
(3, 'Andres', 'andres@gmail.com', '$2y$10$92umf8S1jo4IG3NP.Oj7c.tqiGbOD7WQIv/TZ/GL8bYCAVtlEehFa', 'custom/imgimg/avatar.png', '00000000'),
(4, 'Pedro', 'pedro@gmail.com', '$2y$10$92umf8S1jo4IG3NP.Oj7c.tqiGbOD7WQIv/TZ/GL8bYCAVtlEehFa', 'custom/imgimg/avatar.png', '00000000'),
(5, 'Camilo', 'camilo@gmail.com', '$2y$10$92umf8S1jo4IG3NP.Oj7c.tqiGbOD7WQIv/TZ/GL8bYCAVtlEehFa', 'custom/imgimg/avatar.png', '99999999');