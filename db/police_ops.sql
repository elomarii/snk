-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Jul 13, 2024 at 10:59 PM
-- Server version: 9.0.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `police_ops`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `date` text NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `username` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(256) NOT NULL,
  `pp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='police members';

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`username`, `name`, `password`, `pp`) VALUES
('h.dreyse', 'Hitch Dreyse', 'JustAnotherRandomPasswordNotToBeEaselyCracked', 'https://th.bing.com/th/id/OIP.fZe0ybuBU-gDEZx7GyT8mwHaHJ?rs=1&pid=ImgDetMain'),
('n.dok', 'Nile Dok', 'AVeryDifficultPasswordToCrackWithWordlists', 'https://vignette.wikia.nocookie.net/shingeki-no-kyojin/images/f/fb/Nile_HD.png/revision/latest?cb=20130719121034&path-prefix=es');
('m.freudenberg', 'Marlo Freudenberg', 'ComeOnBroYouW0ntBeAbleTo6ruteF0rceThis', 'https://th.bing.com/th/id/OIP.WQgDGtSlX4Pz6YWguWt20QHaHa?w=186&h=186&c=7&r=0&o=5&dpr=1.6&pid=1.7');
('b.feulner', 'Boris Feulner', 'YouD0n7KnowWh3nToG1veUPPPP', 'https://th.bing.com/th/id/OIP.ErNe5d7sIp2dKlT5Xin-tgAAAA?w=186&h=185&c=7&r=0&o=5&dpr=1.4&pid=1.7');
('r.brzenska', 'Rico Brzenska', 'YouD0n7KnowWh3nToG1veUPPPP1', 'https://th.bing.com/th/id/OIP.I28XWkO5SY92wWSOb5akHAHaHa?w=208&h=208&c=7&r=0&o=5&dpr=1.4&pid=1.7');
('k.woermann', 'Kitz Woermann', 'YouD0n7KnowWh3nToG1veUPPPP2', 'https://th.bing.com/th/id/OIP.wM05YG3UNh3fQN-L4f5TqwAAAA?w=179&h=180&c=7&r=0&o=5&dpr=1.4&pid=1.7');
('d.sannes', 'Djel Sannes', 'YouD0n7KnowWh3nToG1veUPPPP3', 'https://ami.animecharactersdatabase.com/uploads/chars/1-768938000.png');

-- --------------------------------------------------------

--
-- Table structure for table `scouts`
--

CREATE TABLE `scouts` (
  `name` varchar(100) NOT NULL,
  `pp` text NOT NULL,
  `info` text NOT NULL,
  `intel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='intel on scouts';

--
-- Dumping data for table `scouts`
--

INSERT INTO `scouts` (`name`, `pp`, `info`, `intel`) VALUES
('Armin Arlert', 'https://th.bing.com/th/id/R.23d1239a2dc6ebb218922f38aa4e11db?rik=oVmwRrX0Df%2b8mA&pid=ImgRaw&r=0', 'This guy is one of those geeks thinking outside the box. He might cause us trouble in the future.\r\nOur offensive security team was able to access his credentials. Gotta keep an eye on him.', 'a.arlert:To0utsideTheVVallsAndB3y0nd');
('Levi Ackerman', 'https://th.bing.com/th/id/R.195a84f441cfe772357436029a60a5e3?rik=G0PzgIkK4tjAyA&pid=ImgRaw&r=0', 'Some people call him the strongest, we will see after he meets our Kenny', 'None');
('Hanji Zoe', 'https://th.bing.com/th/id/OIP.HcJt9g_m7iIEt1a8kxyDyAHaHa?w=199&h=199&c=7&r=0&o=5&dpr=1.4&pid=1.7', 'Just a titans wierdo, not sure if the intel still up to date', 'h.zoe:ilovetitans');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`date`(100));

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `scouts`
--
ALTER TABLE `scouts`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
