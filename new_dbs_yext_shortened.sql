-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 03:32 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_dbs_yext`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `emailAddress` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nickname`, `username`, `password`, `emailAddress`, `token`) VALUES
(1, 'admin', 'user_admin', '729c75c1c29ab8de6761711fd2bf28e0', 'inder.velocityconsultancy@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `associationsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `associationsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`associationsId`, `locationId`, `associationsName`) VALUES
(130, 30, 'Pet Trainers Association'),
(131, 31, 'BBA Accrediated'),
(132, 32, 'Upwork'),
(133, 33, 'BBA Accrediated'),
(134, 34, 'Upwork'),
(169, 35, 'BBA Accrediated'),
(170, 36, 'Upwork'),
(173, 44, 'BBA Accrediated'),
(174, 44, 'Upwork'),
(175, 36, 'BBA Accrediated'),
(176, 35, 'Upwork'),
(177, 34, 'BBA Accrediated'),
(178, 33, 'Upwork'),
(179, 32, 'BBA Accrediated'),
(180, 31, 'Upwork'),
(181, 30, 'BBA Accrediated'),
(182, 29, 'Upwork'),
(183, 30, 'BBA Accrediated'),
(184, 31, 'Upwork'),
(185, 32, 'BBA Accrediated'),
(186, 33, 'Upwork'),
(187, 34, 'BBA Accrediated'),
(188, 35, 'Upwork'),
(189, 36, 'BBA Accrediated'),
(190, 60, 'Upwork'),
(191, 61, 'BBA Accrediated'),
(192, 61, 'Upwork'),
(193, 62, 'BBA Accrediated'),
(194, 62, 'Upwork'),
(201, 9, 'BBA Accrediated'),
(202, 9, 'Upwork'),
(213, 63, 'BBA Accrediated'),
(214, 63, 'Upwork'),
(215, 64, 'BBA Accrediated'),
(216, 64, 'Upwork');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `brandsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandsId`, `locationId`, `brandsName`) VALUES
(75, 29, 'Staples'),
(84, 34, 'Thomastik'),
(85, 34, 'Pirastro'),
(86, 34, 'D\'Addario'),
(87, 34, 'Larsen'),
(88, 34, 'Jargar'),
(91, 36, 'Brand 1'),
(92, 36, 'Brand 2'),
(139, 30, 'Top Brands for Pets'),
(140, 44, 'Divi Theme'),
(141, 44, 'Wordpress'),
(142, 30, 'Divi Theme'),
(143, 31, 'Wordpress'),
(178, 32, 'Divi Theme'),
(179, 33, 'Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoriesId` int(10) NOT NULL,
  `categoryID` int(20) NOT NULL,
  `locationId` int(10) NOT NULL,
  `categoriesName` text NOT NULL,
  `categoriesNameAlias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoriesId`, `categoryID`, `locationId`, `categoriesName`, `categoriesNameAlias`) VALUES
(272, 61, 29, 'Office Supply Store', 'office-supply-store'),
(273, 766, 29, 'Writing Services', 'writing-services'),
(274, 2310, 29, 'School Supply Store', 'school-supply-store'),
(287, 263, 31, 'Clothing Store', 'clothing-store'),
(289, 2108, 32, 'Shoe Repair Shop', 'shoe-repair-shop'),
(290, 1195, 33, 'Mexican Restaurant', 'mexican-restaurant'),
(293, 499, 34, 'Musical Instrument Store', 'musical-instrument-store'),
(294, 2006, 34, 'Piano Repair Service', 'piano-repair-service'),
(295, 1050, 35, 'Coffin Supplier', 'coffin-supplier'),
(297, 967, 36, 'University', 'university'),
(470, 246, 30, 'Pet Supply Store', 'pet-supply-store'),
(471, 1675, 30, 'Pet Groomer', 'pet-groomer'),
(472, 2286, 30, 'Animal Hospital', 'animal-hospital'),
(473, 1670, 30, 'Dog Walker', 'dog-walker'),
(481, 21, 44, 'Web Development', 'web-development');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(10) NOT NULL,
  `reviewId` int(10) NOT NULL,
  `commentTimestamp` datetime NOT NULL,
  `commentAuthorName` text NOT NULL,
  `commentContent` text NOT NULL,
  `commentAuthorPhotoUrl` text NOT NULL,
  `commentOwnerResponse` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `reviewId`, `commentTimestamp`, `commentAuthorName`, `commentContent`, `commentAuthorPhotoUrl`, `commentOwnerResponse`) VALUES
(10, 7, '2019-06-19 11:44:45', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0),
(15, 10, '2019-09-04 12:36:51', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0),
(16, 10, '2019-09-04 12:37:40', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0),
(17, 11, '2019-09-04 12:40:53', 'Comment Author Name', 'lorem ipsum so content so dolar ipsum to discusss', 'authorPhotoUrl.com/link.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `emailsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `emailsAddress` text,
  `emailsDescription` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`emailsId`, `locationId`, `emailsAddress`, `emailsDescription`) VALUES
(162, 29, 'pencils@parking.com', ''),
(170, 34, 'mli@yext.com', ''),
(171, 35, 'test@test.com', ''),
(173, 36, 'test@test.com', ''),
(264, 30, 'johndoe@friendlypets.com', ''),
(265, 30, 'janedoe@friendlypets.com', ''),
(266, 44, 'velocity.consult@gmail.com', 'Gmails email'),
(267, 44, 'info@velocityconsultancy.com', 'Owners emails'),
(268, 44, 'developers@velocityconsultancy.com', 'Employees emails'),
(269, 30, 'velocity.consult@gmail.com', 'Gmails email'),
(270, 30, 'info@velocityconsultancy.com', 'Owners emails'),
(271, 30, 'developers@velocityconsultancy.com', 'Employees emails'),
(323, 31, 'velocity.consult@gmail.com', 'Gmails email'),
(324, 31, 'info@velocityconsultancy.com', 'Owners emails'),
(325, 31, 'developers@velocityconsultancy.com', 'Employees emails'),
(329, 32, 'velocity.consult@gmail.com', 'Gmails email'),
(330, 32, 'info@velocityconsultancy.com', 'Owners emails'),
(331, 32, 'developers@velocityconsultancy.com', 'Employees emails'),
(332, 33, 'velocity.consult@gmail.com', 'Gmails email'),
(333, 33, 'info@velocityconsultancy.com', 'Owners emails'),
(334, 33, 'developers@velocityconsultancy.com', 'Employees emails'),
(335, 34, 'velocity.consult@gmail.com', 'Gmails email');

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

CREATE TABLE `friday` (
  `fridayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friday`
--

INSERT INTO `friday` (`fridayId`, `locationId`, `starts`, `ends`) VALUES
(159, 29, '09:00:00', '17:00:00'),
(167, 29, '08:30:00', '17:30:00'),
(168, 29, '08:00:00', '17:00:00'),
(170, 30, '09:00:00', '17:00:00'),
(171, 30, '09:00:00', '17:00:00'),
(173, 31, '09:00:00', '21:00:00'),
(264, 31, '09:00:00', '13:00:00'),
(265, 32, '15:00:00', '20:00:00'),
(269, 32, '10:00:00', '13:30:00'),
(270, 33, '14:30:00', '17:00:00'),
(271, 33, '17:30:00', '19:20:00'),
(323, 34, '10:00:00', '13:30:00'),
(324, 34, '14:30:00', '17:00:00'),
(325, 35, '17:30:00', '19:20:00'),
(329, 35, '10:00:00', '13:30:00'),
(330, 36, '14:30:00', '17:00:00'),
(331, 36, '17:30:00', '19:20:00'),
(332, 36, '10:00:00', '13:30:00'),
(333, 44, '14:30:00', '17:00:00'),
(334, 44, '17:30:00', '19:20:00'),
(335, 44, '10:00:00', '13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imagesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `width` int(10) DEFAULT '0',
  `imagesType` varchar(10) DEFAULT NULL,
  `imagesUrl` text,
  `height` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imagesId`, `locationId`, `width`, `imagesType`, `imagesUrl`, `height`) VALUES
(328, 29, 259, 'LOGO', 'http://a.mktgcdn.com/p/tuothFN_xWJRCPbya6TcXjlvIRI43C0rZpEgBbXm5xU/1.0000/259x259.jpg', 259),
(329, 29, 432, 'GALLERY', 'http://a.mktgcdn.com/p/J_dWbgHK-zjfkPfhzTY4g5VWcGQTTV9yzFLOEYR2IZQ/432x324.jpg', 324),
(330, 29, 259, 'GALLERY', 'http://a.mktgcdn.com/p/tuothFN_xWJRCPbya6TcXjlvIRI43C0rZpEgBbXm5xU/259x194.jpg', 194),
(379, 31, 275, 'GALLERY', 'http://a.mktgcdn.com/p/ePOl5Bsc3-12dc5PBXTa02iiPJ6IR8TKF97376ZCr48/275x183.jpg', 183),
(380, 31, 256, 'GALLERY', 'http://a.mktgcdn.com/p/_0fRc6QevmKgXRTj233wkPtgG_QROBNDXtZ0biteCoA/256x256.png', 256),
(381, 33, 225, 'GALLERY', 'http://a.mktgcdn.com/p/QGoETv6GtDv2FUU7pt29pvIsN3l7nxugmUq8_miNo5k/225x225.jpg', 225),
(382, 33, 275, 'GALLERY', 'http://a.mktgcdn.com/p/J59JLlv06W7sBWn-4X-6h2bNmq_a4EjCFe3JdUYJE-Q/275x183.jpg', 183),
(388, 34, 600, 'LOGO', 'http://a.mktgcdn.com/p/F8jeDcgSht8Nt8AyYui9-xdbYBTN76FClbDgbTzR6uY/1.0000/600x600.jpg', 600),
(389, 34, 500, 'GALLERY', 'http://a.mktgcdn.com/p/Lvi0mhqVks080s3rfEw10XDu6AcG2CEx1Uj5s1doUdg/500x375.jpg', 375),
(390, 34, 800, 'GALLERY', 'http://a.mktgcdn.com/p/c0XZaP6FDYXy1BszZiNGUde9GW6WKuGIQAsn64PH1TI/800x600.jpg', 600),
(391, 34, 1280, 'GALLERY', 'http://a.mktgcdn.com/p/NjSfKi5jWH93xh43jS5IAA-zVRbFxS4BAuWHCs5_uSM/1280x853.webp', 853),
(392, 34, 1969, 'GALLERY', 'http://a.mktgcdn.com/p/TVdoEZ21bHSSbLLkdWwGCDPkt-3dPqRoc8QL8zbkEBo/1969x1307.png', 1307),
(393, 35, 1024, 'LOGO', 'http://a.mktgcdn.com/p/SJhX79K6xNIiySrZCdL1txYvEJ1VEb1PEu0P9T8DqZ8/1024x1024.jpg', 1024),
(394, 35, 291, 'GALLERY', 'http://a.mktgcdn.com/p/07gKn5hhbwQvp93KznYMfpOLWOkI2djMDOZEMYrvABU/291x173.jpg', 173),
(395, 35, 960, 'GALLERY', 'http://a.mktgcdn.com/p/zMDEFOQPuxgWjqk7j7p1jxto1pjJXdhQKbgAOo4mSmc/960x642.jpg', 642),
(396, 35, 600, 'GALLERY', 'http://a.mktgcdn.com/p/4MVgw0tRIGJ8IyHmW85Q8ybJexJAyBvP0mUJjB2kY4I/600x600.jpg', 600),
(408, 36, 500, 'LOGO', 'http://a.mktgcdn.com/p/OERqZjW9ULn91Z6R8QPI65u2UuCH3332gHUoGI6yXr0/500x500.png', 500),
(409, 36, 640, 'GALLERY', 'http://a.mktgcdn.com/p/oxeT4JSdpUl0oqsGiD_d2YvabOFVgAKIvza6hSvo3OA/640x640.jpg', 640),
(410, 36, 1224, 'GALLERY', 'http://a.mktgcdn.com/p/QMfIWkk6ZcUpfnd1aRJ2NM-sjXLRr4Lp59M7hoh34AY/1224x1224.jpg', 1224),
(411, 36, 1224, 'GALLERY', 'http://a.mktgcdn.com/p/6km01UKNcwqEd77PLgNTRryBeLapDE_M6aCnfN74aFQ/1224x1224.jpg', 1224),
(412, 36, 1224, 'GALLERY', 'http://a.mktgcdn.com/p/hQpChjU5CAFAl3hhm8EIsMA1H7HeXrgf8U73UxTheVw/1224x1224.jpg', 1224),
(413, 36, 120, 'GALLERY', 'http://a.mktgcdn.com/p/-6J-nnv3dg9YnHKYueyQb2oAW6srrLgF9O_jbCoZEv0/120x204.jpg', 204),
(414, 36, 2100, 'GALLERY', 'http://a.mktgcdn.com/p/lsvt19Fd3wUG7-5fy2nSDsYBa32kZk7D5vJX9WobGAA/2100x1500.jpg', 1500),
(415, 36, 300, 'GALLERY', 'http://a.mktgcdn.com/p/3e6kZnAHWOYLYk9IDVONi4tfEKm4bXS64Cqx48k8QXk/300x168.jpg', 168),
(416, 36, 1867, 'GALLERY', 'http://a.mktgcdn.com/p/4Uw0lX-9r7JOl0kKq_NKDOTCtplJ9r_vyPoIgXSR5iY/1867x2800.jpg', 2800),
(417, 36, 600, 'GALLERY', 'http://a.mktgcdn.com/p/UZRSTlJKWvxDrUbiNW2i8_zzQMnoifmnh2Ppx1pf1Tw/600x424.jpg', 424),
(418, 36, 300, 'GALLERY', 'http://a.mktgcdn.com/p/oCAZNucC9a-uvU2rAwMfTiBk3Qu534PgaBRvgDOd384/300x168.jpg', 168),
(1099, 30, 1024, 'LOGO', 'http://a.mktgcdn.com/p/Ngf7xraAd4ScKcQ7PWdiXB4-YD7U_1aSv8zJ3z5FueE/1024x768', 768),
(1100, 30, 600, 'GALLERY', 'http://a.mktgcdn.com/p/OJCcHtQOalZ36E9S6tg6mufdRWsYlMYEEWY41RjRA1c/600x458.jpg', 458),
(1101, 30, 1001, 'GALLERY', 'http://a.mktgcdn.com/p/p3i81_XZMg1qrwRyj3hPswUkT5NNBWbUNNQsJAEFvgk/1001x554.png', 554),
(1102, 30, 1024, 'GALLERY', 'http://a.mktgcdn.com/p/Ngf7xraAd4ScKcQ7PWdiXB4-YD7U_1aSv8zJ3z5FueE/1024x768.jpg', 768),
(1103, 30, 960, 'GALLERY', 'http://a.mktgcdn.com/p/zMDEFOQPuxgWjqk7j7p1jxto1pjJXdhQKbgAOo4mSmc/960x642.jpg', 642),
(1104, 30, 900, 'GALLERY', 'http://a.mktgcdn.com/p/37iiifewLvpuVtUArrAS8VzfhHtwYofLc_SKwe6Bzk4/1.0000/900x900.jpg', 900),
(1105, 30, 1400, 'GALLERY', 'http://a.mktgcdn.com/p/_suOZTndvaDNq9rTN48ojp1cJJdct69J_J2-S8lxTCA/1400x796.jpg', 796),
(1106, 30, 680, 'GALLERY', 'http://a.mktgcdn.com/p/VINwC19yB_k66CcMGDrFrlIvWr3wL6sYpWz0SDvjxPI/680x508.png', 508),
(1107, 30, 610, 'GALLERY', 'http://a.mktgcdn.com/p/JXbXq7PpA0-oxDMWOJaELoqeKrZHjNwMLQd0Rcsj-0s/610x458.jpg', 458),
(1108, 30, 600, 'GALLERY', 'http://a.mktgcdn.com/p/WU2UBHeWqHsigoI9WvHxK4fMbp3O3vU9cqRCUmgWrUE/600x450.jpg', 450),
(1109, 30, 500, 'GALLERY', 'http://a.mktgcdn.com/p/HUViNxLYaNWk_uYabKAO8b61cCNjio2RrHjCVthMOGE/500x350.jpg', 350),
(1110, 30, 800, 'GALLERY', 'http://a.mktgcdn.com/p/wzyWIfcfzMdq-ubR2vGHMhirGugUCpJpiSyvvotAVYA/800x533.jpg', 533),
(1111, 30, 2448, 'GALLERY', 'http://a.mktgcdn.com/p/5F4I68X3PPp1ZXgEEMwPm1qUpHutWs3lWXvXPzbD3oE/2448x3264.jpg', 3264),
(1112, 30, 1200, 'GALLERY', 'http://a.mktgcdn.com/p/Ehh_lM55772x5T-s7DSi1cR0OsPsWJSlKF6hvcWVNAU/1200x800.jpg', 800),
(1113, 30, 600, 'GALLERY', 'http://a.mktgcdn.com/p/0PRGPzH1VdX3yYhKkXHHPZyfTOVeUeAKnxpmX3_293g/600x600.jpg', 600),
(1114, 30, 700, 'GALLERY', 'http://a.mktgcdn.com/p/zasi8sXRhBWzjg31ymEg4iCtJpmokii0ttYxUoDvWc4/700x500.jpg', 500),
(1115, 44, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(1116, 44, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(1117, 44, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(1118, 44, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(1119, 44, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(1120, 32, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(1121, 32, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keywordsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `keywordsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keywordsId`, `locationId`, `keywordsName`) VALUES
(169, 29, 'pen'),
(170, 29, 'marker'),
(177, 30, 'Violin'),
(178, 30, 'Viola'),
(179, 31, 'Cello'),
(180, 31, 'Bass'),
(181, 32, 'Luthier'),
(182, 32, 'Repair'),
(183, 33, 'Web Development'),
(184, 33, 'SEO'),
(185, 34, 'Graphics'),
(186, 34, 'API'),
(187, 35, 'Web Design'),
(188, 35, 'Web Development'),
(189, 36, 'SEO'),
(190, 36, 'Graphics'),
(191, 44, 'API'),
(192, 44, 'Web Design'),
(278, 30, 'Web Development'),
(279, 31, 'SEO'),
(280, 32, 'Graphics'),
(281, 33, 'API'),
(282, 34, 'Web Design'),
(288, 35, 'Web Development'),
(289, 36, 'SEO'),
(290, 52, 'Graphics'),
(291, 52, 'API'),
(292, 52, 'Web Design'),
(293, 53, 'Web Development'),
(294, 53, 'SEO'),
(295, 53, 'Graphics'),
(296, 53, 'API'),
(297, 53, 'Web Design'),
(298, 54, 'Web Development'),
(299, 54, 'SEO'),
(300, 54, 'Graphics'),
(301, 54, 'API'),
(302, 54, 'Web Design'),
(303, 55, 'Web Development'),
(304, 55, 'SEO'),
(305, 55, 'Graphics'),
(306, 55, 'API'),
(307, 55, 'Web Design'),
(308, 56, 'Web Development'),
(309, 56, 'SEO'),
(310, 56, 'Graphics'),
(311, 56, 'API'),
(312, 56, 'Web Design'),
(313, 57, 'Web Development'),
(314, 57, 'SEO'),
(315, 57, 'Graphics'),
(316, 57, 'API'),
(317, 57, 'Web Design'),
(318, 58, 'Web Development'),
(319, 58, 'SEO'),
(320, 58, 'Graphics'),
(321, 58, 'API'),
(322, 58, 'Web Design'),
(323, 59, 'Web Development'),
(324, 59, 'SEO'),
(325, 59, 'Graphics'),
(326, 59, 'API'),
(327, 59, 'Web Design'),
(328, 60, 'Web Development'),
(329, 60, 'SEO'),
(330, 60, 'Graphics'),
(331, 60, 'API'),
(332, 60, 'Web Design'),
(333, 61, 'Web Development'),
(334, 61, 'SEO'),
(335, 61, 'Graphics'),
(336, 61, 'API'),
(337, 61, 'Web Design'),
(338, 62, 'Web Development'),
(339, 62, 'SEO'),
(340, 62, 'Graphics'),
(341, 62, 'API'),
(342, 62, 'Web Design'),
(358, 9, 'Web Development'),
(359, 9, 'SEO'),
(360, 9, 'Graphics'),
(361, 9, 'API'),
(362, 9, 'Web Design'),
(388, 63, 'Web Development'),
(389, 63, 'SEO'),
(390, 63, 'Graphics'),
(391, 63, 'API'),
(392, 63, 'Web Design'),
(393, 64, 'Web Development'),
(394, 64, 'SEO'),
(395, 64, 'Graphics'),
(396, 64, 'API'),
(397, 64, 'Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `languagesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `languagesName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languagesId`, `locationId`, `languagesName`) VALUES
(103, 29, 'English'),
(198, 29, 'Hindi'),
(199, 30, 'Pig Latin'),
(200, 30, 'English'),
(201, 31, 'Hindi Updated'),
(202, 31, 'English'),
(203, 32, 'Hindi Updated'),
(238, 32, 'English'),
(239, 33, 'Hindi Updated'),
(242, 33, 'English'),
(243, 34, 'Hindi Updated'),
(244, 34, 'English'),
(245, 35, 'Hindi Updated'),
(246, 36, 'English'),
(247, 44, 'Hindi Updated'),
(248, 44, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `listsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `listsName` text,
  `listsDescription` text,
  `listsType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listsId`, `locationId`, `listsName`, `listsDescription`, `listsType`) VALUES
(262, 29, 'Catering Services', 'Products and Services', 'PRODUCTS'),
(263, 29, 'Brunch Menu', 'Menu', 'MENU'),
(264, 29, 'Nail Care3', 'Products and Services', 'PRODUCTS'),
(280, 32, 'Brunch Menu', 'Menu', 'MENU'),
(281, 32, 'Catering Services', 'Products and Services', 'PRODUCTS'),
(282, 32, 'Our Staff', 'Bios', 'BIOS'),
(283, 33, 'ashley menu test', 'Menu', 'MENU'),
(290, 34, 'Brunch Menu', 'Menu', 'MENU'),
(291, 34, 'Drinks', 'Menu', 'MENU'),
(292, 34, 'Catering Services', 'Products and Services', 'PRODUCTS'),
(293, 34, 'Our Staff', 'Bios', 'BIOS'),
(294, 34, 'Strings at Marvin\'s', 'Products and Services', 'PRODUCTS'),
(295, 34, 'Events Calendar', 'Events Calendar', 'EVENTS'),
(296, 35, 'Our Staff', 'Bios', 'BIOS'),
(297, 35, 'Toy Products', 'Products and Services', 'PRODUCTS'),
(305, 36, 'test', 'Bios', 'BIOS'),
(306, 36, 'Demo 5', 'Menu', 'MENU'),
(307, 36, 'Test', 'Calendar', 'EVENTS'),
(308, 36, 'Demo2', 'Menu', 'MENU'),
(309, 36, 'Demo 3', 'Menu', 'MENU'),
(310, 36, 'Demo Menu', 'Menu', 'MENU'),
(311, 36, 'Demo 4', 'Menu', 'MENU'),
(484, 30, 'Brunch Menu', 'Menu', 'MENU'),
(485, 30, 'Catering Services', 'Products and Services', 'PRODUCTS'),
(486, 30, 'Our Staff', 'Bios', 'BIOS'),
(487, 30, 'Events Calendar', 'Events Calendar', 'EVENTS'),
(488, 44, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(489, 44, 'See My Products', 'Products and Services', 'PRODUCTS'),
(490, 44, 'Services We Offer44', 'Products and Services', 'PRODUCTS'),
(491, 44, 'See My Products', 'Products and Services', 'PRODUCTS');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationId` int(10) NOT NULL,
  `yextID` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'BLOCKED',
  `name` text NOT NULL,
  `locationNameAlias` text NOT NULL,
  `address` text NOT NULL,
  `visible` varchar(10) DEFAULT 'false',
  `address2` text,
  `city` text NOT NULL,
  `displayAddress` text,
  `countryCode` varchar(5) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `description` text,
  `displayLatitude` text NOT NULL,
  `displayLongitude` text NOT NULL,
  `routableLatitude` text,
  `routableLongitude` text,
  `hoursDisplayText` varchar(100) DEFAULT NULL,
  `specialOfferMessage` text,
  `specialOfferUrl` text,
  `paymentOptions` text,
  `twitterHandle` text,
  `facebookPageUrl` text,
  `attributionImageWidth` int(10) NOT NULL DEFAULT '0',
  `attributionImageDescription` text,
  `attributionImageUrl` text,
  `attributionImageHeight` int(10) NOT NULL DEFAULT '0',
  `attributionUrl` text,
  `closed` varchar(10) DEFAULT NULL,
  `yearEstablished` int(5) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationId`, `yextID`, `status`, `name`, `locationNameAlias`, `address`, `visible`, `address2`, `city`, `displayAddress`, `countryCode`, `postalCode`, `state`, `description`, `displayLatitude`, `displayLongitude`, `routableLatitude`, `routableLongitude`, `hoursDisplayText`, `specialOfferMessage`, `specialOfferUrl`, `paymentOptions`, `twitterHandle`, `facebookPageUrl`, `attributionImageWidth`, `attributionImageDescription`, `attributionImageUrl`, `attributionImageHeight`, `attributionUrl`, `closed`, `yearEstablished`, `created`) VALUES
(29, 5235128, 'ACTIVE', 'Pen and Marker Store', 'pen-and-marker-store', '508 S 8th Street', '1', '', 'Salina', '508 S 8th Street , Salina, US, 67401, KS', 'US', '67401', 'KS', 'We specialize in providing high quality pens and pencils. AND MARKERS', '38.83194', '-97.61191', '38.83193222424', '-97.6114905387', 'M-W 9am-5pm, Th 9am-12pm, 4pm-8pm, F 9am-5pm, Sa Closed, Su 24hr (Hours vary)', 'Call today!', 'https://www.penstore.com/', NULL, 'crosspens', 'https://www.facebook.com/pages/Pen-and-Pencil-Store/1860256840717119', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', '', 2016, '2019-09-18 11:57:24'),
(30, 1236382, 'ACTIVE', 'Friendly Pet Grooming', 'friendly-pet-grooming', '510 Colton Ave', '1', 'Suite 1B', 'Burlington', 'Next to SMS Mall', 'US', '58722', 'ND', 'Keeping your pets fresh since 09/18/2019 05:00', '48.276239857078', '-101.4230132103', '48.276305', '-101.423487', 'M-Sa 9am-1pm, 3pm-8pm, Su 11am-2:30pm (Walk ins welcome!)', 'Groomtastic: 09/18/2019 05:00', 'http://friendlypets.wix.com/friendlypetgrooming?time=201909180500', NULL, 'friendlypetgrooming', 'https://www.facebook.com/pages/Friendly-Pet-Grooming/204754400002173', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', '', 1988, '2019-09-18 11:57:24'),
(31, 10838834, 'ACTIVE', 'Al\'s Athletic Apparel', 'als-athletic-apparel', '2 Victory Road', '1', '', 'Suffern', '', 'US', '10901', 'NY', 'They live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then', '41.128061', '-74.125333', '41.128180701599', '-74.124605894247', 'M-Tu 9am-5pm, W 9am-6pm, Th 8am-12pm, F Closed, Sa 10am-12pm, 4pm-8pm, Su 24hr', 'Buy 2 socks get 1 free!', '', NULL, '', '', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', '', 0, '2019-09-18 11:57:24'),
(32, 2486232, 'ACTIVE', 'Ray\'s Shoe Repair', 'rays-shoe-repair', '458 Hawkins Avenue', '1', '', 'Ronkonkoma', '', 'US', '11779', 'NY', 'Since 1969, we have provided shoe repair services using only the highest-quality materials. At Ray\'s Shoe Repair, we value nothing more than customer satisfaction. When our customers walk out of our store, we make sure that they leave happy with their repaired shoes.\n\nOur shoe repairmen can also repair a wide array of leather goods, such as leather jackets, pocketbooks, belts, luggage, briefcases, UGG boots, boat covers, holsters, saddles, harnesses, hunting &amp; hiking gear, and custom orthopedic orders. If you doubt we can repair a leather good, try us!', '40.825403', '-73.1075583', '40.825099', '-73.107559', 'M Closed, Tu 8:30am-5:30am, W-Sa 8:30am-5:30pm, Su Closed', 'Call today!', '', NULL, '', 'https://www.facebook.com/204754400002173/', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', 'false', 1969, '2019-09-18 11:57:24'),
(33, 12649964, 'ACTIVE', 'Ash Taco Joint', 'ash-taco-joint', '4409 Quail Hollow Road', '1', 'ste 2', 'Dallas', '', 'US', '75287', 'TX', '', '32.9996927', '-96.8339065', '32.999493580278', '-96.834053877319', 'M-Sa 8am-5pm, Su Closed', 'Call now!', 'http://www.google.com', NULL, '', '', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', '', 0, '2019-09-18 11:57:24'),
(34, 2086817, 'ACTIVE', 'Marvin\'s Violins', 'marvins-violins', '2416 Perry Street', '1', 'Unit 2050', 'Madison', 'In the shopping mall(NE)', 'US', '53713', 'WI', 'We offer a wide range of services from beginner\'s rentals to rare instrument repair. Please call me today!\n\n\nHi', '43.037902', '-89.396779', '43.037898', '-89.396548', 'M-F 9am-5pm, Sa 24hr, Su Closed', 'Check your instrument for open seams tomorrow!', 'http://www.yext.com/', NULL, 'yext', 'https://www.facebook.com/pages/Marvins-Violins/499482773745686', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', 'false', 2015, '2019-09-18 11:57:24'),
(35, 10438781, 'ACTIVE', 'Coffin\'s Coffins', 'coffins-coffins', '7 South St', '1', '', 'Morristown', '', 'US', '07960', 'NJ', 'The last purchase you\'ll ever need to make!! ;)', '40.79608883', '-74.48068517', '40.79601896421', '-74.480776569597', 'M-Su 9am-5pm (Walk ins welcome!)', 'Call today for more information!', 'https://www.overnightcaskets.com', NULL, '', 'https://www.facebook.com/HanksAvocados55/', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', '', 0, '2019-09-18 11:57:24'),
(36, 1469835, 'ACTIVE', 'Krusty Burgerss 1469835', 'krusty-burgerss-1469835', '1 Madison Ave 1 Madison Avenue', '1', '', 'New York', '', 'US', '10010', 'NY', 'We start with authentic, letter-graded meat, and process the hell out of it.', '40.74127', '-73.98735', '40.741403908363', '-73.987637586619', 'M-F 9am-9pm, Sa 10am-7pm, Su 11am-6pm (Yes, this is indeed additional hours text.)', 'Updated by LOG', '', NULL, '', 'https://www.facebook.com/Krusty-Burgerss-CA-455923084747909/', 143, 'Yext', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, '', 'false', 1950, '2019-09-18 11:57:24'),
(44, 123456, 'LIVE', 'Velocity Consultancy', 'velocity-consultancy', 'Sej Plaza', 'true', '', 'Mumbai', 'G-4 Sej Plaza, Near Nutun School', 'IN', '400097', 'MH', '', '29.70468', '-95.41429', '', '', '', '', '', NULL, '', '', 0, '', '', 0, '', '', 2008, '2019-09-24 12:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE `monday` (
  `mondayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monday`
--

INSERT INTO `monday` (`mondayId`, `locationId`, `starts`, `ends`) VALUES
(157, 29, '09:00:00', '17:00:00'),
(164, 31, '09:00:00', '17:00:00'),
(165, 33, '08:00:00', '17:00:00'),
(167, 34, '09:00:00', '17:00:00'),
(168, 35, '09:00:00', '17:00:00'),
(170, 36, '09:00:00', '21:00:00'),
(261, 30, '09:00:00', '13:00:00'),
(262, 30, '15:00:00', '20:00:00'),
(266, 32, '10:00:00', '13:30:00'),
(267, 32, '14:30:00', '17:00:00'),
(268, 33, '17:30:00', '19:20:00'),
(320, 34, '10:00:00', '13:30:00'),
(321, 34, '14:30:00', '17:00:00'),
(322, 34, '17:30:00', '19:20:00'),
(326, 36, '10:00:00', '13:30:00'),
(327, 36, '14:30:00', '17:00:00'),
(328, 44, '17:30:00', '19:20:00'),
(329, 44, '10:00:00', '13:30:00'),
(330, 44, '14:30:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paymentoptions`
--

CREATE TABLE `paymentoptions` (
  `paymentOptionId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `paymentOptionsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentoptions`
--

INSERT INTO `paymentoptions` (`paymentOptionId`, `locationId`, `paymentOptionsName`) VALUES
(272, 29, 'Apple Pay'),
(273, 29, 'Discover'),
(274, 29, 'Invoice'),
(275, 29, 'MasterCard'),
(276, 29, 'Visa'),
(292, 31, 'American Express'),
(293, 31, 'Discover'),
(294, 31, 'MasterCard'),
(295, 31, 'Visa'),
(299, 34, 'American Express'),
(300, 34, 'MasterCard'),
(301, 34, 'Visa'),
(302, 35, 'Discover'),
(303, 35, 'MasterCard'),
(304, 35, 'Visa'),
(315, 36, 'American Express'),
(316, 36, 'Cash'),
(317, 36, 'Check'),
(318, 36, 'Diners Club'),
(319, 36, 'Discover'),
(320, 36, 'Financing'),
(321, 36, 'Invoice'),
(322, 36, 'MasterCard'),
(323, 36, 'Traveler\'s Check'),
(324, 36, 'Visa'),
(535, 30, 'American Express'),
(536, 30, 'Check'),
(537, 30, 'Discover'),
(538, 30, 'MasterCard'),
(539, 30, 'Visa'),
(582, 31, 'VISA'),
(583, 31, 'MASTER CARD'),
(584, 31, 'VISA'),
(585, 32, 'MASTER CARD'),
(586, 32, 'VISA'),
(587, 32, 'MASTER CARD'),
(588, 32, 'VISA'),
(589, 33, 'MASTER CARD'),
(590, 34, 'VISA'),
(591, 34, 'MASTER CARD'),
(592, 34, 'VISA'),
(593, 34, 'MASTER CARD'),
(594, 35, 'VISA'),
(595, 35, 'MASTER CARD'),
(596, 35, 'VISA'),
(597, 35, 'MASTER CARD'),
(598, 36, 'VISA'),
(599, 35, 'MASTER CARD'),
(606, 36, 'VISA'),
(607, 36, 'MASTER CARD'),
(618, 44, 'VISA'),
(619, 44, 'MASTER CARD'),
(620, 44, 'VISA'),
(621, 44, 'MASTER CARD');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `phoneId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `numbers` varchar(15) DEFAULT NULL,
  `phonesCountryCode` varchar(5) DEFAULT NULL,
  `phonesDescription` text,
  `phonesType` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`phoneId`, `locationId`, `numbers`, `phonesCountryCode`, `phonesDescription`, `phonesType`) VALUES
(267, 29, '7329319998', '1', 'Main', 'Main'),
(283, 29, '8453009932', '1', 'Main', 'Main'),
(285, 30, '6315883428', '1', 'Main', 'Main'),
(286, 31, '9724002942', '1', 'Main', 'Main'),
(289, 31, '5168519027', '1', 'Main', 'Main'),
(290, 32, '2032530861', '1', 'Alt', 'Alt'),
(291, 32, '9084488333', '1', 'Main', 'Main'),
(294, 33, '7188782507', '1', 'Main', 'Main'),
(295, 33, '5852145689', '1', 'Mobile', 'Mobile'),
(514, 34, '7754422291', '1', 'Main', 'Main'),
(515, 34, '7754422293', '1', 'Alt', 'Alt'),
(516, 35, '7754422292', '1', 'Fax', 'Fax'),
(517, 35, '7754422295', '1', 'Mobile', 'Mobile'),
(518, 36, '8005555555', '1', 'Toll Free', 'Toll Free'),
(526, 36, '022-12345678', '+91', 'Office', 'Office'),
(527, 44, '022-12345678', '+91', 'Office', 'Office'),
(528, 44, '022-12345678', '+91', 'Office', 'Office'),
(529, 44, '022-12345678', '+91', 'Office', 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `productsName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productsId`, `locationId`, `productsName`) VALUES
(78, 29, 'Violins'),
(79, 29, 'Violas'),
(80, 30, 'Cellos'),
(81, 30, 'Basses'),
(82, 31, 'Strings'),
(83, 31, 'Accessories'),
(130, 32, 'Pet Products'),
(131, 32, 'Product One'),
(132, 33, 'Product Two'),
(133, 33, 'Product One'),
(134, 34, 'Product Two'),
(169, 34, 'Product One'),
(170, 35, 'Product Two'),
(173, 35, 'Product One'),
(174, 36, 'Product Two'),
(175, 36, 'Product One'),
(176, 44, 'Product Two'),
(177, 44, 'Product One');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `reviewStatus` varchar(20) NOT NULL,
  `reviewTimestamp` datetime NOT NULL,
  `reviewAuthorName` varchar(100) NOT NULL,
  `reviewAuthorPhotoUrl` text NOT NULL,
  `reviewTitle` text NOT NULL,
  `reviewContent` text NOT NULL,
  `reviewUrl` text NOT NULL,
  `reviewSource` text NOT NULL,
  `reviewRating` float(2,1) NOT NULL,
  `reviewGenerated` tinyint(1) DEFAULT '0',
  `reviewFlagReason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `locationId`, `reviewStatus`, `reviewTimestamp`, `reviewAuthorName`, `reviewAuthorPhotoUrl`, `reviewTitle`, `reviewContent`, `reviewUrl`, `reviewSource`, `reviewRating`, `reviewGenerated`, `reviewFlagReason`) VALUES
(8, 30, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(9, 31, 'ACTIVE', '2019-06-20 08:45:53', 'Author Name', 'somerultoauthorphoto.com/123.jpg', 'Review Title', 'Review Content', 'reviewurl.com/reviews', 'Review Source', 4.0, 0, NULL),
(10, 32, 'ACTIVE', '2019-09-04 12:32:38', 'Author Name', 'somerultoauthorphoto.com/123.jpg', 'Review Title', 'Review Content', 'reviewurl.com/reviews', 'Review Source', 4.0, 0, NULL),
(11, 33, 'ACTIVE', '2019-09-04 12:39:47', 'Author Name Two', 'somerultoauthorphoto.com/123.jpg', 'Review Title', 'Review Content', 'reviewurl.com/reviews', 'Review Source', 5.0, 0, NULL),
(12, 29, 'ACTIVE', '2019-09-14 06:25:18', 'kieth', 'https://secure.gravatar.com/avatar/ceb3b0ac8505f53c921d685e6b7039a2?s=94&amp;d=mm&amp;r=g', 'Good but more expensive', 'This place always smells really nice and it’s so enjoyable to sit in the waiting room even for a few minutes when I’m just popping in for eyebrow waxing. I love their green tea infused with fruits! It is noticeably more expensive which is why I chose Bella Sante first.', 'reviewurl.com/reviews', 'Google', 4.0, 0, NULL),
(13, 29, 'ACTIVE', '2019-09-14 06:29:18', 'ricordo', 'https://secure.gravatar.com/avatar/ceb3b0ac8505f53c921d685e6b7039a2?s=94&amp;d=mm&amp;r=g', 'I\'d say in general, a massage here is… good.', 'They tend to be a bit more on the relaxing side. The masseuses DO know their stuff, but it’s not quite the intense, athletic-benefiting massage I’ve found other places. I’ve had probably 10 different masseuses here over the past 5-6 years, and I’ve never had a bad massage, and a few fantastic ones. They do book up quickly during peak hours (weekends, nights), so make sure to make appointments well ahead of time.', 'reviewurl.com/reviews', 'Google', 4.0, 0, NULL),
(14, 29, 'ACTIVE', '2019-09-14 07:41:37', 'ricordo', 'https://secure.gravatar.com/avatar/ceb3b0ac8505f53c921d685e6b7039a2?s=94&amp;d=mm&amp;r=g', 'I\'d say in general, a massage here is… good.', 'They tend to be a bit more on the relaxing side. The masseuses DO know their stuff, but it’s not quite the intense, athletic-benefiting massage I’ve found other places. I’ve had probably 10 different masseuses here over the past 5-6 years, and I’ve never had a bad massage, and a few fantastic ones. They do book up quickly during peak hours (weekends, nights), so make sure to make appointments well ahead of time.', 'reviewurl.com/reviews', 'Google', 5.0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saturday`
--

CREATE TABLE `saturday` (
  `saturdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saturday`
--

INSERT INTO `saturday` (`saturdayId`, `locationId`, `starts`, `ends`) VALUES
(66, 29, '10:00:00', '12:00:00'),
(67, 29, '16:00:00', '20:00:00'),
(69, 30, '08:30:00', '17:30:00'),
(70, 30, '08:00:00', '17:00:00'),
(72, 31, '00:00:00', '00:00:00'),
(73, 31, '09:00:00', '17:00:00'),
(75, 32, '10:00:00', '19:00:00'),
(162, 32, '09:00:00', '13:00:00'),
(163, 33, '15:00:00', '20:00:00'),
(165, 33, '10:00:00', '14:00:00'),
(183, 34, '10:00:00', '14:00:00'),
(185, 34, '10:00:00', '14:00:00'),
(186, 35, '10:00:00', '14:00:00'),
(187, 35, '10:00:00', '14:00:00'),
(188, 36, '10:00:00', '14:00:00'),
(189, 36, '10:00:00', '14:00:00'),
(190, 44, '10:00:00', '14:00:00'),
(191, 44, '10:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sectionId` int(10) NOT NULL,
  `listsId` int(10) NOT NULL,
  `sectionName` varchar(50) NOT NULL,
  `sectionDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sectionId`, `listsId`, `sectionName`, `sectionDescription`) VALUES
(2, 102, 'Pediatrics', 'Doctor for everything!'),
(4, 103, 'Concert', 'Groovy music at concert'),
(5, 104, 'Black Bucks', 'Short Descriptions'),
(14, 100, 'Entree', 'Made fresh daily Entree.'),
(15, 104, 'Entree', 'Made fresh daily Entree.'),
(16, 103, 'Entree', 'Made fresh daily Entree.'),
(17, 1, 'Craftsman', 'Craftsman Antiques'),
(18, 57, 'Concerts', 'Long Description of concert type');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servicesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `servicesName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`servicesId`, `locationId`, `servicesName`) VALUES
(73, 29, 'Repairs'),
(74, 29, 'Rehairing'),
(75, 30, 'Setup and adjustments'),
(76, 30, 'Rentals'),
(77, 31, 'funerals'),
(122, 31, 'Pet Training'),
(123, 31, 'Fully Opimized Wesbite Once'),
(124, 32, 'Fully Opimized Wesbite Once'),
(142, 32, 'Fully Opimized Wesbite Once'),
(144, 32, 'Fully Opimized Wesbite Once'),
(145, 33, 'Fully Opimized Wesbite Once'),
(146, 33, 'Fully Opimized Wesbite Once'),
(147, 34, 'Fully Opimized Wesbite Once'),
(148, 34, 'Fully Opimized Wesbite Once'),
(149, 35, 'Fully Opimized Wesbite Once'),
(150, 36, 'Fully Opimized Wesbite Once'),
(151, 36, 'Fully Opimized Wesbite Once'),
(152, 44, 'Fully Opimized Wesbite Once'),
(153, 44, 'Fully Opimized Wesbite Once'),
(154, 44, 'Fully Opimized Wesbite Once'),
(158, 44, 'Fully Opimized Wesbite Once');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `specialitiesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `specialitiesName` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`specialitiesId`, `locationId`, `specialitiesName`) VALUES
(1, 29, 'PHP'),
(2, 29, 'NodeJS'),
(3, 30, 'Express'),
(4, 30, 'MongoDB'),
(5, 30, 'HTML'),
(6, 31, 'CSS'),
(7, 31, 'Javascript'),
(8, 31, 'Angular'),
(9, 32, 'PHP'),
(10, 32, 'NodeJS'),
(11, 32, 'Express'),
(12, 33, 'MongoDB'),
(13, 33, 'HTML'),
(14, 34, 'CSS'),
(15, 34, 'Javascript'),
(16, 34, 'Angular'),
(153, 34, 'PHP'),
(154, 35, 'NodeJS'),
(155, 35, 'Express'),
(156, 35, 'MongoDB'),
(157, 36, 'HTML'),
(158, 36, 'CSS'),
(159, 36, 'Javascript'),
(160, 44, 'Angular'),
(169, 44, 'PHP'),
(170, 44, 'NodeJS');

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE `sunday` (
  `sundayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sunday`
--

INSERT INTO `sunday` (`sundayId`, `locationId`, `starts`, `ends`) VALUES
(65, 29, '00:00:00', '00:00:00'),
(69, 31, '00:00:00', '00:00:00'),
(70, 32, '09:00:00', '17:00:00'),
(72, 33, '11:00:00', '18:00:00'),
(115, 30, '11:00:00', '14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

CREATE TABLE `thursday` (
  `thursdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thursday`
--

INSERT INTO `thursday` (`thursdayId`, `locationId`, `starts`, `ends`) VALUES
(216, 29, '09:00:00', '12:00:00'),
(217, 29, '16:00:00', '20:00:00'),
(224, 30, '08:00:00', '12:00:00'),
(226, 30, '08:30:00', '17:30:00'),
(227, 31, '08:00:00', '17:00:00'),
(229, 31, '09:00:00', '17:00:00'),
(230, 32, '09:00:00', '17:00:00'),
(232, 32, '09:00:00', '21:00:00'),
(323, 33, '09:00:00', '13:00:00'),
(324, 33, '15:00:00', '20:00:00'),
(328, 34, '10:00:00', '13:30:00'),
(329, 34, '14:30:00', '17:00:00'),
(330, 34, '17:30:00', '19:20:00'),
(382, 35, '10:00:00', '13:30:00'),
(383, 36, '14:30:00', '17:00:00'),
(384, 36, '17:30:00', '19:20:00'),
(388, 36, '10:00:00', '13:30:00'),
(389, 44, '14:30:00', '17:00:00'),
(390, 44, '17:30:00', '19:20:00'),
(391, 44, '10:00:00', '13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

CREATE TABLE `tuesday` (
  `tuesdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuesday`
--

INSERT INTO `tuesday` (`tuesdayId`, `locationId`, `starts`, `ends`) VALUES
(166, 29, '09:00:00', '17:00:00'),
(168, 29, '08:30:00', '05:30:00'),
(169, 30, '08:00:00', '17:00:00'),
(171, 30, '09:00:00', '17:00:00'),
(172, 31, '09:00:00', '17:00:00'),
(174, 31, '09:00:00', '21:00:00'),
(265, 32, '09:00:00', '13:00:00'),
(266, 32, '15:00:00', '20:00:00'),
(270, 33, '10:00:00', '13:30:00'),
(271, 34, '14:30:00', '17:00:00'),
(272, 34, '17:30:00', '19:20:00'),
(324, 35, '10:00:00', '13:30:00'),
(325, 35, '14:30:00', '17:00:00'),
(326, 35, '17:30:00', '19:20:00'),
(330, 36, '10:00:00', '13:30:00'),
(331, 36, '14:30:00', '17:00:00'),
(332, 44, '17:30:00', '19:20:00'),
(333, 44, '10:00:00', '13:30:00'),
(334, 44, '14:30:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `urlsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `displayUrl` text,
  `urlsDescription` varchar(50) DEFAULT NULL,
  `urlsType` varchar(20) DEFAULT NULL,
  `urls` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`urlsId`, `locationId`, `displayUrl`, `urlsDescription`, `urlsType`, `urls`) VALUES
(201, 29, 'http://crouton.net', 'website', 'WEBSITE', 'https://crouton.net'),
(206, 29, 'http://nytimes.com', 'website', 'WEBSITE', 'http://yext.com'),
(208, 30, 'https://www.overnightcaskets.com', 'website', 'WEBSITE', 'https://www.overnightcaskets.com'),
(210, 30, 'http://www.displayurl.com', 'website', 'WEBSITE', 'http://www.displayurl.com'),
(303, 31, 'http://www.friendlypetgrooming.com', 'website', 'WEBSITE', 'http://friendlypets.wix.com/friendlypetgrooming'),
(305, 31, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(306, 32, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(307, 32, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(308, 33, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(309, 33, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(310, 34, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(311, 34, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(312, 35, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(381, 35, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(382, 36, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(383, 36, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(384, 44, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(389, 44, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(390, 44, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videosId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `videosUrl` text,
  `videosDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videosId`, `locationId`, `videosUrl`, `videosDescription`) VALUES
(130, 29, 'http://www.youtube.com/watch?v=H_OXoxymeho', 'The highest quality'),
(134, 30, 'http://www.youtube.com/watch?v=93hq0YU3Gqk', 'The highest quality'),
(135, 31, 'http://www.youtube.com/watch?v=9GM1fiWG5YA', 'The highest quality'),
(182, 32, 'http://www.youtube.com/watch?v=p336IIjZCl8', ''),
(183, 33, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(184, 34, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(185, 35, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(186, 36, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(221, 44, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(222, 29, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(225, 30, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(226, 31, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(227, 32, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(228, 33, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(229, 34, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(230, 35, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(231, 36, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(232, 44, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos');

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE `wednesday` (
  `wednesdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `ends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wednesday`
--

INSERT INTO `wednesday` (`wednesdayId`, `locationId`, `starts`, `ends`) VALUES
(162, 29, '09:00:00', '17:00:00'),
(169, 30, '09:00:00', '18:00:00'),
(171, 31, '08:30:00', '17:30:00'),
(172, 32, '08:00:00', '17:00:00'),
(174, 33, '09:00:00', '17:00:00'),
(175, 34, '09:00:00', '17:00:00'),
(177, 35, '09:00:00', '21:00:00'),
(268, 36, '09:00:00', '13:00:00'),
(269, 44, '15:00:00', '20:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`associationsId`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandsId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`emailsId`);

--
-- Indexes for table `friday`
--
ALTER TABLE `friday`
  ADD PRIMARY KEY (`fridayId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imagesId`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keywordsId`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`languagesId`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`listsId`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`mondayId`);

--
-- Indexes for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  ADD PRIMARY KEY (`paymentOptionId`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`phoneId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productsId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`);

--
-- Indexes for table `saturday`
--
ALTER TABLE `saturday`
  ADD PRIMARY KEY (`saturdayId`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sectionId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`servicesId`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`specialitiesId`);

--
-- Indexes for table `sunday`
--
ALTER TABLE `sunday`
  ADD PRIMARY KEY (`sundayId`);

--
-- Indexes for table `thursday`
--
ALTER TABLE `thursday`
  ADD PRIMARY KEY (`thursdayId`);

--
-- Indexes for table `tuesday`
--
ALTER TABLE `tuesday`
  ADD PRIMARY KEY (`tuesdayId`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`urlsId`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videosId`);

--
-- Indexes for table `wednesday`
--
ALTER TABLE `wednesday`
  ADD PRIMARY KEY (`wednesdayId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `associationsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=572;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emailsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `friday`
--
ALTER TABLE `friday`
  MODIFY `fridayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1287;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keywordsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `monday`
--
ALTER TABLE `monday`
  MODIFY `mondayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  MODIFY `paymentOptionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phoneId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `saturday`
--
ALTER TABLE `saturday`
  MODIFY `saturdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sectionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servicesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `specialitiesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `sunday`
--
ALTER TABLE `sunday`
  MODIFY `sundayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `thursday`
--
ALTER TABLE `thursday`
  MODIFY `thursdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;

--
-- AUTO_INCREMENT for table `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `tuesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `urlsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=477;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videosId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `wednesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
