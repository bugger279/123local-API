-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 08:43 AM
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
-- Database: `api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `associationsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `associationsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`associationsId`, `locationId`, `associationsName`) VALUES
(8, 1, 'Association One'),
(9, 2, 'Association One'),
(18, 5, 'BBA Accrediated'),
(19, 5, 'Upwork');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `brandsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandsId`, `locationId`, `brandsName`) VALUES
(1, 1, 'Levis'),
(2, 1, 'Denim'),
(3, 2, 'Dolce Gabbana'),
(4, 2, 'Elvin'),
(13, 5, 'Divi Theme'),
(14, 5, 'Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoriesId` int(10) NOT NULL,
  `categoryID` int(20) NOT NULL,
  `locationId` int(10) NOT NULL,
  `categoriesName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoriesId`, `categoryID`, `locationId`, `categoriesName`) VALUES
(1, 12, 1, 'Restaurants'),
(2, 12, 1, 'Mexican Restaurants'),
(3, 10, 2, 'Chinese Restaurants'),
(4, 10, 2, 'Uncle\'s Restaurants'),
(13, 21, 5, 'Web Development'),
(14, 22, 5, 'Web Designing');

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
  `commentOwnerResponse` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `reviewId`, `commentTimestamp`, `commentAuthorName`, `commentContent`, `commentAuthorPhotoUrl`, `commentOwnerResponse`) VALUES
(1, 1, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(2, 1, '2019-05-15 13:26:48', 'Lionel Messi', 'Ya I know I comment same thing Every year', 'https://www.barcelona.com/lionelMessi', 0),
(3, 2, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(4, 2, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(5, 3, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(6, 3, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(7, 4, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(8, 4, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `emailsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `emailsAddress` text NOT NULL,
  `emailsDescription` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`emailsId`, `locationId`, `emailsAddress`, `emailsDescription`) VALUES
(1, 1, 'kitskitchen2336@gmail.com', 'Manager\'s email'),
(2, 1, 'info@bbq.com', 'Customer Service'),
(3, 2, 'uncleskitchen2336@gmail.com', 'Owner\'s email'),
(4, 2, 'info@bbq.com', 'Customer Service'),
(17, 5, 'velocity.consult@gmail.com', 'Gmails email'),
(18, 5, 'info@velocityconsultancy.com', 'Owners emails'),
(19, 5, 'developers@velocityconsultancy.com', 'Employees emails');

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

CREATE TABLE `friday` (
  `fridayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) NOT NULL,
  `ends` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friday`
--

INSERT INTO `friday` (`fridayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(19, 5, '10:00:00', '13:30:00'),
(20, 5, '14:30:00', '17:00:00'),
(21, 5, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imagesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `width` int(10) NOT NULL,
  `imagesType` varchar(10) NOT NULL,
  `imagesUrl` text NOT NULL,
  `height` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imagesId`, `locationId`, `width`, `imagesType`, `imagesUrl`, `height`) VALUES
(1, 1, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(2, 1, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(3, 1, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(4, 1, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(5, 2, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(6, 2, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(7, 2, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(8, 2, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(25, 5, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(26, 5, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(27, 5, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(28, 5, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keywordsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `keywordsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keywordsId`, `locationId`, `keywordsName`) VALUES
(1, 1, 'keywordOne'),
(2, 1, 'keywordTwo'),
(3, 2, 'keywordThree'),
(4, 2, 'keywordFour'),
(25, 5, 'Web Development'),
(26, 5, 'SEO'),
(27, 5, 'Graphics'),
(28, 5, 'API'),
(29, 5, 'Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `languagesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `languagesName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languagesId`, `locationId`, `languagesName`) VALUES
(1, 2, 'Language One'),
(2, 2, 'Language Two'),
(3, 1, 'Language One'),
(4, 1, 'Language Two'),
(21, 5, 'English'),
(22, 5, 'Hindi'),
(23, 5, 'Gujarati'),
(24, 5, 'Marathi');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `listsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `listsName` text NOT NULL,
  `listsDescription` text NOT NULL,
  `listsType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listsId`, `locationId`, `listsName`, `listsDescription`, `listsType`) VALUES
(1, 1, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(2, 1, 'See My Products', 'Products and Services', 'PRODUCTS'),
(3, 2, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(4, 2, 'See My Products', 'Products and Services', 'PRODUCTS'),
(13, 5, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(14, 5, 'See My Products', 'Products and Services', 'PRODUCTS');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationId` int(10) NOT NULL,
  `yextID` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'BLOCKED',
  `name` text NOT NULL,
  `address` text NOT NULL,
  `visible` varchar(10) NOT NULL DEFAULT 'false',
  `address2` text NOT NULL,
  `city` text NOT NULL,
  `displayAddress` text NOT NULL,
  `countryCode` varchar(5) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `displayLatitude` text NOT NULL,
  `displayLongitude` text NOT NULL,
  `routableLatitude` text NOT NULL,
  `routableLongitude` text NOT NULL,
  `hoursDisplayText` varchar(100) NOT NULL,
  `specialOfferMessage` text NOT NULL,
  `specialOfferUrl` text NOT NULL,
  `paymentOptions` text NOT NULL,
  `twitterHandle` text NOT NULL,
  `facebookPageUrl` text NOT NULL,
  `attributionImageWidth` int(10) NOT NULL,
  `attributionImageDescription` text NOT NULL,
  `attributionImageUrl` text NOT NULL,
  `attributionImageHeight` int(10) NOT NULL,
  `attributionUrl` text NOT NULL,
  `closed` varchar(10) NOT NULL,
  `yearEstablished` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationId`, `yextID`, `status`, `name`, `address`, `visible`, `address2`, `city`, `displayAddress`, `countryCode`, `postalCode`, `state`, `description`, `displayLatitude`, `displayLongitude`, `routableLatitude`, `routableLongitude`, `hoursDisplayText`, `specialOfferMessage`, `specialOfferUrl`, `paymentOptions`, `twitterHandle`, `facebookPageUrl`, `attributionImageWidth`, `attributionImageDescription`, `attributionImageUrl`, `attributionImageHeight`, `attributionUrl`, `closed`, `yearEstablished`) VALUES
(1, 123456, 'ACTIVE', 'Kit\'s Kitchen', '2336 Gramercy', 'true', 'Second Floor', 'Houston', 'Near the astrodome', 'US', '77030', 'TX', 'Come on in and check out our newest additions!', '29.70468', '-95.41429', '29.70468', '-95.41429', 'M-Sa 9am-10pm, Su Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals&s=yext', 'American Express, Cash, Check, Traveler\'s Check, Visa', 'KitsKitchenTX', 'https://www.facebook.com/thebestbarbecueintexasthatanyoneiknowoflikestoeat/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 1992),
(2, 123456, 'ACTIVE', 'Kit\'s Kitchen', '2336 Gramercy', 'true', 'Second Floor', 'Houston', 'Near the astrodome', 'US', '77030', 'TX', 'Come on in and check out our newest additions!', '29.70468', '-95.41429', '29.70468', '-95.41429', 'M-Sa 9am-10pm, Su Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals&s=yext', 'American Express, Cash, Check, Traveler\'s Check, Visa', 'KitsKitchenTX', 'https://www.facebook.com/thebestbarbecueintexasthatanyoneiknowoflikestoeat/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 1992);

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE `monday` (
  `mondayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) NOT NULL,
  `ends` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monday`
--

INSERT INTO `monday` (`mondayId`, `locationId`, `starts`, `ends`) VALUES
(1, 2, '08:00:00', '15:00:00'),
(2, 2, '17:00:00', '23:00:00'),
(15, 5, '10:00:00', '13:30:00'),
(16, 5, '14:30:00', '17:00:00'),
(17, 5, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `phoneId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `numbers` varchar(15) NOT NULL,
  `phonesCountryCode` varchar(5) NOT NULL,
  `phonesDescription` text NOT NULL,
  `phonesType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`phoneId`, `locationId`, `numbers`, `phonesCountryCode`, `phonesDescription`, `phonesType`) VALUES
(1, 1, '2814105479', '1', 'Main', 'MAIN'),
(2, 1, '4568972254', '1', 'Alt', 'ALTERNATE'),
(3, 1, '8005467892', '1', 'Toll Free', 'TOLL_FREE'),
(4, 2, '2814105479', '1', 'Main', 'MAIN'),
(5, 2, '4568972254', '1', 'Alt', 'ALTERNATE'),
(6, 2, '8005467892', '1', 'Toll Free', 'TOLL_FREE'),
(23, 5, '022-12345678', '+91', 'Office', 'Office'),
(24, 5, '1234567890', '+91', 'Alt', 'Alt'),
(25, 5, '7894561230', '+91', 'Toll Free', 'Toll Free'),
(26, 5, '4578960231', '+91', 'Road Side', 'Road Side');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `productsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productsId`, `locationId`, `productsName`) VALUES
(1, 1, 'Product One'),
(2, 1, 'Product Two'),
(3, 2, 'Product One'),
(4, 2, 'Product Two'),
(13, 5, 'Product One'),
(14, 5, 'Product Two');

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
  `reviewFlagReason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `locationId`, `reviewStatus`, `reviewTimestamp`, `reviewAuthorName`, `reviewAuthorPhotoUrl`, `reviewTitle`, `reviewContent`, `reviewUrl`, `reviewSource`, `reviewRating`, `reviewGenerated`, `reviewFlagReason`) VALUES
(1, 1, 'ACTIVE', '2019-05-06 08:33:38', 'Luis Figo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.5, 0, ''),
(2, 1, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(3, 2, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(4, 2, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 3.0, 0, ''),
(5, 2, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 5.0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `saturday`
--

CREATE TABLE `saturday` (
  `saturdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) NOT NULL,
  `ends` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saturday`
--

INSERT INTO `saturday` (`saturdayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(11, 5, '10:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servicesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `servicesName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`servicesId`, `locationId`, `servicesName`) VALUES
(3, 1, 'Fully Opimized Wesbite'),
(4, 1, 'Fully customised Wesbite'),
(5, 2, 'Fully Opimized Wesbite'),
(6, 2, 'Fully customised Wesbite'),
(19, 5, 'Fully Opimized Wesbite'),
(20, 5, 'Fully Customized Wesbite'),
(21, 5, 'SEO Friendly Wesbite');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `specialitiesId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `specialitiesName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`specialitiesId`, `locationId`, `specialitiesName`) VALUES
(1, 1, 'Specialities One'),
(2, 2, 'Specialities Two'),
(3, 2, 'Speciality Three'),
(36, 5, 'PHP'),
(37, 5, 'NodeJS'),
(38, 5, 'Express'),
(39, 5, 'MongoDB'),
(40, 5, 'HTML'),
(41, 5, 'CSS'),
(42, 5, 'Javascript'),
(43, 5, 'Angular');

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE `sunday` (
  `sundayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) NOT NULL,
  `ends` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

CREATE TABLE `thursday` (
  `thursdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) NOT NULL,
  `ends` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thursday`
--

INSERT INTO `thursday` (`thursdayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(19, 5, '10:00:00', '13:30:00'),
(20, 5, '14:30:00', '17:00:00'),
(21, 5, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

CREATE TABLE `tuesday` (
  `tuesdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) NOT NULL,
  `ends` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuesday`
--

INSERT INTO `tuesday` (`tuesdayId`, `locationId`, `starts`, `ends`) VALUES
(3, 2, '08:00:00', '08:00:00'),
(4, 2, '08:00:00', '08:00:00'),
(17, 5, '10:00:00', '13:30:00'),
(18, 5, '14:30:00', '17:00:00'),
(19, 5, '17:30:00', '19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `urlsId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `displayUrl` text NOT NULL,
  `urlsDescription` varchar(50) NOT NULL,
  `urlsType` varchar(20) NOT NULL,
  `urls` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`urlsId`, `locationId`, `displayUrl`, `urlsDescription`, `urlsType`, `urls`) VALUES
(1, 1, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(2, 1, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(3, 1, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(4, 1, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(5, 2, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(6, 2, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(7, 2, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(8, 2, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(25, 5, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(26, 5, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(27, 5, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(28, 5, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videosId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `videosUrl` text NOT NULL,
  `videosDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videosId`, `locationId`, `videosUrl`, `videosDescription`) VALUES
(1, 1, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(2, 1, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(3, 2, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(4, 2, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(13, 5, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(14, 5, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos');

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE `wednesday` (
  `wednesdayId` int(10) NOT NULL,
  `locationId` int(10) NOT NULL,
  `starts` varchar(20) NOT NULL,
  `ends` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wednesday`
--

INSERT INTO `wednesday` (`wednesdayId`, `locationId`, `starts`, `ends`) VALUES
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00'),
(19, 5, '10:00:00', '13:30:00'),
(20, 5, '14:30:00', '17:00:00'),
(21, 5, '17:30:00', '19:20:00');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `associationsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emailsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `friday`
--
ALTER TABLE `friday`
  MODIFY `fridayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keywordsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monday`
--
ALTER TABLE `monday`
  MODIFY `mondayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phoneId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saturday`
--
ALTER TABLE `saturday`
  MODIFY `saturdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servicesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `specialitiesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sunday`
--
ALTER TABLE `sunday`
  MODIFY `sundayId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thursday`
--
ALTER TABLE `thursday`
  MODIFY `thursdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `tuesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `urlsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videosId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `wednesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
