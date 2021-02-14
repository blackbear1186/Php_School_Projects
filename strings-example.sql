DROP TABLE IF EXISTS `strings-example`;
CREATE TABLE IF NOT EXISTS `strings-example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(50) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `birthDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Walter White' , '6627182255', '1958-09-07');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Ron Burgundy' , '7403689998', '1945-08-06');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Michael Scott' , '9492795011', '1971-04-06');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Pam Beesley' , '7705582865', '1980-02-25');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'George Costanza' , '5596232568', '1955-04-23');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Veronica Corningstone' , '9032289981', '1950-06-25');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Frank Gallagher' , '2018854349', '1958-09-02');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Napoleon Dynamite' , '9185064259', '1991-08-10');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Harry Potter' , '7039821006', '1988-01-17');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Phoebe Buffay' , '7085160245', '1976-09-23');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Barney Stinson' , '4805235284', '1975-06-20');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Hawkeye Pierce' , '6603578502', '1930-07-19');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Ron Swanson' , '8023573579', '1960-01-09');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Elaine Benes' , '5104055448', '1957-02-06');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Gregory House' , '3105306553', '1959-05-05');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Sam Malone' , '6265345475', '1953-08-04');
INSERT INTO `strings-example` (`id`, `fullName`, `phoneNumber`, `birthDate`) VALUES (NULL, 'Jesse Pinkman' , '5167287960', '1985-03-26');
