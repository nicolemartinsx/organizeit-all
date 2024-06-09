DROP DATABASE IF EXISTS `projeto-web`;
CREATE DATABASE `projeto-web`;

USE `projeto-web`;

CREATE TABLE IF NOT EXISTS `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `ano` int(4) NOT NULL,
  `diretor` varchar(50) NOT NULL,
  `sinopse` varchar(500) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `estrelas` int(1) NOT NULL,
  `capa` longblob NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adm` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `watchlist` (
  `idUsuarios` int(11) NOT NULL,
  `idFilmes` int(11) NOT NULL,
  FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios`(`id`),
  FOREIGN KEY (`idFilmes`) REFERENCES `filmes`(`id`)
);

CREATE TABLE IF NOT EXISTS `reviews` (
  `idFilmes` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
   `nome` varchar(50) NOT NULL,
   FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios`(`id`),
   FOREIGN KEY (`idFilmes`) REFERENCES `filmes`(`id`),
   `avaliacao` int(2),
   `comentario` varchar (150)
);


INSERT INTO usuarios (email, senha , nome, adm) VALUES ("adm@adm", "123123", "adm", 1);
