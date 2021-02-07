SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `Movies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MovieTitle` varchar(50) NOT NULL,
  `MovieGenre` varchar(25) NOT NULL,
  `ReleaseYear` year(4) NOT NULL,
  `MovieRating` varchar(12) NOT NULL,
  `IMDB_Score` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `Movies` (`ID`, `MovieTitle`, `MovieGenre`, `ReleaseYear`, `MovieRating`, `IMDB_Score`) VALUES
(1, '(500) Days of Summer', 'Drama', 2009, 'PG-13', 7.8),
(2, 'Beautiful Girls', 'Drama', 1996, 'R', 7.2),
(3, 'Forrest Gump', 'Drama', 1994, 'PG-13', 8.8),
(4, 'Good Will Hunting', 'Drama', 1997, 'R', 8.3),
(5, 'Groundhog Day', 'Comedy', 1993, 'PG ', 8.1),
(6, 'Into the Wild', 'Biography', 2007, 'R', 8.2),
(7, 'Silver Linings Playbook', 'Drama', 2012, 'R', 7.9),
(8, 'Stranger than Fiction', 'Fantasy', 2006, 'PG-13', 7.7),
(9, 'The Shawshank Redemption', 'Drama', 1994, 'R', 9.3),
(10, 'The Upside', 'Drama', 2017, 'PG-13', 6.3),
(11, 'Top Gun', 'Action', 1986, 'PG', 6.8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
