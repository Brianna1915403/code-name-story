-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 01:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messaging_system`
--
CREATE DATABASE IF NOT EXISTS `messaging_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `messaging_system`;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` enum('read','unread','reread') NOT NULL DEFAULT 'unread',
  `privacy_status` enum('private','public') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender`, `receiver`, `message`, `time_stamp`, `read_status`, `privacy_status`) VALUES
(1, 2, 6, 'Hello!', '2021-03-21 18:03:11', 'read', 'private'),
(3, 6, 2, 'Why are your pictures so weird???', '2021-03-24 16:41:00', 'read', 'public'),
(6, 2, 6, 'Don\'t worry about it...', '2021-03-24 16:45:30', 'read', 'private'),
(7, 16, 16, 'Hello everyone! I\'m happy to be here! :)', '2021-03-25 19:30:16', 'read', 'public'),
(8, 16, 2, 'How are you on this purrrrfet evening?', '2021-03-25 19:31:19', 'read', 'private'),
(9, 16, 2, 'I like the cat picture ;)', '2021-03-25 19:48:10', 'read', 'public'),
(11, 6, 6, '01001001 01110011 01101110 00100111 01110100 00100000 01100010 01101001 01101110 01100001 01110010 01111001 00100000 01101100 01101001 01101011 01100101 00100000 01110011 01110101 01110000 01100101 01110010 00100000 01101000 01100001 01100011 01101011 01100101 01110010 01111001 00100001 00100000 01001001 00100000 01100010 01100101 01110100 00100000 01101100 01101001 01101011 01100101 00100000 01101110 01101111 00100000 01101111 01101110 01100101 00100000 01110111 01101111 01110101 01101100 01100100 00100000 01110010 01100101 01100001 01100100 00100000 01110100 01101000 01101001 01110011 00100000 01100010 01110101 01110100 00100000 01111001 01101111 01110101 00100000 01101011 01101110 01101111 01110111 00101110 00101110 00101110 00100000 01001001 00100000 01110100 01110010 01111001 00100000 01110100 01101111 00100000 01101001 01101101 01110000 01110010 01100101 01110011 01110011 00100000 01100101 01110110 01100101 01110010 01111001 01101111 01101110 01100101 00100000 01110111 01101001 01110100 01101000 00100000 01101101 01111001 00100000 01101100 01101001 01110100 00100000 01101000 00110100 01100011 01101011 01100101 01110010 00100000 01110011 01101011 01101001 01101100 01101100 01110011 00101100 00100000 01100010 01110101 01110100 00100000 01101001 01110100 00100000 01101001 01110011 00100000 01110010 01100101 01100001 01101100 01101100 01111001 00100000 01101010 01110101 01110011 01110100 00100000 01100001 00100000 01100011 01101111 01110110 01100101 01110010 00100000 01110101 01110000 00100000 01100110 01101111 01110010 00100000 01101101 01100001 01101010 01101111 01110010 00100000 01101001 01101110 01110011 01100101 01100011 01110101 01110010 01101001 01110100 01101001 01100101 01110011 00101110 00101110 00101110 00100000 00100000 01110111 01100101 01101100 01101100 00100000 01100001 01101110 01111001 01110111 01100001 01111001 00101100 00100000 01101001 01100110 00100000 01111001 01101111 01110101 00100000 01100001 01110010 01100101 00100000 01110010 01100101 01100001 01100100 01101001 01101110 01100111 00100000 01110100 01101000 01101001 01110011 00100000 01101000 01100001 01110110 01100101 00100000 01100001 00100000 01100111 01110010 01100101 01100001 01110100 00100000 01101000 01100001 01100011 01101011 01101001 01101110 01100111 00100000 01100100 01100001 01111001 00100000 00111010 00101001 ', '2021-03-25 20:13:58', 'read', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `filename` varchar(32) NOT NULL,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `profile_id`, `filename`, `caption`) VALUES
(1, 2, '6056906f8c722.png', 'Why are some people just so weird?! Like get some help!'),
(2, 2, '605a6a1e29e62.png', '???'),
(3, 2, '605a74fda3480.png', 'A'),
(4, 2, '605a797148e14.png', 'Who is this person???? Please help!... I need feet pics!'),
(5, 2, '605a7e140e648.jpg', 'I\'m loving it!'),
(6, 11, '605ce6d6575fa.jpg', 'BEHOLD! The HORRORS of WAR!!!!!!!!!!!!!'),
(7, 11, '605ce7703012b.jpg', 'It\'s duck season!!!!!!!'),
(8, 2, '605ce7d2be104.jpg', 'I\'m feeling a peckish so i decided to have a little snack'),
(10, 16, '605d1c88cfd34.jpg', 'Spending quality time with my cat :D'),
(11, 6, '605d25f63b50b.png', 'Look at my new GPU! Isn\'t it cool?!'),
(12, 6, '605d265873f2b.png', 'Best drink for h4ckers XP'),
(13, 11, '605d27f2f3664.gif', 'A real bull rider! Oo-Yee '),
(14, 6, '605d2810d3ca9.jpg', 'My life lol'),
(15, 6, '605d28be6f50f.gif', 'Mayonnaise is definitely the best coolant! '),
(17, 16, '605d2b0138850.jpg', 'Total meewd lol XD');

-- --------------------------------------------------------

--
-- Table structure for table `picture_like`
--

DROP TABLE IF EXISTS `picture_like`;
CREATE TABLE `picture_like` (
  `picture_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` enum('seen','unseen') NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture_like`
--

INSERT INTO `picture_like` (`picture_id`, `profile_id`, `time_stamp`, `read_status`) VALUES
(1, 2, '2021-03-25 17:59:12', 'seen'),
(1, 16, '2021-03-25 19:30:44', 'seen'),
(3, 2, '2021-03-25 17:44:32', 'seen'),
(5, 11, '2021-03-25 18:56:35', 'seen'),
(5, 16, '2021-03-25 20:31:52', 'seen'),
(6, 6, '2021-03-25 20:23:20', 'seen'),
(6, 11, '2021-03-25 20:02:35', 'seen'),
(7, 11, '2021-03-25 18:54:34', 'seen'),
(8, 11, '2021-03-25 18:56:30', 'seen'),
(10, 16, '2021-03-25 19:30:33', 'seen'),
(11, 6, '2021-03-25 20:10:09', 'seen'),
(12, 6, '2021-03-25 20:10:08', 'seen'),
(13, 6, '2021-03-25 20:23:22', 'seen'),
(14, 6, '2021-03-25 20:17:32', 'seen'),
(17, 16, '2021-03-25 20:31:40', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `middle_name`, `last_name`) VALUES
(2, 1, 'Jane', '', 'Doe'),
(4, 4, 'Username', 'And', 'Password'),
(6, 6, 'A', 'B', 'C'),
(10, 30, 'A', '', 'a'),
(11, 5, 'Private', 'Orlando', 'Yeet'),
(16, 32, 'Mildrid', '', 'Kyle');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `token` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `token`) VALUES
(1, 'Jane', '$2y$10$GwnjiCUpCeG2VKs/qWtebuHSDACfYLpe0Os8EW8sWQO1ZcETtIZ62', '4USM3EVFOTS2VB77'),
(4, 'Username', '$2y$10$FSewJp5I0Ue3swGX.ad/weVVZOyxfBjaPgecnlFAkMjJyR4jPZrpW', NULL),
(5, 'proy', '$2y$10$Vdbe0cRDuzGKyUypJC9dYO57d/xdpap7co99HjO6vd1HimAiX45fe', 'ZLMOKNLSA7B2CGC6'),
(6, 'Password', '$2y$10$6/f//a9.F3qSpDD7.KjHI.nG3kRWn3frgJCSuDdu7FfmbLQtB15oe', NULL),
(30, 'A', '$2y$10$Q2cRAxXixnucA8wMQvTq9.ZBB314aof/V/jU3Vx5YHf.pMRohwQJC', '6GCJYKFIWTAAEB3S'),
(31, 'B', '$2y$10$FCHrqSdixYJ3v70NN48Dhu9ERQRq1HOk1mw9quG8XDQOIWnrxydEu', NULL),
(32, 'Milk', '$2y$10$AsEeT5QosxFScAegTraC9O24aNdgjW5X39bsDUZxiBEabYhBPJ0FG', 'YUIXORBETO2HSRU2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_sprofile_FK` (`sender`),
  ADD KEY `message_rprofile_FK` (`receiver`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `picture_profile_FK` (`profile_id`);

--
-- Indexes for table `picture_like`
--
ALTER TABLE `picture_like`
  ADD PRIMARY KEY (`picture_id`,`profile_id`),
  ADD KEY `like_profile_FK` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_user_FK` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_rprofile_FK` FOREIGN KEY (`receiver`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `message_sprofile_FK` FOREIGN KEY (`sender`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `picture_like`
--
ALTER TABLE `picture_like`
  ADD CONSTRAINT `like_picture_FK` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `like_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
