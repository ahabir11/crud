-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2014 at 12:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onl_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_13_045405_create_semesters_table', 1),
('2014_11_13_084516_create_photos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photos` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `photos`, `created_at`, `updated_at`) VALUES
(3, 12, 'Chrysanthemum.jpg', '2014-11-16 16:57:34', '2014-11-16 16:57:34'),
(4, 12, 'Jellyfish.jpg', '2014-11-16 16:57:36', '2014-11-16 16:57:36'),
(5, 12, 'Penguins.jpg', '2014-11-16 16:57:37', '2014-11-16 16:57:37'),
(6, 12, 'Tulips.jpg', '2014-11-16 16:57:38', '2014-11-16 16:57:38'),
(7, 12, 'Chrysanthemum.jpg', '2014-11-16 17:00:08', '2014-11-16 17:00:08'),
(8, 12, 'Koala.jpg', '2014-11-16 17:00:09', '2014-11-16 17:00:09'),
(9, 12, 'Lighthouse.jpg', '2014-11-16 17:00:10', '2014-11-16 17:00:10'),
(10, 12, 'Penguins.jpg', '2014-11-16 17:00:12', '2014-11-16 17:00:12'),
(11, 12, 'Tulips.jpg', '2014-11-16 17:00:14', '2014-11-16 17:00:14'),
(12, 12, 'Chrysanthemum.jpg', '2014-11-16 17:08:41', '2014-11-16 17:08:41'),
(13, 12, 'Desert.jpg', '2014-11-16 17:08:42', '2014-11-16 17:08:42'),
(14, 12, 'Hydrangeas.jpg', '2014-11-16 17:08:44', '2014-11-16 17:08:44'),
(15, 12, 'Jellyfish.jpg', '2014-11-16 17:08:45', '2014-11-16 17:08:45'),
(16, 12, 'Koala.jpg', '2014-11-16 17:08:47', '2014-11-16 17:08:47'),
(17, 12, 'Lighthouse.jpg', '2014-11-16 17:08:49', '2014-11-16 17:08:49'),
(18, 12, 'Penguins.jpg', '2014-11-16 17:08:51', '2014-11-16 17:08:51'),
(19, 12, 'Tulips.jpg', '2014-11-16 17:08:52', '2014-11-16 17:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seminame` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `imagename` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
