-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 03:42 PM
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
(8, 1, 'Association One'),
(9, 2, 'Association One');

-- --------------------------------------------------------

--
-- Table structure for table `bio_items`
--

CREATE TABLE `bio_items` (
  `bioItemsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `bioItemsName` int(100) DEFAULT NULL,
  `bioItemsTitle` varchar(100) DEFAULT NULL,
  `bioItemsDescription` text,
  `bioItemsUrl` text,
  `bioItemsPhotoUrl` text,
  `bioItemsPhotoHeight` int(100) NOT NULL DEFAULT '0',
  `bioItemsPhotoWidth` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bio_items_certification`
--

CREATE TABLE `bio_items_certification` (
  `bioItemsCertificationId` int(10) NOT NULL,
  `bioItemsId` int(10) NOT NULL,
  `bioItemsCertificationName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bio_items_education`
--

CREATE TABLE `bio_items_education` (
  `bioItemsEducationId` int(10) NOT NULL,
  `bioItemsId` int(10) NOT NULL,
  `bioItemsEducationName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bio_items_service`
--

CREATE TABLE `bio_items_service` (
  `bioItemsServiceId` int(10) NOT NULL,
  `bioItemsId` int(10) NOT NULL,
  `bioItemsServiceName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 'Levis'),
(2, 1, 'Denim'),
(3, 2, 'Dolce Gabbana'),
(4, 2, 'Elvin');

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
(1, 13, 1, 'Restaurants', 'restaurants'),
(2, 12, 1, 'Mexican Restaurants', 'mexican-restaurants'),
(3, 11, 2, 'Chinese Restaurants', 'chinese-restaurants'),
(4, 10, 2, 'Uncle\'s Restaurants', 'uncles-restaurants');

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
(1, 1, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(2, 1, '2019-05-15 13:26:48', 'Lionel Messi', 'Ya I know I comment same thing Every year', 'https://www.barcelona.com/lionelMessi', 0),
(3, 2, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(4, 2, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(5, 3, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(6, 3, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(7, 4, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(8, 4, '2019-05-15 13:26:48', 'Lionel Messi', 'This year we will win treble too..... Forca BARCA', 'https://www.barcelona.com/lionelMessi', 0),
(10, 7, '2019-06-19 11:44:45', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0),
(11, 8, '2019-06-19 11:44:51', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0),
(12, 8, '2019-06-20 07:12:38', 'Author Name', 'Comment Content', 'authorPhotoUrl.com/link.png', 0);

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
(1, 1, 'kitskitchen2336@gmail.com', 'Manager\'s email'),
(2, 1, 'info@bbq.com', 'Customer Service'),
(3, 2, 'uncleskitchen2336@gmail.com', 'Owner\'s email'),
(4, 2, 'info@bbq.com', 'Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `events_items`
--

CREATE TABLE `events_items` (
  `eventsItemsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `eventsItemsName` varchar(100) DEFAULT NULL,
  `eventsItemsType` varchar(200) DEFAULT NULL,
  `eventItemsStarts` varchar(20) DEFAULT NULL,
  `eventItemsEnds` varchar(20) DEFAULT NULL,
  `eventItemsDescription` text,
  `eventItemsVideo` text NOT NULL,
  `eventItemsUrl` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events_items_photos`
--

CREATE TABLE `events_items_photos` (
  `eventsItemsPhotosId` int(10) NOT NULL,
  `eventsItemsId` int(10) NOT NULL,
  `eventsItemsPhotoUrl` text,
  `eventsItemsPhotoHeight` int(100) NOT NULL DEFAULT '0',
  `eventsItemsPhotoWidth` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00');

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
(1, 1, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(2, 1, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(3, 1, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(4, 1, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150),
(5, 2, 100, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/100x100.jpg', 100),
(6, 2, 284, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/284x100.jpg', 100),
(7, 2, 50, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/50x40.jpg', 40),
(8, 2, 200, 'GALLERY', 'https://a.mktgcdn.com/p/oke9u1_VqsR57lFv2rIe9SWj0H--fLHAhCsDMwpaTUs/200x150.jpg', 150);

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
(1, 1, 'keywordOne'),
(2, 1, 'keywordTwo'),
(3, 2, 'keywordThree'),
(4, 2, 'keywordFour');

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
(1, 2, 'Language One'),
(2, 2, 'Language Two'),
(3, 1, 'Language One'),
(4, 1, 'Language Two');

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
(1, 1, 'Services We Offer', 'Products and Services', 'MENU'),
(2, 1, 'See My Products', 'Products and Services', 'MENU'),
(3, 2, 'Services We Offer', 'Products and Services', 'PRODUCTS'),
(4, 2, 'See My Products', 'Products and Services', 'PRODUCTS');

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
  `yearEstablished` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationId`, `yextID`, `status`, `name`, `address`, `visible`, `address2`, `city`, `displayAddress`, `countryCode`, `postalCode`, `state`, `description`, `displayLatitude`, `displayLongitude`, `routableLatitude`, `routableLongitude`, `hoursDisplayText`, `specialOfferMessage`, `specialOfferUrl`, `paymentOptions`, `twitterHandle`, `facebookPageUrl`, `attributionImageWidth`, `attributionImageDescription`, `attributionImageUrl`, `attributionImageHeight`, `attributionUrl`, `closed`, `yearEstablished`) VALUES
(1, 123456, 'ACTIVE', 'Kit\'s Kitchen', '2336 Gramercy', 'true', 'Second Floor', 'Houston', 'Near the astrodome', 'US', '77030', 'TX', 'Come on in and check out our newest additions!', '29.70468', '-95.41429', '29.70468', '-95.41429', 'M-Sa 9am-10pm, Su Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals&s=yext', 'American Express, Cash, Check, Traveler\'s Check, Visa', 'KitsKitchenTX', 'https://www.facebook.com/thebestbarbecueintexasthatanyoneiknowoflikestoeat/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 1992),
(2, 123456, 'ACTIVE', 'Kit\'s Kitchen', '2336 Gramercy', 'true', 'Second Floor', 'Houston', 'Near the astrodome', 'US', '77030', 'TX', 'Come on in and check out our newest additions!', '29.70468', '-95.41429', '29.70468', '-95.41429', 'M-Sa 9am-10pm, Su Closed', 'Sign up to receive our deals!', 'https://kits-kitchen.movylo.com/index.php?pag=get_deals&s=yext', 'American Express, Cash, Check, Traveler\'s Check, Visa', 'KitsKitchenTX', 'https://www.facebook.com/thebestbarbecueintexasthatanyoneiknowoflikestoeat/', 143, 'Yext PowerListings', 'http://www.yextstatic.com/cms/pl-synced/pl-synced.png', 20, 'http://www.yext.com/', 'false', 1992);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menuItemsId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `menuItemsName` varchar(100) DEFAULT NULL,
  `menuItemsDescription` text,
  `menuItemsPhotoUrl` text,
  `menuItemsPhotoHeight` int(10) NOT NULL DEFAULT '0',
  `menuItemsPhotoWidth` int(10) NOT NULL DEFAULT '0',
  `menuItemsCaloriesType` varchar(50) DEFAULT NULL,
  `menuItemsCalories` int(10) NOT NULL DEFAULT '0',
  `menuItemsRangeTo` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menuItemsId`, `sectionId`, `menuItemsName`, `menuItemsDescription`, `menuItemsPhotoUrl`, `menuItemsPhotoHeight`, `menuItemsPhotoWidth`, `menuItemsCaloriesType`, `menuItemsCalories`, `menuItemsRangeTo`) VALUES
(1, 1, 'Chocolate Croissant', 'A tantalizing treat', 'http://www.yext-static.com/cms/chocolate-croissant.jpg', 250, 250, 'RANGE', 300, 350),
(4, 1, 'Chocolate Croissant', 'A tantalizing treatsss', 'http://www.yext-static.com/cms/chocolate-croissant.jpg', 250, 250, 'RANGE', 300, 350);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items_cost`
--

CREATE TABLE `menu_items_cost` (
  `menuItemsCostId` int(10) NOT NULL,
  `menuItemsId` int(10) NOT NULL,
  `menuItemsCostType` varchar(50) DEFAULT NULL,
  `menuItemsCostPrice` varchar(50) DEFAULT NULL,
  `menuItemsCostUnit` varchar(50) DEFAULT NULL,
  `menuItemsCostRangeTo` varchar(50) DEFAULT NULL,
  `menuItemsCostOther` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items_cost`
--

INSERT INTO `menu_items_cost` (`menuItemsCostId`, `menuItemsId`, `menuItemsCostType`, `menuItemsCostPrice`, `menuItemsCostUnit`, `menuItemsCostRangeTo`, `menuItemsCostOther`) VALUES
(1, 1, 'RANGE', '9.50', 'Per Sandwich', NULL, NULL),
(2, 1, 'RANGE', '9.50', 'Per Sandwich', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items_cost_options`
--

CREATE TABLE `menu_items_cost_options` (
  `menuItemsCostOptionsId` int(10) NOT NULL,
  `menuItemsCostId` int(10) NOT NULL,
  `costOptionName` varchar(100) DEFAULT NULL,
  `costOptionPrice` varchar(10) DEFAULT NULL,
  `costOptionCalorie` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items_cost_options`
--

INSERT INTO `menu_items_cost_options` (`menuItemsCostOptionsId`, `menuItemsCostId`, `costOptionName`, `costOptionPrice`, `costOptionCalorie`) VALUES
(1, 1, 'Bacon', '1.00', 150),
(2, 1, 'Avocado', '2.00', 30);

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
(1, 2, '08:00:00', '15:00:00'),
(2, 2, '17:00:00', '23:00:00');

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
(1, 1, 'American Express'),
(2, 1, 'Apple Pay'),
(3, 2, 'Bancontact'),
(4, 2, 'Cash'),
(13, 7, 'PaySec'),
(14, 7, 'MasterCard'),
(15, 8, 'Maestro'),
(16, 8, 'GoPay'),
(17, 9, 'Discover'),
(18, 9, 'Direct Debit'),
(19, 10, 'American Express'),
(20, 10, 'Monizze'),
(21, 21, 'PaySec'),
(22, 21, 'Sodexo'),
(23, 22, 'Traveler\'s Check'),
(24, 22, 'Visa Electron'),
(25, 23, 'V Pay'),
(26, 23, 'PayPal');

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
(1, 1, '2814105479', '1', 'Main', 'MAIN'),
(2, 1, '4568972254', '1', 'Alt', 'ALTERNATE'),
(3, 1, '8005467892', '1', 'Toll Free', 'TOLL_FREE'),
(4, 2, '2814105479', '1', 'Main', 'MAIN'),
(5, 2, '4568972254', '1', 'Alt', 'ALTERNATE'),
(6, 2, '8005467892', '1', 'Toll Free', 'TOLL_FREE');

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
(1, 1, 'Product One'),
(2, 1, 'Product Two'),
(3, 2, 'Product One'),
(4, 2, 'Product Two');

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
(1, 1, 'ACTIVE', '2019-05-06 08:33:38', 'Luis Figo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.5, 0, ''),
(2, 1, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(3, 2, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(4, 2, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 3.0, 0, ''),
(5, 8, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 5.0, 0, ''),
(6, 8, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(7, 7, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 2.0, 0, ''),
(8, 7, 'ACTIVE', '2019-05-06 08:33:38', 'Cristiano Ronaldo', 'http://www.somelinkto.uefa/cristianoRonaldo.png', 'We are the champions.', 'Winning UEFA Cup is best of ALL and losing it means nothing.', 'https://www.somelink.uefa/myreviewUrl', 'MyOfficialSite', 4.0, 0, ''),
(9, 7, 'ACTIVE', '2019-06-20 08:45:53', 'Author Name', 'somerultoauthorphoto.com/123.jpg', 'Review Title', 'Review Content', 'reviewurl.com/reviews', 'Review Source', 4.0, 0, NULL);

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
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00');

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
(1, 1, 'Entree', 'Made fresh daily Entree.'),
(2, 2, 'Dessert', 'Made fresh daily Desserts.');

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
(3, 1, 'Fully Opimized Wesbite'),
(4, 1, 'Fully customised Wesbite'),
(5, 2, 'Fully Opimized Wesbite'),
(6, 2, 'Fully customised Wesbite');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `serviceItemsId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `serviceItemsDescription` text NOT NULL,
  `serviceItemsVideoUrl` text NOT NULL,
  `serviceItemsUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_items_cost`
--

CREATE TABLE `service_items_cost` (
  `serviceItemsCostId` int(10) NOT NULL,
  `serviceItemsId` int(10) NOT NULL,
  `serviceItemsCostType` varchar(50) NOT NULL,
  `serviceItemsCostPrice` varchar(50) NOT NULL,
  `serviceItemsCostUnit` varchar(50) NOT NULL,
  `serviceItemsCostRangeTo` varchar(50) NOT NULL,
  `serviceItemsCostOther` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_items_cost_options`
--

CREATE TABLE `service_items_cost_options` (
  `serviceItemsCostOptionsId` int(10) NOT NULL,
  `serviceItemsCostId` int(10) NOT NULL,
  `costOptionName` varchar(100) DEFAULT NULL,
  `costOptionPrice` varchar(10) DEFAULT NULL,
  `costOptionCalorie` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 'Specialities One'),
(2, 2, 'Specialities Two'),
(3, 2, 'Speciality Three');

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
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00');

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
(3, 2, '08:00:00', '08:00:00'),
(4, 2, '08:00:00', '08:00:00');

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
(1, 1, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(2, 1, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(3, 1, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(4, 1, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com'),
(5, 2, 'http://www.stevenhightower.net/kk/menu.html', 'menu', 'MENU', 'http://www.stevenhightower.net/kk/menu.html'),
(6, 2, 'https://app.agendize.com/book/19171870', 'reservation', 'RESERVATION', 'ttps://app.agendize.com/book/19171870'),
(7, 2, 'http://www.kits-kitchen.com', 'website', 'WEBSITE', 'http://www.kits-kitchen.com'),
(8, 2, 'http://www.kits-kitchen.com', 'order', 'ORDER', 'http://www.kits-kitchen.com');

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
(1, 1, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(2, 1, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos'),
(3, 2, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'youtube Videos'),
(4, 2, 'http://www.youtube.com/watch?v=_pJ5b2ymqtk', 'Vimeo Videos');

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
(5, 2, '08:00:00', '08:00:00'),
(6, 2, '08:00:00', '08:00:00');

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
-- Indexes for table `bio_items`
--
ALTER TABLE `bio_items`
  ADD PRIMARY KEY (`bioItemsId`);

--
-- Indexes for table `bio_items_certification`
--
ALTER TABLE `bio_items_certification`
  ADD PRIMARY KEY (`bioItemsCertificationId`);

--
-- Indexes for table `bio_items_education`
--
ALTER TABLE `bio_items_education`
  ADD PRIMARY KEY (`bioItemsEducationId`);

--
-- Indexes for table `bio_items_service`
--
ALTER TABLE `bio_items_service`
  ADD PRIMARY KEY (`bioItemsServiceId`);

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
-- Indexes for table `events_items`
--
ALTER TABLE `events_items`
  ADD PRIMARY KEY (`eventsItemsId`);

--
-- Indexes for table `events_items_photos`
--
ALTER TABLE `events_items_photos`
  ADD PRIMARY KEY (`eventsItemsPhotosId`);

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
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menuItemsId`);

--
-- Indexes for table `menu_items_cost`
--
ALTER TABLE `menu_items_cost`
  ADD PRIMARY KEY (`menuItemsCostId`);

--
-- Indexes for table `menu_items_cost_options`
--
ALTER TABLE `menu_items_cost_options`
  ADD PRIMARY KEY (`menuItemsCostOptionsId`);

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
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`serviceItemsId`);

--
-- Indexes for table `service_items_cost`
--
ALTER TABLE `service_items_cost`
  ADD PRIMARY KEY (`serviceItemsCostId`);

--
-- Indexes for table `service_items_cost_options`
--
ALTER TABLE `service_items_cost_options`
  ADD PRIMARY KEY (`serviceItemsCostOptionsId`);

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
  MODIFY `associationsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bio_items`
--
ALTER TABLE `bio_items`
  MODIFY `bioItemsId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bio_items_certification`
--
ALTER TABLE `bio_items_certification`
  MODIFY `bioItemsCertificationId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bio_items_education`
--
ALTER TABLE `bio_items_education`
  MODIFY `bioItemsEducationId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bio_items_service`
--
ALTER TABLE `bio_items_service`
  MODIFY `bioItemsServiceId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `emailsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events_items`
--
ALTER TABLE `events_items`
  MODIFY `eventsItemsId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_items_photos`
--
ALTER TABLE `events_items_photos`
  MODIFY `eventsItemsPhotosId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friday`
--
ALTER TABLE `friday`
  MODIFY `fridayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keywordsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languagesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menuItemsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_items_cost`
--
ALTER TABLE `menu_items_cost`
  MODIFY `menuItemsCostId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_items_cost_options`
--
ALTER TABLE `menu_items_cost_options`
  MODIFY `menuItemsCostOptionsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monday`
--
ALTER TABLE `monday`
  MODIFY `mondayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  MODIFY `paymentOptionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phoneId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saturday`
--
ALTER TABLE `saturday`
  MODIFY `saturdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sectionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servicesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `serviceItemsId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_items_cost`
--
ALTER TABLE `service_items_cost`
  MODIFY `serviceItemsCostId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_items_cost_options`
--
ALTER TABLE `service_items_cost_options`
  MODIFY `serviceItemsCostOptionsId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `specialitiesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sunday`
--
ALTER TABLE `sunday`
  MODIFY `sundayId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thursday`
--
ALTER TABLE `thursday`
  MODIFY `thursdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `tuesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `urlsId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videosId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `wednesdayId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
