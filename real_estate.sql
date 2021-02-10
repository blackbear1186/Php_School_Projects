SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `real_estate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(40) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(15) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` int(5) NOT NULL,
  `Beds` int(1) NOT NULL,
  `Baths` int(1) NOT NULL,
  `HouseSize` int(5) NOT NULL,
  `LotSize` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `real_estate` (`ID`, `Title`, `Address`, `City`, `State`, `Zip`, `Beds`, `Baths`, `HouseSize`, `LotSize`, `Price`) VALUES
(1, 'Mountain Get Away ', '773 Comanche St', 'Flagstaff', 'AZ', 86005, 2, 1, 1216, 5662, 349999),
(2, 'Five Acre Wooden Home', '6800 N Rain Valley R', 'Flagstaff', 'AZ', 86004, 5, 5, 3700, 43560, 899999),
(3, 'Sand Colored Concrete House', '245 RedStone Dr', 'Sedona', 'AZ', 86336, 3, 3, 2134, 12196, 680000),
(4, 'Arizona Home ', '35 Arroyo Dr', 'Sedona', 'AZ', 86336, 4, 3, 2088, 11325, 649000),
(5, 'Red Rock Views of Soldiers Pass', '20 Rim Shadows', 'Sedona', 'AZ', 86336, 3, 5, 5998, 26136, 2995000),
(6, 'Two Cabin Homes in Pine Country', '25329 Highway 191', 'Alpine', 'AZ', 85920, 2, 2, 1303, 15246, 254000),
(7, 'Three Bed Home in Desert Oasis', '5215 W Desert Ln', 'Laveen', 'AZ', 85339, 3, 3, 1765, 7191, 302000),
(8, 'Vaulted Ceiling Home on a Hill', '929 E Springwood Dr', 'North Salt Lake', 'UT', 84054, 7, 4, 3753, 11761, 599999),
(9, 'Adorable Mid Century House', '2003 S Texas St', 'Salt Lake City', 'UT', 84108, 4, 2, 2226, 9147, 549999),
(10, 'Custom Two Story Five Bed ', '1653 N Beck St', 'Salt Lake City', 'UT', 84116, 5, 4, 3830, 6098, 475000),
(11, 'Riverside Log Home', '1118 N 750 W', 'Provo', 'UT', 84604, 2, 1, 2010, 23522, 547000),
(12, 'Red Brick Four Bedroom ', '371 E 8680 S', 'Sandy', 'UT', 84070, 4, 2, 2772, 8276, 435000),
(13, 'Charming Home in Open Field ', '13997 N 55 E', 'Idaho Falls', 'ID', 83401, 5, 2, 2563, 33541, 375000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
