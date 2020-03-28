-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 02:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_christinarenieris_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_christinarenieris_petadoption` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr11_christinarenieris_petadoption`;
-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(30) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `fk_location_id` int(11) DEFAULT NULL,
  `type` enum('small','big','senior') DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `name`, `age`, `description`, `fk_location_id`, `type`, `breed`, `image`, `website`, `hobbies`, `date`) VALUES
(1, 'Hoggy', 2, 'Young frienly Hedgehog Hoggy is ready for adoption. ', 1, 'small', 'Hedgehog', 'https://cdn.pixabay.com/photo/2014/10/01/10/44/hedgehog-468228__340.jpg', 'https://www.youtube.com/user/dompetlusuh/videos', '', NULL),
(2, 'Max', 1, 'Small max is a really playful pupper. ', 1, 'small', 'Labrador', 'https://cdn.pixabay.com/photo/2016/12/13/05/15/puppy-1903313__340.jpg', '      https://www.youtube.com/user/dompetlusuh/videos', '', '0000-00-00'),
(3, 'Red & Rick', 0, '3 month old kitten siblings looking for a forever home together.', 1, 'small', 'Cats, European Shorthair ', 'https://cdn.pixabay.com/photo/2016/12/18/18/42/kittens-1916542__340.jpg', 'https://www.youtube.com/user/dompetlusuh/videos', NULL, NULL),
(4, 'Spidey', 1, 'Our fluffy girl, Spidey is looking for a home.', 1, 'small', 'Spider, tarantula', 'https://cdn.pixabay.com/photo/2016/07/29/18/42/spider-1555216__340.jpg', 'https://www.youtube.com/user/dompetlusuh/videos', NULL, NULL),
(5, 'Ginger', 1, 'Cute boy Ginger is looking for his forever home, after being saved from a factory farm.', 1, 'big', 'Goat', 'https://cdn.pixabay.com/photo/2016/06/05/21/46/goat-1438254__340.jpg', NULL, 'Crunching on some apples and belly scratches.', NULL),
(6, 'Gustav', 4, 'Our lovely Gustav is looking for a home, loves kids.', 1, 'small', 'Dog, Weimaraner', 'https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416__340.jpg', '', 'Loves running and playing fetch. If you like being active, Gustav is the right one for you.', '0000-00-00'),
(7, 'Jacky', 4, 'Easy going Jacky, is looking for a home.', 1, 'big', 'Dog, Bernese Mountain Dog', 'https://cdn.pixabay.com/photo/2016/02/06/19/18/dog-1183475__340.jpg', NULL, 'Sleeping, napping on the sunny spot in the garden.', NULL),
(8, 'Noodle', 2, 'Our girl noodle, is looking for the right home.', 1, 'big', 'Snake, Albino Burmese Python', 'https://cdn.pixabay.com/photo/2019/08/01/04/01/snake-girl-4376581__340.jpg', NULL, 'Snuggling up, staying in roasty temperatures.', NULL),
(9, 'Bobby', 12, 'Our Good ol\' boi Bobby is looking for the right house to retire in.', 1, 'senior', 'Dog, Labrador', 'https://cdn.pixabay.com/photo/2019/05/29/08/15/labrador-4236901__340.jpg', NULL, 'Going for walks, snuggling and munching down Peanut Butter.', '2020-03-26'),
(10, 'Betty', 8, 'Sweet girl Betty is looking for a nice farm to relax, after being freed from a wool farm.', 1, 'senior', 'Sheep', 'https://cdn.pixabay.com/photo/2016/11/13/21/46/sheep-1822137__340.jpg', NULL, 'Playing fetch and munching on carrots.', '2020-05-27'),
(11, 'Buzz', 10, 'Our fluffy boi Buzz is looking for a home.', 1, 'senior', 'Cow', 'https://cdn.pixabay.com/photo/2014/08/30/18/19/cow-431729__340.jpg', NULL, 'Loves jumping around in the fields, head scratches and BANANAS.', '2020-03-14'),
(12, 'Sally', 15, 'Droppy girl Sally is looking for a home.', 1, 'senior', 'Dog, Mix', 'https://cdn.pixabay.com/photo/2015/10/18/16/40/taxation-994709__340.jpg', NULL, 'Sally enjoys relaxing walks, almond butter and having someone by her side.', '2020-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `ZIP_code` int(10) DEFAULT NULL,
  `address` varchar(25) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `name`, `city`, `ZIP_code`, `address`, `image`) VALUES
(1, 'Animal Garden', 'Vienna', 1150, 'Tiergasse 187', 'https://pixabay.com/photos/facade-great-chalfield-manor-house-4304096/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Chris', 'chris@email.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(2, 'Boris', 'boris@email.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(3, 'Lisa', 'lisa@email.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(4, 'Serri', 'serri@email.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_location_id` (`fk_location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
