-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 05:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitwo_php_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `itemId` int(11) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemName` varchar(225) NOT NULL,
  `itemDesc` text NOT NULL,
  `netWeight` varchar(52) NOT NULL,
  `grossWeight` varchar(42) NOT NULL,
  `volume` varchar(42) NOT NULL,
  `height` varchar(42) NOT NULL,
  `width` varchar(42) NOT NULL,
  `length` varchar(42) NOT NULL,
  `goodsType` varchar(42) NOT NULL,
  `goodsGroup` varchar(255) NOT NULL,
  `purchaseGroup` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `availabilityCheck` varchar(255) NOT NULL,
  `baseUnitMeasure` varchar(255) NOT NULL,
  `issueUnitMeasure` varchar(255) NOT NULL,
  `storageBin` varchar(255) NOT NULL,
  `pickingArea` varchar(255) NOT NULL,
  `tempControl` varchar(50) NOT NULL,
  `storageControl` varchar(50) NOT NULL,
  `maxStoragePeriod` varchar(50) NOT NULL,
  `maxStoragePeriodTimeUnit` varchar(233) NOT NULL,
  `minRemainSelfLife` varchar(233) NOT NULL,
  `minRemainSelfLifeTimeUnit` varchar(233) NOT NULL,
  `purchasingValueKey` varchar(233) NOT NULL,
  `itemCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `itemCreatedBy` int(11) NOT NULL,
  `itemUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `itemUpdatedBy` int(11) NOT NULL,
  `itemStatus` enum('active','inactive','deleted','draft') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`itemId`, `itemCode`, `itemName`, `itemDesc`, `netWeight`, `grossWeight`, `volume`, `height`, `width`, `length`, `goodsType`, `goodsGroup`, `purchaseGroup`, `branch`, `availabilityCheck`, `baseUnitMeasure`, `issueUnitMeasure`, `storageBin`, `pickingArea`, `tempControl`, `storageControl`, `maxStoragePeriod`, `maxStoragePeriodTimeUnit`, `minRemainSelfLife`, `minRemainSelfLifeTimeUnit`, `purchasingValueKey`, `itemCreatedAt`, `itemCreatedBy`, `itemUpdatedAt`, `itemUpdatedBy`, `itemStatus`) VALUES
(5, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:17:59', 0, '2022-08-21 14:17:59', 0, 'active'),
(6, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:20:11', 0, '2022-08-21 14:20:11', 0, 'active'),
(7, 'jhgt7uy', 'jkjhiu', 'kjhuhkj', 'kjhiukj', 'kjhiu', 'h', 'kjjhkj', 'kjhii', 'ghvgh', 'A', 'B', '', '', 'Weekly', 'drtdf', 'ffdxx', 'ghfdt', 'dtr', 'fxfrf', 'gfcf', 'rtdtr', 'gtfty', 'gtfty', '', '', '2022-08-21 14:21:08', 0, '2022-08-21 14:21:08', 0, 'active'),
(11, 'JKGY5045', 'Chair', 'lorem', '20', '10', '20', '50', '50', '10', 'A', 'B', '', '', 'Daily', '20', '55', 'jhgyu', 'jhiu', 'jhiuk', 'jk', 'kj', 'kj', 'jmh', '', '', '2022-08-22 20:15:53', 0, '2022-08-22 20:15:53', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_mstr_good_groups`
--

CREATE TABLE `inventory_mstr_good_groups` (
  `goodGroupId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `goodGroupName` varchar(255) NOT NULL,
  `goodGroupDesc` varchar(255) NOT NULL,
  `goodGroupCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `goodGroupCreatedBy` int(11) NOT NULL,
  `goodGroupUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `goodGroupUpdatedBy` int(11) NOT NULL,
  `goodGroupStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_mstr_good_types`
--

CREATE TABLE `inventory_mstr_good_types` (
  `goodTypeId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `goodTypeName` varchar(255) NOT NULL,
  `goodTypeDesc` varchar(255) NOT NULL,
  `goodTypeCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `goodTypeCreatedBy` int(11) NOT NULL,
  `goodTypeUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `goodTypeUpdatedBy` int(11) NOT NULL,
  `goodTypeStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_mstr_good_types`
--

INSERT INTO `inventory_mstr_good_types` (`goodTypeId`, `companyId`, `goodTypeName`, `goodTypeDesc`, `goodTypeCreatedAt`, `goodTypeCreatedBy`, `goodTypeUpdatedAt`, `goodTypeUpdatedBy`, `goodTypeStatus`) VALUES
(1, 2, 'abc', 'demo desc', '2022-08-22 20:31:43', 1, '2022-08-22 20:31:43', 1, 'active'),
(2, 2, 'xaz', 'demo desc', '2022-08-22 20:31:43', 1, '2022-08-22 20:32:00', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_mstr_time_units`
--

CREATE TABLE `inventory_mstr_time_units` (
  `timeUnitId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `timeUnitName` varchar(255) NOT NULL,
  `timeUnitDesc` varchar(255) NOT NULL,
  `timeUnitCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `timeUnitCreatedBy` int(11) NOT NULL,
  `timeUnitUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `timeUnitUpdatedBy` int(11) NOT NULL,
  `timeUnitStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_mstr_uom`
--

CREATE TABLE `inventory_mstr_uom` (
  `uomId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `uomName` varchar(255) NOT NULL,
  `uomDesc` varchar(255) NOT NULL,
  `uomCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `uomCreatedBy` int(11) NOT NULL,
  `uomUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uomUpdatedBy` int(11) NOT NULL,
  `uomStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_purchesing_values`
--

CREATE TABLE `inventory_purchesing_values` (
  `purchValueId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `purchValueKey` varchar(255) NOT NULL,
  `purchValue1stReminder` int(11) NOT NULL,
  `purchValue2ndReminder` int(11) NOT NULL,
  `purchValue3rdReminder` int(11) NOT NULL,
  `purchValueUnderdelTolerance` decimal(10,2) NOT NULL,
  `purchValueOverdelivTolerance` decimal(10,2) NOT NULL,
  `purchValueMinDelQtyInPercentage` decimal(10,2) NOT NULL,
  `purchValueCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `purchValueCreatedBy` int(11) NOT NULL,
  `purchValueUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purchValueUpdatedBy` int(11) NOT NULL,
  `purchValueStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_details`
--

CREATE TABLE `tbl_admin_details` (
  `fldAdminKey` int(11) NOT NULL,
  `fldAdminName` varchar(255) NOT NULL,
  `fldAdminEmail` varchar(255) NOT NULL,
  `fldAdminPhone` varchar(20) DEFAULT NULL,
  `fldAdminPassword` varchar(255) NOT NULL,
  `fldAdminRole` int(11) NOT NULL,
  `fldAdminAvatar` varchar(255) DEFAULT NULL,
  `fldAdminCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldAdminUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldAdminStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `fldAdminNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_details`
--

INSERT INTO `tbl_admin_details` (`fldAdminKey`, `fldAdminName`, `fldAdminEmail`, `fldAdminPhone`, `fldAdminPassword`, `fldAdminRole`, `fldAdminAvatar`, `fldAdminCreatedAt`, `fldAdminUpdatedAt`, `fldAdminStatus`, `fldAdminNotes`) VALUES
(1, 'Super User', 'admin@vitwo.in', '9988776655', '12345678', 1, NULL, '2022-07-30 23:45:03', '2022-08-07 22:17:19', 'active', NULL),
(2, 'Test role user', 'testroleadmin@start-project.com', '9876543212', '12345678', 2, '', '2022-08-01 11:47:59', '2022-08-01 11:47:59', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_menu`
--

CREATE TABLE `tbl_admin_menu` (
  `fldMenuKey` int(11) NOT NULL,
  `fldParentMenuKey` int(11) NOT NULL DEFAULT 0,
  `fldMenuLabel` varchar(250) NOT NULL,
  `fldMenuIcon` varchar(255) NOT NULL,
  `fldMenuFile` varchar(250) DEFAULT NULL,
  `fldMenuOrderBy` int(11) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldMenuStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_menu`
--

INSERT INTO `tbl_admin_menu` (`fldMenuKey`, `fldParentMenuKey`, `fldMenuLabel`, `fldMenuIcon`, `fldMenuFile`, `fldMenuOrderBy`, `fldCreatedAt`, `fldUpdatedAt`, `fldMenuStatus`) VALUES
(1, 0, 'Manage Users', '<i class=\"nav-icon fas fa-edit\"></i>', '', 100, '2022-07-30 23:52:06', '2022-08-01 11:46:27', 'active'),
(2, 1, 'Manage Users', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-users.php', 0, '2022-07-30 23:52:57', '2022-08-22 20:51:49', 'active'),
(3, 0, 'Manage Content', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-07-30 23:53:46', '2022-08-07 12:01:52', 'inactive'),
(4, 3, 'Common Content', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-common-content.php', 0, '2022-07-30 23:54:33', '2022-08-22 20:51:49', 'active'),
(5, 0, 'Manage Contact Us', '<i class=\"nav-icon fas fa-edit\"></i>', '', 2, '2022-07-30 23:55:21', '2022-08-07 12:02:23', 'inactive'),
(6, 5, 'Manage Contact Us', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-contact-us.php', 0, '2022-07-30 23:55:56', '2022-08-22 20:51:49', 'active'),
(7, 0, 'Sales', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-08-07 11:46:12', '2022-08-07 11:46:12', 'active'),
(8, 7, 'Sales Orders', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-sales-orders.php', 1, '2022-08-07 11:47:29', '2022-08-22 20:51:49', 'active'),
(9, 7, 'Invoices', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-invoices.php', 2, '2022-08-07 11:48:04', '2022-08-22 20:51:49', 'active'),
(10, 7, 'Revenues', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-revenues.php', 3, '2022-08-07 11:48:54', '2022-08-22 20:51:49', 'active'),
(11, 7, 'Credit Notes', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-credit-notes.php', 4, '2022-08-07 11:49:54', '2022-08-22 20:51:49', 'active'),
(12, 7, 'Customers', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-customers.php', 6, '2022-08-07 11:51:13', '2022-08-22 20:51:49', 'active'),
(13, 0, 'Purchases', '<i class=\"nav-icon fas fa-edit\"></i>', '', 2, '2022-08-07 11:51:38', '2022-08-07 11:52:01', 'active'),
(14, 13, 'Purchases Orders', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-purchases-orders.php', 1, '2022-08-07 11:53:46', '2022-08-22 20:51:49', 'active'),
(15, 13, 'Bills', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-bills.php', 2, '2022-08-07 11:54:13', '2022-08-22 20:51:49', 'active'),
(16, 13, 'Payments', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-payments.php', 3, '2022-08-07 11:55:10', '2022-08-22 20:51:49', 'active'),
(17, 13, 'Debit Notes', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-debit-notes.php', 4, '2022-08-07 11:56:07', '2022-08-22 20:51:49', 'active'),
(18, 13, 'Vendors', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-vendors.php', 5, '2022-08-07 11:56:36', '2022-08-22 20:51:49', 'active'),
(19, 13, 'GRN', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-grn.php', 6, '2022-08-07 11:57:01', '2022-08-22 20:51:49', 'active'),
(20, 0, 'Reports', '<i class=\"nav-icon fas fa-edit\"></i>', '', 3, '2022-08-07 11:57:40', '2022-08-07 11:57:40', 'active'),
(21, 0, 'Branch', '<i class=\"nav-icon fas fa-edit\"></i>', '', 0, '2022-08-07 12:10:05', '2022-08-07 12:10:05', 'active'),
(22, 21, 'Manage Branch', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-branches.php', 1, '2022-08-07 12:10:45', '2022-08-22 20:51:49', 'active'),
(23, 0, 'Items', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', '', 0, '2022-08-22 17:53:41', '2022-08-22 20:51:49', 'active'),
(24, 23, 'Goods', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'goods.php', 0, '2022-08-22 17:54:08', '2022-08-22 20:49:38', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_roles`
--

CREATE TABLE `tbl_admin_roles` (
  `fldRoleKey` int(11) NOT NULL,
  `fldRoleName` varchar(255) NOT NULL,
  `fldRoleAccesses` varchar(255) NOT NULL,
  `fldRoleDescription` text NOT NULL,
  `fldRoleCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldRoleUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldRoleStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_roles`
--

INSERT INTO `tbl_admin_roles` (`fldRoleKey`, `fldRoleName`, `fldRoleAccesses`, `fldRoleDescription`, `fldRoleCreatedAt`, `fldRoleUpdatedAt`, `fldRoleStatus`) VALUES
(1, 'Supper Admin', '0', 'Have all the webmaster accesses', '2022-07-30 23:43:05', '2022-08-22 20:17:41', 'inactive'),
(2, 'Test role', '4,2', 'test role access', '2022-08-01 11:47:23', '2022-08-01 11:47:23', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_admin_details`
--

CREATE TABLE `tbl_web_admin_details` (
  `fldAdminKey` int(11) NOT NULL,
  `fldAdminName` varchar(255) NOT NULL,
  `fldAdminEmail` varchar(255) NOT NULL,
  `fldAdminPhone` varchar(20) DEFAULT NULL,
  `fldAdminPassword` varchar(255) NOT NULL,
  `fldAdminRole` int(11) NOT NULL,
  `fldAdminAvatar` varchar(255) DEFAULT NULL,
  `fldAdminCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldAdminUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldAdminStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `fldAdminNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_admin_details`
--

INSERT INTO `tbl_web_admin_details` (`fldAdminKey`, `fldAdminName`, `fldAdminEmail`, `fldAdminPhone`, `fldAdminPassword`, `fldAdminRole`, `fldAdminAvatar`, `fldAdminCreatedAt`, `fldAdminUpdatedAt`, `fldAdminStatus`, `fldAdminNotes`) VALUES
(1, 'Super User', 'admin@vitwo.in', '9988776655', '12345678', 1, NULL, '2022-07-30 23:45:03', '2022-08-07 22:17:19', 'active', NULL),
(2, 'Test role user', 'testroleadmin@start-project.com', '9876543212', '12345678', 2, '', '2022-08-01 11:47:59', '2022-08-01 11:47:59', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_admin_menu`
--

CREATE TABLE `tbl_web_admin_menu` (
  `fldMenuKey` int(11) NOT NULL,
  `fldParentMenuKey` int(11) NOT NULL DEFAULT 0,
  `fldMenuLabel` varchar(250) NOT NULL,
  `fldMenuIcon` varchar(255) NOT NULL,
  `fldMenuFile` varchar(250) DEFAULT NULL,
  `fldMenuOrderBy` int(11) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldMenuStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_web_admin_menu`
--

INSERT INTO `tbl_web_admin_menu` (`fldMenuKey`, `fldParentMenuKey`, `fldMenuLabel`, `fldMenuIcon`, `fldMenuFile`, `fldMenuOrderBy`, `fldCreatedAt`, `fldUpdatedAt`, `fldMenuStatus`) VALUES
(1, 0, 'Manage Users', '<i class=\"nav-icon fas fa-edit\"></i>', '', 100, '2022-07-30 23:52:06', '2022-08-01 11:46:27', 'active'),
(2, 1, 'Manage Users', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-users.php', 0, '2022-07-30 23:52:57', '2022-07-30 23:52:57', 'active'),
(3, 0, 'Manage Content', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-07-30 23:53:46', '2022-08-07 12:01:52', 'inactive'),
(4, 3, 'Common Content', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-common-content.php', 0, '2022-07-30 23:54:33', '2022-07-30 23:54:33', 'active'),
(5, 0, 'Manage Contact Us', '<i class=\"nav-icon fas fa-edit\"></i>', '', 2, '2022-07-30 23:55:21', '2022-08-07 12:02:23', 'inactive'),
(6, 5, 'Manage Contact Us', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-contact-us.php', 0, '2022-07-30 23:55:56', '2022-07-30 23:55:56', 'active'),
(7, 0, 'Sales', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-08-07 11:46:12', '2022-08-07 11:46:12', 'active'),
(8, 7, 'Sales Orders', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-sales-orders.php', 1, '2022-08-07 11:47:29', '2022-08-07 11:47:29', 'active'),
(9, 7, 'Invoices', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-invoices.php', 2, '2022-08-07 11:48:04', '2022-08-07 11:48:04', 'active'),
(10, 7, 'Revenues', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-revenues.php', 3, '2022-08-07 11:48:54', '2022-08-07 11:48:54', 'active'),
(11, 7, 'Credit Notes', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-credit-notes.php', 4, '2022-08-07 11:49:54', '2022-08-07 11:49:54', 'active'),
(12, 7, 'Customers', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-customers.php', 6, '2022-08-07 11:51:13', '2022-08-07 11:51:13', 'active'),
(13, 0, 'Purchases', '<i class=\"nav-icon fas fa-edit\"></i>', '', 2, '2022-08-07 11:51:38', '2022-08-07 11:52:01', 'active'),
(14, 13, 'Purchases Orders', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-purchases-orders.php', 1, '2022-08-07 11:53:46', '2022-08-07 11:53:46', 'active'),
(15, 13, 'Bills', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-bills.php', 2, '2022-08-07 11:54:13', '2022-08-07 11:54:13', 'active'),
(16, 13, 'Payments', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-payments.php', 3, '2022-08-07 11:55:10', '2022-08-07 11:55:33', 'active'),
(17, 13, 'Debit Notes', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-debit-notes.php', 4, '2022-08-07 11:56:07', '2022-08-07 11:56:07', 'active'),
(18, 13, 'Vendors', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-vendors.php', 5, '2022-08-07 11:56:36', '2022-08-07 11:56:36', 'active'),
(19, 13, 'GRN', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-grn.php', 6, '2022-08-07 11:57:01', '2022-08-07 11:57:01', 'active'),
(20, 0, 'Reports', '<i class=\"nav-icon fas fa-edit\"></i>', '', 3, '2022-08-07 11:57:40', '2022-08-07 11:57:40', 'active'),
(21, 0, 'Branch', '<i class=\"nav-icon fas fa-edit\"></i>', '', 0, '2022-08-07 12:10:05', '2022-08-07 12:10:05', 'active'),
(22, 21, 'Manage Branch', '<i class=\"far fa-circle nav-icon\"></i>', 'manage-branches.php', 1, '2022-08-07 12:10:45', '2022-08-07 12:10:45', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_admin_roles`
--

CREATE TABLE `tbl_web_admin_roles` (
  `fldRoleKey` int(11) NOT NULL,
  `fldRoleName` varchar(255) NOT NULL,
  `fldRoleAccesses` varchar(255) NOT NULL,
  `fldRoleDescription` text NOT NULL,
  `fldRoleCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldRoleUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldRoleStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_admin_roles`
--

INSERT INTO `tbl_web_admin_roles` (`fldRoleKey`, `fldRoleName`, `fldRoleAccesses`, `fldRoleDescription`, `fldRoleCreatedAt`, `fldRoleUpdatedAt`, `fldRoleStatus`) VALUES
(1, 'Supper Admin', '0', 'Have all the webmaster accesses', '2022-07-30 23:43:05', '2022-07-31 21:57:34', 'active'),
(2, 'Test role', '4,2', 'test role access', '2022-08-01 11:47:23', '2022-08-01 11:47:23', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_admin_settings`
--

CREATE TABLE `tbl_web_admin_settings` (
  `fldSettingKey` int(11) NOT NULL,
  `fldSettingName` varchar(255) NOT NULL,
  `fldSettingValue` varchar(255) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldStatus` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_admin_settings`
--

INSERT INTO `tbl_web_admin_settings` (`fldSettingKey`, `fldSettingName`, `fldSettingValue`, `fldCreatedAt`, `fldUpdatedAt`, `fldStatus`) VALUES
(1, 'title', 'Vitwo', '2021-11-25 18:22:23', '2022-08-07 11:18:16', 'active'),
(2, 'phone', '9876543210', '2021-11-25 18:22:33', '2022-07-16 21:23:31', 'active'),
(3, 'email', 'support@vitwo.in', '2021-11-25 18:22:53', '2022-08-07 11:18:16', 'active'),
(4, 'address', 'kolkata, India', '2021-11-25 18:23:30', '2022-08-07 09:34:52', 'active'),
(5, 'logo', '165985129676596.png', '2021-11-25 18:45:30', '2022-08-07 11:18:16', 'active'),
(6, 'favicon', '165985132599981.ico', '2021-12-02 13:39:08', '2022-08-07 11:18:45', 'active'),
(7, 'timeZone', 'Asia/Kolkata', '2021-12-02 14:19:05', '2022-07-16 22:57:12', 'active'),
(8, 'footer', 'Copyright © 2022 vitwo.in, All rights reserved.', '2021-12-02 14:19:05', '2022-08-07 11:18:16', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bank_details`
--

CREATE TABLE `vendor_bank_details` (
  `vendor_bank_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_bank_name` varchar(50) NOT NULL,
  `vendor_bank_account_no` varchar(50) NOT NULL,
  `vendor_bank_ifsc` varchar(50) NOT NULL,
  `vendor_bank_branch` varchar(255) NOT NULL,
  `vendor_bank_address` varchar(255) NOT NULL,
  `vendor_bank_cancelled_cheque` varchar(255) NOT NULL,
  `vendor_bank_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vendor_bank_created_by` int(11) NOT NULL,
  `vendor_bank_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_bank_updated_by` int(11) NOT NULL,
  `vendor_bank_active_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bussiness_places`
--

CREATE TABLE `vendor_bussiness_places` (
  `vendor_business_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_business_primary_flag` int(11) NOT NULL DEFAULT 0,
  `vendor_business_gstin` varchar(50) NOT NULL,
  `vendor_business_legal_name` varchar(255) NOT NULL,
  `vendor_business_trade_name` varchar(255) NOT NULL,
  `vendor_business_constitution` varchar(255) NOT NULL,
  `vendor_business_building_no` varchar(255) NOT NULL,
  `vendor_business_flat_no` varchar(255) NOT NULL,
  `vendor_business_street_name` varchar(255) NOT NULL,
  `vendor_business_pin_code` varchar(50) NOT NULL,
  `vendor_business_location` varchar(255) NOT NULL,
  `vendor_business_city` varchar(50) NOT NULL,
  `vendor_business_district` varchar(50) NOT NULL,
  `vendor_business_state` varchar(50) NOT NULL,
  `vendor_business_status` varchar(50) NOT NULL,
  `vendor_business_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vendor_business_created_by` int(11) NOT NULL,
  `vendor_business_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_business_updated_by` int(11) NOT NULL,
  `vendor_business_active_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE `vendor_details` (
  `vendor_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_branch_id` int(11) NOT NULL,
  `vendor_code` varchar(50) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_pan` varchar(50) NOT NULL,
  `vendor_tan` varchar(50) NOT NULL,
  `vendor_gstin` varchar(50) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_alt_email` varchar(50) NOT NULL,
  `vendor_phone` varchar(20) NOT NULL,
  `vendor_alt_phone` varchar(20) NOT NULL,
  `vendor_opening_balance` float(10,2) NOT NULL,
  `vendor_currency` varchar(50) NOT NULL,
  `vendor_visible_to_all` int(11) NOT NULL DEFAULT 1,
  `vendor_fssai` varchar(100) NOT NULL,
  `vendor_credit_period` varchar(50) NOT NULL,
  `vendor_picture` varchar(255) NOT NULL,
  `vendor_authorised_person_name` varchar(50) NOT NULL,
  `vendor_authorised_person_email` varchar(50) NOT NULL,
  `vendor_authorised_person_phone` varchar(50) NOT NULL,
  `vendor_authorised_person_designation` varchar(50) NOT NULL,
  `vendor_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vendor_created_by` int(11) NOT NULL,
  `vendor_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_updated_by` int(11) NOT NULL,
  `vendor_active_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `inventory_mstr_good_groups`
--
ALTER TABLE `inventory_mstr_good_groups`
  ADD PRIMARY KEY (`goodGroupId`);

--
-- Indexes for table `inventory_mstr_good_types`
--
ALTER TABLE `inventory_mstr_good_types`
  ADD PRIMARY KEY (`goodTypeId`);

--
-- Indexes for table `inventory_mstr_time_units`
--
ALTER TABLE `inventory_mstr_time_units`
  ADD PRIMARY KEY (`timeUnitId`);

--
-- Indexes for table `inventory_mstr_uom`
--
ALTER TABLE `inventory_mstr_uom`
  ADD PRIMARY KEY (`uomId`);

--
-- Indexes for table `tbl_admin_details`
--
ALTER TABLE `tbl_admin_details`
  ADD PRIMARY KEY (`fldAdminKey`);

--
-- Indexes for table `tbl_admin_menu`
--
ALTER TABLE `tbl_admin_menu`
  ADD PRIMARY KEY (`fldMenuKey`);

--
-- Indexes for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD PRIMARY KEY (`fldRoleKey`);

--
-- Indexes for table `tbl_web_admin_details`
--
ALTER TABLE `tbl_web_admin_details`
  ADD PRIMARY KEY (`fldAdminKey`);

--
-- Indexes for table `tbl_web_admin_menu`
--
ALTER TABLE `tbl_web_admin_menu`
  ADD PRIMARY KEY (`fldMenuKey`);

--
-- Indexes for table `tbl_web_admin_roles`
--
ALTER TABLE `tbl_web_admin_roles`
  ADD PRIMARY KEY (`fldRoleKey`);

--
-- Indexes for table `tbl_web_admin_settings`
--
ALTER TABLE `tbl_web_admin_settings`
  ADD PRIMARY KEY (`fldSettingKey`);

--
-- Indexes for table `vendor_bank_details`
--
ALTER TABLE `vendor_bank_details`
  ADD PRIMARY KEY (`vendor_bank_id`);

--
-- Indexes for table `vendor_bussiness_places`
--
ALTER TABLE `vendor_bussiness_places`
  ADD PRIMARY KEY (`vendor_business_id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inventory_mstr_good_groups`
--
ALTER TABLE `inventory_mstr_good_groups`
  MODIFY `goodGroupId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_mstr_good_types`
--
ALTER TABLE `inventory_mstr_good_types`
  MODIFY `goodTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_mstr_time_units`
--
ALTER TABLE `inventory_mstr_time_units`
  MODIFY `timeUnitId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_mstr_uom`
--
ALTER TABLE `inventory_mstr_uom`
  MODIFY `uomId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin_details`
--
ALTER TABLE `tbl_admin_details`
  MODIFY `fldAdminKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin_menu`
--
ALTER TABLE `tbl_admin_menu`
  MODIFY `fldMenuKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  MODIFY `fldRoleKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_web_admin_details`
--
ALTER TABLE `tbl_web_admin_details`
  MODIFY `fldAdminKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_web_admin_menu`
--
ALTER TABLE `tbl_web_admin_menu`
  MODIFY `fldMenuKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_web_admin_roles`
--
ALTER TABLE `tbl_web_admin_roles`
  MODIFY `fldRoleKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_web_admin_settings`
--
ALTER TABLE `tbl_web_admin_settings`
  MODIFY `fldSettingKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor_bank_details`
--
ALTER TABLE `vendor_bank_details`
  MODIFY `vendor_bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_bussiness_places`
--
ALTER TABLE `vendor_bussiness_places`
  MODIFY `vendor_business_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_details`
--
ALTER TABLE `vendor_details`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
