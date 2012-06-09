-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2012 at 03:50 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `post_id`, `name`, `comment`, `comment_time`) VALUES
(1, 6, 'sd', 'asdasd', '2012-06-07 02:37:51'),
(2, 6, 'qweqwe', 'qwe', '2012-06-07 02:39:23'),
(3, 6, 'dsg', 'asdfsad', '2012-06-07 02:46:36'),
(4, 6, 'saddf', '12423', '2012-06-07 03:12:17'),
(5, 6, 'werwqer', 'sgfdgsd', '2012-06-07 03:12:30'),
(6, 6, 'channi', 'dsfldfk', '2012-06-07 08:08:53'),
(7, 6, 'asd', 'asd', '2012-06-07 08:09:08'),
(8, 6, '		asdf										', 'dsf', '2012-06-07 08:09:57'),
(9, 6, '		asdf										', 'dsf', '2012-06-07 08:09:57'),
(10, 6, '	asdasf							asdf																', 'asdsa', '2012-06-07 08:10:26'),
(11, 6, 'channi							asdasf							asdf																						', 'sdf', '2012-06-07 08:12:25'),
(12, 6, 'a', 'asd', '2012-06-07 08:14:37'),
(13, 6, 'Channi', 'sfdafd', '2012-06-07 08:16:50'),
(14, 6, 'sdf', 'sdf', '2012-06-07 08:19:08'),
(15, 6, 'sdss', 'dsfg', '2012-06-07 08:19:54'),
(16, 5, 'ffdsa', 'adfdf', '2012-06-07 10:48:13'),
(17, 5, '', 'Comment', '2012-06-07 10:57:29'),
(18, 8, 'asd', 'Comment', '2012-06-07 12:08:14'),
(19, 8, 'asd', 'Comment', '2012-06-07 12:09:05'),
(20, 8, 'asd', 'Comment', '2012-06-07 12:09:08'),
(21, 8, 'sdf', 'Comment', '2012-06-07 12:09:15'),
(22, 8, 'sdf', 'Comment', '2012-06-07 12:09:32'),
(23, 8, 'Channi', 'Comment', '2012-06-07 12:10:10'),
(24, 8, 'asd', 'Comment', '2012-06-07 12:11:58'),
(25, 8, 'asd', 'Comment', '2012-06-07 12:15:44'),
(26, 8, 'asd', 'Comment', '2012-06-07 12:16:05'),
(27, 8, 'asd', 'Submit', '2012-06-07 12:16:08'),
(28, 8, 'asd', 'Submit', '2012-06-07 12:16:10'),
(29, 8, 'asd', 'Submit', '2012-06-07 12:16:22'),
(30, 9, 'asd', 'da', '2012-06-07 13:37:32'),
(31, 10, 'asd', 'aaaaaaaaaaaaaaaaaaaaa', '2012-06-07 14:18:17'),
(32, 12, 'Channi', 'comments', '2012-06-08 03:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date_posted` date NOT NULL,
  `category` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `post`, `date_posted`, `category`) VALUES
(5, 'Test Title 2', 'Test Body 2', '2012-06-07', '0'),
(6, 'Yet another test post', 'yet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post hereyet another test post here', '2012-06-07', '0'),
(8, 'sdf', 'dfsdf', '2012-06-07', '0'),
(9, 'asdfas', 'dsgad', '2012-06-07', '0'),
(10, 'asdsa', 'asdf', '2012-06-07', '0'),
(11, 'New Blog Entry', 'Heres new blog entry new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry  new blog entry ', '2012-06-07', '0'),
(12, 'Yet another new post', 'New post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post postpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post postpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post postpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post postpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post postpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post postpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post postpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post', '2012-06-08', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
