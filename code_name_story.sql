-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 02:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_name_story`
--
CREATE DATABASE IF NOT EXISTS `code_name_story` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `code_name_story`;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `chapter_title` varchar(64) NOT NULL,
  `chapter_text` mediumtext NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `story_id`, `chapter_title`, `chapter_text`, `date_created`, `likes`) VALUES
(1, 1, 'Chapter 1', '6092e4abb09f7.txt', '2021-05-05 18:32:11', 0),
(2, 1, 'Chapter 2', '6092e4c506196.txt', '2021-05-05 18:32:37', 0),
(3, 1, 'Chapter 3', '6092e4d9e5ea3.txt', '2021-05-05 18:32:57', 0),
(4, 1, 'Chapter 4', '6092e4f95ab92.txt', '2021-05-05 18:33:29', 0),
(5, 2, 'Hairy Happenings', '6093ddb75c049.txt', '2021-05-06 12:14:47', 0),
(6, 2, 'Wobbeling Whirlwind', '6093ddd3744a6.txt', '2021-05-06 12:15:15', 0),
(7, 3, 'Chapter 1', '6093e1ce95944.txt', '2021-05-06 12:32:14', 0),
(8, 4, 'Life in the wasteland [Part 1]', '6093e33a1bf4a.txt', '2021-05-06 12:38:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_commented` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `chapter_id`, `profile_id`, `text`, `date_commented`) VALUES
(1, 1, 2, 'I\'m really looking forward to posting again!!! Hope you all enjoy! :P', '2021-05-06 01:41:08'),
(6, 3, 3, 'This story is soooooooo hella cool man!', '2021-05-06 12:17:55'),
(7, 1, 3, 'I am loving every second of it!', '2021-05-06 12:23:37'),
(8, 6, 5, 'I really, really, really hope that Pigeon saves Troll Garth because I love this story soooooo much!', '2021-05-06 12:40:14'),
(9, 5, 4, 'A dirty alien, a tribe of girls and a noisy troll - haven\'t we seen this before somewhere?', '2021-05-06 12:41:40'),
(10, 5, 5, 'Totally know what you mean I just can out a finger on it!', '2021-05-06 12:43:01'),
(11, 5, 3, 'NoNoNoNONONOnOnONoNonOnOnONONoNoN!', '2021-05-06 12:44:14'),
(12, 5, 3, 'It\'s a totaly origanl idea I didn\'t get it from anywhere! OK >:(', '2021-05-06 12:45:27'),
(13, 4, 5, 'I\'ve been waiting all week to read this! made my day!', '2021-05-06 12:46:52'),
(16, 4, 9, 'I love this story!!!', '2021-05-11 01:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_story`
--

DROP TABLE IF EXISTS `favorite_story`;
CREATE TABLE `favorite_story` (
  `story_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite_story`
--

INSERT INTO `favorite_story` (`story_id`, `profile_id`) VALUES
(1, 3),
(1, 5),
(1, 9),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `liked_chapter`
--

DROP TABLE IF EXISTS `liked_chapter`;
CREATE TABLE `liked_chapter` (
  `chapter_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liked_chapter`
--

INSERT INTO `liked_chapter` (`chapter_id`, `profile_id`) VALUES
(1, 2),
(1, 3),
(2, 3),
(3, 3),
(3, 9),
(4, 5),
(4, 9),
(5, 3),
(5, 5),
(6, 3),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `alt` varchar(64) NOT NULL,
  `artist` varchar(64) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `filename`, `alt`, `artist`, `profile_id`) VALUES
(1, '6092e48a3e570.jpg', 'Trapped cover', 'Émily Mayodon', 2),
(2, '6093496c93258.jpg', 'Émily Mayodon\'s Profile Picture', '', 2),
(3, '6093dda5cbeb6.png', 'Galactic Hairy Gun Wars cover', 'superhelladude99', 3),
(4, '6093e176e55af.png', 'Two Vile Uncles Jogging to the Beat cover', 'E', 4),
(5, '6093e2b94d1a3.png', 'Bold Mo Smith cover', 'E', 4),
(6, '6093e417defba.jpg', 'E\'s Profile Picture', '', 4),
(7, '609415952bb14.png', 'kyle\'s Profile Picture', '', 6),
(9, '6099d7b545895.jpg', 'User\'s Profile Picture', '', 9),
(10, '6099dc5147bec.jpg', 'My Story cover', 'User', 9),
(11, '6099de410379d.jpg', 'My Story cover', 'User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` enum('reader','writer') NOT NULL DEFAULT 'reader',
  `description` text NOT NULL,
  `theme` enum('light','dark','green','blue') NOT NULL DEFAULT 'light',
  `profile_picture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `account_type`, `description`, `theme`, `profile_picture_id`) VALUES
(2, 2, 'writer', 'I love writing fanfics!', 'light', 2),
(3, 3, 'writer', 'I\'m kind of a super hella cool dude 99x times over!', 'light', NULL),
(4, 4, 'writer', 'EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE', 'light', 6),
(5, 5, 'writer', 'Reading is my only joy in life.......', 'light', NULL),
(6, 6, 'reader', 'I like books!!!!!\r\n', 'light', 7),
(9, 9, 'writer', 'I am a User', 'light', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `original_comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `original_comment_id`) VALUES
(7, 1),
(10, 9),
(11, 10),
(12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

DROP TABLE IF EXISTS `story`;
CREATE TABLE `story` (
  `story_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `author` varchar(64) NOT NULL,
  `story_picture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`story_id`, `profile_id`, `title`, `description`, `date_created`, `author`, `story_picture_id`) VALUES
(1, 2, 'Trapped', 'Eren Jaeger lived in a world of fear, until he woke up in a cramped room with a bunch of strangers. Confused, he asked what was going on, but no one seemed to know the answer. Where is he? Who are they? And why aren\'t they fearing the worst?', '2021-05-05 18:31:38', 'Émily Mayodon', 1),
(2, 3, 'Galactic Hairy Gun Wars', 'What happens when the war turns hairy.', '2021-05-06 12:14:29', 'superhelladude99', 3),
(3, 4, 'Two Vile Uncles Jogging to the Beat', 'When exercise gets a little to crazy, who else would be the cause but you vile uncle Tony!', '2021-05-06 12:30:46', 'E', 4),
(4, 4, 'Bold Mo Smith', 'No one is bolder than Mo Smith, but how bold can you be when life trows everything you way!', '2021-05-06 12:36:09', 'E', 5);

-- --------------------------------------------------------

--
-- Table structure for table `story_tags`
--

DROP TABLE IF EXISTS `story_tags`;
CREATE TABLE `story_tags` (
  `tag_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story_tags`
--

INSERT INTO `story_tags` (`tag_id`, `story_id`) VALUES
(1, 2),
(5, 4),
(7, 4),
(12, 1),
(12, 3),
(16, 4),
(19, 2),
(22, 3),
(25, 3),
(27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `name`) VALUES
(1, 'Action'),
(2, 'All Ages'),
(3, 'Animals'),
(4, 'BL'),
(5, 'Comedy'),
(6, 'Crime/Mystery'),
(7, 'Drama'),
(8, 'Fantasy'),
(9, 'GL'),
(10, 'Heart-Warming'),
(11, 'Historical'),
(12, 'Horror'),
(13, 'Informative'),
(14, 'Inspirational'),
(15, 'Mature'),
(16, 'Post-Apocalyptic'),
(17, 'Romance'),
(18, 'School'),
(19, 'Sci-Fi'),
(20, 'Short Story'),
(21, 'Slice of Life'),
(22, 'Sports'),
(23, 'Superhero'),
(24, 'Supernatural'),
(25, 'Thriller'),
(26, 'Zombies'),
(27, 'Fanfiction');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `token` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `token`) VALUES
(2, 'Émily Mayodon', '$2y$10$P.1tAHWVu9FGY6jYNfGIU.eRaQbECyJ81c2dPFEHcMrQC5ucdhO2y', ''),
(3, 'superhelladude99', '$2y$10$gCOckkoz7lOFoSbP1sh6yOfifMZ6QGUR1ry2mKQLUOFQBYstBvaWu', ''),
(4, 'E', '$2y$10$ujw5CCxsSntwi6KT3EJ1mutMezsWcL0UMgpihbss2KrQXAZACihVW', ''),
(5, 'Jane', '$2y$10$na5ZvVy6UZaotChA3qRumu6mY7.EU65HkMifnW/NQNeOLLU9zA7de', ''),
(6, 'kyle', '$2y$10$Wlss7SwFPWJwfOVx/WUsq.dSRsXBAaTws9P1ABE2WIxFKWHKWRAXi', ''),
(9, 'User', '$2y$10$qBynaVAUzlCHcagxCcZWkO8i3EeVcZMimJ3k6Kg2d625rCOKVXb..', '26UP32NC6QBXOXLM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`,`story_id`),
  ADD KEY `chapter_story_FK` (`story_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`chapter_id`),
  ADD KEY `comment_chapter_FK` (`chapter_id`),
  ADD KEY `comment_profile_FK` (`profile_id`);

--
-- Indexes for table `favorite_story`
--
ALTER TABLE `favorite_story`
  ADD PRIMARY KEY (`story_id`,`profile_id`),
  ADD KEY `fav-story_profile_FK` (`profile_id`);

--
-- Indexes for table `liked_chapter`
--
ALTER TABLE `liked_chapter`
  ADD PRIMARY KEY (`chapter_id`,`profile_id`),
  ADD KEY `like-chapter_profile_FK` (`profile_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `picture_profile_FK` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `profile_user_FK` (`user_id`),
  ADD KEY `profile_picture_FK` (`profile_picture_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`,`original_comment_id`),
  ADD KEY `reply-original_comment_FK` (`original_comment_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`,`profile_id`),
  ADD KEY `story_profile_FK` (`profile_id`),
  ADD KEY `story_picture_FK` (`story_picture_id`);

--
-- Indexes for table `story_tags`
--
ALTER TABLE `story_tags`
  ADD PRIMARY KEY (`tag_id`,`story_id`),
  ADD KEY `story-tags_story_FK` (`story_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_story_FK` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_chapter_FK` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite_story`
--
ALTER TABLE `favorite_story`
  ADD CONSTRAINT `fav-story_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fav-story_story_FK` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`) ON DELETE CASCADE;

--
-- Constraints for table `liked_chapter`
--
ALTER TABLE `liked_chapter`
  ADD CONSTRAINT `like-chapter_chapter_FK` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`),
  ADD CONSTRAINT `like-chapter_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_picture_FK` FOREIGN KEY (`profile_picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `profile_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply-original_comment_FK` FOREIGN KEY (`original_comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reply_comment_FK` FOREIGN KEY (`reply_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE;

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_picture_FK` FOREIGN KEY (`story_picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `story_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `story_tags`
--
ALTER TABLE `story_tags`
  ADD CONSTRAINT `story-tags_story_FK` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`),
  ADD CONSTRAINT `story-tags_tag_FK` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
