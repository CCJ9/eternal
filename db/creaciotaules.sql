CREATE DATABASE eternal; 
USE eternal;

CREATE TABLE IF NOT EXISTS `user` ( 
`iduser` int NOT NULL AUTO_INCREMENT, 
`usuari` varchar(50) UNIQUE NOT NULL, 
`password` varchar(60) NOT NULL, 
`email` varchar(45) NOT NULL, 
`creationdate` date NOT NULL, 
`lastSignIn` date, 
PRIMARY KEY(iduser)
);

CREATE TABLE IF NOT EXISTS `shop` (
  `idshop` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
   PRIMARY KEY(idshop),
   FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
);

CREATE TABLE `clients` (
  `idshop` int(11) NOT NULL,
  `name_shop` varchar(20) NOT NULL,
  `user_db` varchar(10) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY(idshop),
  FOREIGN KEY (`idshop`) REFERENCES `shop` (`idshop`)
);