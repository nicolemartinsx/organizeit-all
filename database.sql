CREATE TABLE `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `ano` int(4) NOT NULL,
  `diretor` varchar(30) NOT NULL,
  `sinopse` varchar(144) NOT NULL,
  `capa` longblob NOT NULL,
  PRIMARY KEY (`id`)
)


CREATE TABLE usuarios(
id int(11) NOT NULL AUTO_INCREMENT,
nome varchar(50) NOT NULL,
email varchar(50) NOT NULL,
senha varchar(50) NOT NULL,
PRIMARY KEY (`id`)
)
