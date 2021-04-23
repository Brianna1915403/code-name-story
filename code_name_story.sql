-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 10:51 PM
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
  `text` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `chapter_picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_commened` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_story`
--

DROP TABLE IF EXISTS `favorite_story`;
CREATE TABLE `favorite_story` (
  `story_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `liked_chapter`
--

DROP TABLE IF EXISTS `liked_chapter`;
CREATE TABLE `liked_chapter` (
  `chapter_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'reader', 'I don\'t know who I am...', 'light', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `original_comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

DROP TABLE IF EXISTS `story`;
CREATE TABLE `story` (
  `story_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `series_id` int(11) DEFAULT NULL,
  `author` varchar(64) NOT NULL,
  `story_picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `story_tags`
--

DROP TABLE IF EXISTS `story_tags`;
CREATE TABLE `story_tags` (
  `tag_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(26, 'Zombies');

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
(1, 'Jane', '$2y$10$mWSc/wW9YDMcbaHuWRxaDeMjb0LXgj9B2BdPdqiXOjrwUEdcoQxOe', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`,`story_id`),
  ADD KEY `chapter_story_FK` (`story_id`),
  ADD KEY `chapter_picture_FK` (`chapter_picture_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`chapter_id`),
  ADD KEY `comment_chapter_FK` (`chapter_id`);

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
  ADD KEY `profile_user_FK` (`user_id`),
  ADD KEY `profile_picture_FK` (`profile_picture_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`,`original_comment_id`),
  ADD KEY `reply-original_comment_FK` (`original_comment_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`,`profile_id`),
  ADD KEY `story_profile_FK` (`profile_id`),
  ADD KEY `story_picture_FK` (`story_picture_id`),
  ADD KEY `story_series_FK` (`series_id`);

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
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_picture_FK` FOREIGN KEY (`chapter_picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `chapter_story_FK` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_chapter_FK` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`chapter_id`);

--
-- Constraints for table `favorite_story`
--
ALTER TABLE `favorite_story`
  ADD CONSTRAINT `fav-story_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `fav-story_story_FK` FOREIGN KEY (`story_id`) REFERENCES `story` (`story_id`);

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
  ADD CONSTRAINT `reply-original_comment_FK` FOREIGN KEY (`original_comment_id`) REFERENCES `comment` (`comment_id`),
  ADD CONSTRAINT `reply_comment_FK` FOREIGN KEY (`reply_id`) REFERENCES `comment` (`comment_id`);

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_picture_FK` FOREIGN KEY (`story_picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `story_profile_FK` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `story_series_FK` FOREIGN KEY (`series_id`) REFERENCES `series` (`series_id`);

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
