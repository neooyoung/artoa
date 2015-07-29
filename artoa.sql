-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-07-29 11:23:55
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artoa`
--

-- --------------------------------------------------------

--
-- 表的结构 `artoa_depart`
--

CREATE TABLE IF NOT EXISTS `artoa_depart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pid` int(10) NOT NULL,
  `topid` int(10) NOT NULL,
  `dateline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `topid` (`topid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `artoa_depart`
--

INSERT INTO `artoa_depart` (`id`, `name`, `pid`, `topid`, `dateline`) VALUES
(1, '株洲', 0, 0, '2015-07-29 09:12:38'),
(2, '长沙', 0, 0, '2015-07-29 09:12:43'),
(3, '湘潭', 0, 0, '2015-07-29 09:12:51'),
(4, '销售部', 1, 1, '2015-07-29 09:13:07'),
(5, '设计部', 1, 1, '2015-07-29 09:13:13'),
(7, '一组', 4, 1, '2015-07-29 09:13:23'),
(8, '二组', 4, 1, '2015-07-29 09:13:37'),
(9, '设计部', 2, 2, '2015-07-29 09:19:24'),
(10, '销售部', 2, 2, '2015-07-29 09:19:30'),
(11, '设计部1', 3, 3, '2015-07-29 09:19:41'),
(12, '销售部1', 3, 3, '2015-07-29 09:19:47'),
(14, '一组', 9, 2, '2015-07-29 09:19:58'),
(15, '二组', 9, 2, '2015-07-29 09:20:07'),
(16, '三组', 11, 3, '2015-07-29 09:20:21'),
(17, '四组', 11, 3, '2015-07-29 09:20:26');

-- --------------------------------------------------------

--
-- 表的结构 `artoa_users`
--

CREATE TABLE IF NOT EXISTS `artoa_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` smallint(8) NOT NULL,
  `did` smallint(8) NOT NULL,
  `tid` smallint(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL,
  `dateline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `artoa_users`
--

INSERT INTO `artoa_users` (`uid`, `aid`, `did`, `tid`, `name`, `admin`, `password`, `dateline`) VALUES
(4, 0, 0, 0, '321', 2, '3d186804534370c3c817db0563f0e461', '2015-07-28 02:30:35'),
(5, 0, 0, 0, '123', 0, '4297f44b13955235245b2497399d7a93', '2015-07-28 07:07:54'),
(9, 0, 0, 0, '123123', 0, 'd41d8cd98f00b204e9800998ecf8427e', '2015-07-28 08:48:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
