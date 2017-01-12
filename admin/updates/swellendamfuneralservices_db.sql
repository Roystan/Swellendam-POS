-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.20-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table croogo.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `policy_number` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `address2` text COLLATE utf8_unicode_ci,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.accounts: ~3 rows (approximately)
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `account_number`, `policy_number`, `idnumber`, `position`, `address`, `address2`, `state`, `country`, `postcode`, `phone`, `fax`, `email`, `status`, `updated`, `created`) VALUES
	(1, 'Roystan', 'Smith', '878325', '234124', '8510165213083', '', '7 Hermes Avenue\r\nSaxon Sea\r\nAtlantis\r\n7349', '', '', '', '7349', '07889272872', '', 'roystan@gmail.com', 1, '2016-01-04 11:14:34', '2016-01-01 17:49:35'),
	(2, 'Wynne', 'Makriga', '875132', '234325342', '897324652836', NULL, '12 Fernande', 'fasdfasfasd', 'asdf', 'asdfas', 'asdf', 'asdfas', 'asdfa', 'makrigawynne@gmail.com', 1, '2016-01-04 10:21:10', '2016-01-03 22:41:51'),
	(3, 'Ryan', 'Bestenbier', '', '54', '887565765765', NULL, 'hgf', 'ds', '', '', '', '', '', 'ryan@gmail.com', 1, '2016-01-05 22:46:06', '2016-01-05 22:46:06');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;


-- Dumping structure for table croogo.account_statuses
CREATE TABLE IF NOT EXISTS `account_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.account_statuses: ~2 rows (approximately)
/*!40000 ALTER TABLE `account_statuses` DISABLE KEYS */;
INSERT INTO `account_statuses` (`id`, `title`, `updated`, `created`) VALUES
	(1, 'Up to date', '2016-01-08 12:06:43', '2016-01-08 12:06:41'),
	(2, 'In Arrears', '2016-01-08 12:07:02', '2016-01-08 12:07:01');
/*!40000 ALTER TABLE `account_statuses` ENABLE KEYS */;


-- Dumping structure for table croogo.acos
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.acos: ~193 rows (approximately)
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, NULL, NULL, NULL, 'controllers', 1, 386),
	(2, 1, NULL, NULL, 'Acl', 2, 25),
	(3, 2, NULL, NULL, 'AclActions', 3, 16),
	(4, 3, NULL, NULL, 'admin_index', 4, 5),
	(5, 3, NULL, NULL, 'admin_add', 6, 7),
	(6, 3, NULL, NULL, 'admin_edit', 8, 9),
	(7, 3, NULL, NULL, 'admin_delete', 10, 11),
	(8, 3, NULL, NULL, 'admin_move', 12, 13),
	(9, 3, NULL, NULL, 'admin_generate', 14, 15),
	(10, 2, NULL, NULL, 'AclPermissions', 17, 24),
	(11, 10, NULL, NULL, 'admin_index', 18, 19),
	(12, 10, NULL, NULL, 'admin_toggle', 20, 21),
	(13, 10, NULL, NULL, 'admin_upgrade', 22, 23),
	(14, 1, NULL, NULL, 'Blocks', 26, 55),
	(15, 14, NULL, NULL, 'Blocks', 27, 44),
	(16, 15, NULL, NULL, 'admin_toggle', 28, 29),
	(17, 15, NULL, NULL, 'admin_index', 30, 31),
	(18, 15, NULL, NULL, 'admin_add', 32, 33),
	(19, 15, NULL, NULL, 'admin_edit', 34, 35),
	(20, 15, NULL, NULL, 'admin_delete', 36, 37),
	(21, 15, NULL, NULL, 'admin_moveup', 38, 39),
	(22, 15, NULL, NULL, 'admin_movedown', 40, 41),
	(23, 15, NULL, NULL, 'admin_process', 42, 43),
	(24, 14, NULL, NULL, 'Regions', 45, 54),
	(25, 24, NULL, NULL, 'admin_index', 46, 47),
	(26, 24, NULL, NULL, 'admin_add', 48, 49),
	(27, 24, NULL, NULL, 'admin_edit', 50, 51),
	(28, 24, NULL, NULL, 'admin_delete', 52, 53),
	(29, 1, NULL, NULL, 'Comments', 56, 73),
	(30, 29, NULL, NULL, 'Comments', 57, 72),
	(31, 30, NULL, NULL, 'admin_index', 58, 59),
	(32, 30, NULL, NULL, 'admin_edit', 60, 61),
	(33, 30, NULL, NULL, 'admin_delete', 62, 63),
	(34, 30, NULL, NULL, 'admin_process', 64, 65),
	(35, 30, NULL, NULL, 'index', 66, 67),
	(36, 30, NULL, NULL, 'add', 68, 69),
	(37, 30, NULL, NULL, 'delete', 70, 71),
	(38, 1, NULL, NULL, 'Contacts', 74, 97),
	(39, 38, NULL, NULL, 'Contacts', 75, 86),
	(40, 39, NULL, NULL, 'admin_index', 76, 77),
	(41, 39, NULL, NULL, 'admin_add', 78, 79),
	(42, 39, NULL, NULL, 'admin_edit', 80, 81),
	(43, 39, NULL, NULL, 'admin_delete', 82, 83),
	(44, 39, NULL, NULL, 'view', 84, 85),
	(45, 38, NULL, NULL, 'Messages', 87, 96),
	(46, 45, NULL, NULL, 'admin_index', 88, 89),
	(47, 45, NULL, NULL, 'admin_edit', 90, 91),
	(48, 45, NULL, NULL, 'admin_delete', 92, 93),
	(49, 45, NULL, NULL, 'admin_process', 94, 95),
	(50, 1, NULL, NULL, 'Croogo', 98, 99),
	(51, 1, NULL, NULL, 'Extensions', 100, 139),
	(52, 51, NULL, NULL, 'ExtensionsLocales', 101, 112),
	(53, 52, NULL, NULL, 'admin_index', 102, 103),
	(54, 52, NULL, NULL, 'admin_activate', 104, 105),
	(55, 52, NULL, NULL, 'admin_add', 106, 107),
	(56, 52, NULL, NULL, 'admin_edit', 108, 109),
	(57, 52, NULL, NULL, 'admin_delete', 110, 111),
	(58, 51, NULL, NULL, 'ExtensionsPlugins', 113, 124),
	(59, 58, NULL, NULL, 'admin_index', 114, 115),
	(60, 58, NULL, NULL, 'admin_add', 116, 117),
	(61, 58, NULL, NULL, 'admin_delete', 118, 119),
	(62, 58, NULL, NULL, 'admin_toggle', 120, 121),
	(63, 58, NULL, NULL, 'admin_migrate', 122, 123),
	(64, 51, NULL, NULL, 'ExtensionsThemes', 125, 138),
	(65, 64, NULL, NULL, 'admin_index', 126, 127),
	(66, 64, NULL, NULL, 'admin_activate', 128, 129),
	(67, 64, NULL, NULL, 'admin_add', 130, 131),
	(68, 64, NULL, NULL, 'admin_editor', 132, 133),
	(69, 64, NULL, NULL, 'admin_save', 134, 135),
	(70, 64, NULL, NULL, 'admin_delete', 136, 137),
	(71, 1, NULL, NULL, 'FileManager', 140, 175),
	(72, 71, NULL, NULL, 'Attachments', 141, 152),
	(73, 72, NULL, NULL, 'admin_index', 142, 143),
	(74, 72, NULL, NULL, 'admin_add', 144, 145),
	(75, 72, NULL, NULL, 'admin_edit', 146, 147),
	(76, 72, NULL, NULL, 'admin_delete', 148, 149),
	(77, 72, NULL, NULL, 'admin_browse', 150, 151),
	(78, 71, NULL, NULL, 'FileManager', 153, 174),
	(79, 78, NULL, NULL, 'admin_index', 154, 155),
	(80, 78, NULL, NULL, 'admin_browse', 156, 157),
	(81, 78, NULL, NULL, 'admin_editfile', 158, 159),
	(82, 78, NULL, NULL, 'admin_upload', 160, 161),
	(83, 78, NULL, NULL, 'admin_delete_file', 162, 163),
	(84, 78, NULL, NULL, 'admin_delete_directory', 164, 165),
	(85, 78, NULL, NULL, 'admin_rename', 166, 167),
	(86, 78, NULL, NULL, 'admin_create_directory', 168, 169),
	(87, 78, NULL, NULL, 'admin_create_file', 170, 171),
	(88, 78, NULL, NULL, 'admin_chmod', 172, 173),
	(89, 1, NULL, NULL, 'Install', 176, 189),
	(90, 89, NULL, NULL, 'Install', 177, 188),
	(91, 90, NULL, NULL, 'index', 178, 179),
	(92, 90, NULL, NULL, 'database', 180, 181),
	(93, 90, NULL, NULL, 'data', 182, 183),
	(94, 90, NULL, NULL, 'adminuser', 184, 185),
	(95, 90, NULL, NULL, 'finish', 186, 187),
	(96, 1, NULL, NULL, 'Menus', 190, 219),
	(97, 96, NULL, NULL, 'Links', 191, 208),
	(98, 97, NULL, NULL, 'admin_toggle', 192, 193),
	(99, 97, NULL, NULL, 'admin_index', 194, 195),
	(100, 97, NULL, NULL, 'admin_add', 196, 197),
	(101, 97, NULL, NULL, 'admin_edit', 198, 199),
	(102, 97, NULL, NULL, 'admin_delete', 200, 201),
	(103, 97, NULL, NULL, 'admin_moveup', 202, 203),
	(104, 97, NULL, NULL, 'admin_movedown', 204, 205),
	(105, 97, NULL, NULL, 'admin_process', 206, 207),
	(106, 96, NULL, NULL, 'Menus', 209, 218),
	(107, 106, NULL, NULL, 'admin_index', 210, 211),
	(108, 106, NULL, NULL, 'admin_add', 212, 213),
	(109, 106, NULL, NULL, 'admin_edit', 214, 215),
	(110, 106, NULL, NULL, 'admin_delete', 216, 217),
	(111, 1, NULL, NULL, 'Meta', 220, 221),
	(112, 1, NULL, NULL, 'Migrations', 222, 223),
	(113, 1, NULL, NULL, 'Nodes', 224, 257),
	(114, 113, NULL, NULL, 'Nodes', 225, 256),
	(115, 114, NULL, NULL, 'admin_toggle', 226, 227),
	(116, 114, NULL, NULL, 'admin_index', 228, 229),
	(117, 114, NULL, NULL, 'admin_create', 230, 231),
	(118, 114, NULL, NULL, 'admin_add', 232, 233),
	(119, 114, NULL, NULL, 'admin_edit', 234, 235),
	(120, 114, NULL, NULL, 'admin_update_paths', 236, 237),
	(121, 114, NULL, NULL, 'admin_delete', 238, 239),
	(122, 114, NULL, NULL, 'admin_delete_meta', 240, 241),
	(123, 114, NULL, NULL, 'admin_add_meta', 242, 243),
	(124, 114, NULL, NULL, 'admin_process', 244, 245),
	(125, 114, NULL, NULL, 'index', 246, 247),
	(126, 114, NULL, NULL, 'term', 248, 249),
	(127, 114, NULL, NULL, 'promoted', 250, 251),
	(128, 114, NULL, NULL, 'search', 252, 253),
	(129, 114, NULL, NULL, 'view', 254, 255),
	(130, 1, NULL, NULL, 'Search', 258, 259),
	(131, 1, NULL, NULL, 'Settings', 260, 297),
	(132, 131, NULL, NULL, 'Languages', 261, 276),
	(133, 132, NULL, NULL, 'admin_index', 262, 263),
	(134, 132, NULL, NULL, 'admin_add', 264, 265),
	(135, 132, NULL, NULL, 'admin_edit', 266, 267),
	(136, 132, NULL, NULL, 'admin_delete', 268, 269),
	(137, 132, NULL, NULL, 'admin_moveup', 270, 271),
	(138, 132, NULL, NULL, 'admin_movedown', 272, 273),
	(139, 132, NULL, NULL, 'admin_select', 274, 275),
	(140, 131, NULL, NULL, 'Settings', 277, 296),
	(141, 140, NULL, NULL, 'admin_dashboard', 278, 279),
	(142, 140, NULL, NULL, 'admin_index', 280, 281),
	(143, 140, NULL, NULL, 'admin_view', 282, 283),
	(144, 140, NULL, NULL, 'admin_add', 284, 285),
	(145, 140, NULL, NULL, 'admin_edit', 286, 287),
	(146, 140, NULL, NULL, 'admin_delete', 288, 289),
	(147, 140, NULL, NULL, 'admin_prefix', 290, 291),
	(148, 140, NULL, NULL, 'admin_moveup', 292, 293),
	(149, 140, NULL, NULL, 'admin_movedown', 294, 295),
	(150, 1, NULL, NULL, 'Taxonomy', 298, 337),
	(151, 150, NULL, NULL, 'Terms', 299, 312),
	(152, 151, NULL, NULL, 'admin_index', 300, 301),
	(153, 151, NULL, NULL, 'admin_add', 302, 303),
	(154, 151, NULL, NULL, 'admin_edit', 304, 305),
	(155, 151, NULL, NULL, 'admin_delete', 306, 307),
	(156, 151, NULL, NULL, 'admin_moveup', 308, 309),
	(157, 151, NULL, NULL, 'admin_movedown', 310, 311),
	(158, 150, NULL, NULL, 'Types', 313, 322),
	(159, 158, NULL, NULL, 'admin_index', 314, 315),
	(160, 158, NULL, NULL, 'admin_add', 316, 317),
	(161, 158, NULL, NULL, 'admin_edit', 318, 319),
	(162, 158, NULL, NULL, 'admin_delete', 320, 321),
	(163, 150, NULL, NULL, 'Vocabularies', 323, 336),
	(164, 163, NULL, NULL, 'admin_index', 324, 325),
	(165, 163, NULL, NULL, 'admin_add', 326, 327),
	(166, 163, NULL, NULL, 'admin_edit', 328, 329),
	(167, 163, NULL, NULL, 'admin_delete', 330, 331),
	(168, 163, NULL, NULL, 'admin_moveup', 332, 333),
	(169, 163, NULL, NULL, 'admin_movedown', 334, 335),
	(170, 1, NULL, NULL, 'Ckeditor', 338, 339),
	(171, 1, NULL, NULL, 'Users', 340, 385),
	(172, 171, NULL, NULL, 'Roles', 341, 350),
	(173, 172, NULL, NULL, 'admin_index', 342, 343),
	(174, 172, NULL, NULL, 'admin_add', 344, 345),
	(175, 172, NULL, NULL, 'admin_edit', 346, 347),
	(176, 172, NULL, NULL, 'admin_delete', 348, 349),
	(177, 171, NULL, NULL, 'Users', 351, 384),
	(178, 177, NULL, NULL, 'admin_index', 352, 353),
	(179, 177, NULL, NULL, 'admin_add', 354, 355),
	(180, 177, NULL, NULL, 'admin_edit', 356, 357),
	(181, 177, NULL, NULL, 'admin_reset_password', 358, 359),
	(182, 177, NULL, NULL, 'admin_delete', 360, 361),
	(183, 177, NULL, NULL, 'admin_login', 362, 363),
	(184, 177, NULL, NULL, 'admin_logout', 364, 365),
	(185, 177, NULL, NULL, 'index', 366, 367),
	(186, 177, NULL, NULL, 'add', 368, 369),
	(187, 177, NULL, NULL, 'activate', 370, 371),
	(188, 177, NULL, NULL, 'edit', 372, 373),
	(189, 177, NULL, NULL, 'forgot', 374, 375),
	(190, 177, NULL, NULL, 'reset', 376, 377),
	(191, 177, NULL, NULL, 'login', 378, 379),
	(192, 177, NULL, NULL, 'logout', 380, 381),
	(193, 177, NULL, NULL, 'view', 382, 383);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;


-- Dumping structure for table croogo.aros
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.aros: ~10 rows (approximately)
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
	(1, 2, 'Role', 1, 'Role-admin', 3, 8),
	(2, 3, 'Role', 2, 'Role-registered', 2, 19),
	(3, NULL, 'Role', 3, 'Role-public', 1, 20),
	(4, 1, 'User', 2, 'admin1', 4, 5),
	(5, 2, 'User', 3, 'linsay', 9, 10),
	(6, 2, 'User', 4, 'eathan', 11, 12),
	(7, 2, 'User', 5, 'justin', 13, 14),
	(8, 2, 'User', 6, 'ricardo', 15, 16),
	(9, 2, 'User', 7, 'shirod', 17, 18),
	(10, 1, 'User', 8, 'roystan', 6, 7);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;


-- Dumping structure for table croogo.aros_acos
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.aros_acos: ~18 rows (approximately)
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
	(1, 3, 35, '1', '1', '1', '1'),
	(2, 3, 36, '1', '1', '1', '1'),
	(3, 2, 37, '1', '1', '1', '1'),
	(4, 3, 44, '1', '1', '1', '1'),
	(5, 3, 125, '1', '1', '1', '1'),
	(6, 3, 126, '1', '1', '1', '1'),
	(7, 3, 127, '1', '1', '1', '1'),
	(8, 3, 128, '1', '1', '1', '1'),
	(9, 3, 129, '1', '1', '1', '1'),
	(10, 2, 185, '1', '1', '1', '1'),
	(11, 3, 186, '1', '1', '1', '1'),
	(12, 3, 187, '1', '1', '1', '1'),
	(13, 2, 188, '1', '1', '1', '1'),
	(14, 3, 189, '1', '1', '1', '1'),
	(15, 3, 190, '1', '1', '1', '1'),
	(16, 3, 191, '1', '1', '1', '1'),
	(17, 2, 192, '1', '1', '1', '1'),
	(18, 2, 193, '1', '1', '1', '1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;


-- Dumping structure for table croogo.blocks
CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `region_id` int(20) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `weight` int(11) DEFAULT NULL,
  `element` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visibility_roles` text COLLATE utf8_unicode_ci,
  `visibility_paths` text COLLATE utf8_unicode_ci,
  `visibility_php` text COLLATE utf8_unicode_ci,
  `params` text COLLATE utf8_unicode_ci,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.blocks: ~6 rows (approximately)
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` (`id`, `region_id`, `title`, `alias`, `body`, `show_title`, `class`, `status`, `weight`, `element`, `visibility_roles`, `visibility_paths`, `visibility_php`, `params`, `updated`, `created`) VALUES
	(3, 4, 'About', 'about', 'SBD is a customer relationship management system used to manage user accounts', 1, '', 1, 2, '', '', '', '', '', '2009-12-20 03:07:39', '2009-07-26 17:13:14'),
	(5, 4, 'Meta', 'meta', '[menu:meta]', 1, '', 1, 6, '', '', '', '', '', '2009-12-22 05:17:39', '2009-09-12 06:36:22'),
	(6, 4, 'Blogroll', 'blogroll', '[menu:blogroll]', 0, '', 0, 4, '', '', '', '', '', '2016-01-01 05:42:13', '2009-09-12 23:33:27'),
	(7, 4, 'Categories', 'categories', '[vocabulary:categories type="blog"]', 0, '', 0, 3, '', '', '', '', '', '2016-01-01 05:51:59', '2009-10-03 16:52:50'),
	(8, 4, 'Search', 'search', '', 0, '', 0, 1, 'Nodes.search', '', '', '', '', '2016-01-01 05:44:03', '2009-12-20 03:07:27'),
	(9, 4, 'Recent Posts', 'recent_posts', '[node:recent_posts conditions="Node.type:blog" order="Node.id DESC" limit="5"]', 0, '', 0, 5, '', '', '', '', '', '2016-01-01 05:50:53', '2009-12-22 05:17:32');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;


-- Dumping structure for table croogo.cake_sessions
CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `data` text COLLATE utf8_unicode_ci,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.cake_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `cake_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cake_sessions` ENABLE KEYS */;


-- Dumping structure for table croogo.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `updated`, `created`) VALUES
	(1, 'Single', NULL, '2016-01-06 19:14:33'),
	(2, 'Family', NULL, '2016-01-06 19:14:44');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table croogo.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `parent_id` int(20) DEFAULT NULL,
  `node_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `notify` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'comment',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.comments: ~2 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `parent_id`, `node_id`, `user_id`, `name`, `email`, `website`, `ip`, `title`, `body`, `rating`, `status`, `notify`, `type`, `comment_type`, `lft`, `rght`, `updated`, `created`) VALUES
	(1, NULL, 1, 0, 'Mr Croogo', 'email@example.com', 'http://www.croogo.org', '127.0.0.1', '', 'Hi, this is the first comment.', NULL, 1, 0, 'blog', 'comment', 1, 2, '2009-12-25 12:00:00', '2009-12-25 12:00:00'),
	(2, NULL, 1, 0, 'Roystana', 'roystansmith@gmail.com', 'liquidedge.co.za', '127.0.0.1', '', 'This is a comment.', NULL, 1, 0, 'blog', 'comment', 3, 4, '2016-01-07 00:21:32', '2015-12-31 04:45:03');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table croogo.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `address2` text COLLATE utf8_unicode_ci,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_status` tinyint(1) NOT NULL DEFAULT '1',
  `message_archive` tinyint(1) NOT NULL DEFAULT '1',
  `message_count` int(11) NOT NULL DEFAULT '0',
  `message_spam_protection` tinyint(1) NOT NULL DEFAULT '0',
  `message_captcha` tinyint(1) NOT NULL DEFAULT '0',
  `message_notify` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.contacts: ~11 rows (approximately)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `title`, `alias`, `body`, `name`, `position`, `address`, `address2`, `state`, `country`, `postcode`, `phone`, `fax`, `email`, `message_status`, `message_archive`, `message_count`, `message_spam_protection`, `message_captcha`, `message_notify`, `status`, `updated`, `created`) VALUES
	(1, 'Contact', 'contact', '', '', '', '', '', '', '', '', '', '', 'you@your-site.com', 1, 0, 0, 0, 0, 1, 1, '2009-10-07 22:07:49', '2009-09-16 01:45:17'),
	(2, 'Mr', 'ryan', 'ooe', '', '', '', '', '', '', '', '', '', 'ryna@gmail.com', 0, 0, 0, 0, 0, 0, 0, '2015-12-31 16:10:54', '2015-12-31 16:10:54'),
	(3, 'Mr', 'john', 'ihjd', '', '', '', '', '', '', '', '', '', 'john@gmail.com', 0, 0, 0, 0, 0, 0, 0, '2015-12-31 16:11:42', '2015-12-31 16:11:42'),
	(4, 'Ms', 'Leona', 'osj', '', '', '', '', '', '', '', '', '', 'leona@gmail.com', 0, 0, 0, 0, 0, 0, 0, '2015-12-31 16:12:43', '2015-12-31 16:12:43'),
	(5, 'Mr', 'Craig', 'js', '', '', '', '', '', '', '', '', '', 'graig@gmail.com', 0, 0, 0, 0, 0, 0, 0, '2015-12-31 16:13:40', '2015-12-31 16:13:40'),
	(6, 'Mr', 'johnaw', 'wdew', 'John', 'right', 'sdfs', 'qweqwqwe', 'asdf', '', '', '', '', 'john@gmail.com', 0, 0, 0, 0, 0, 0, 0, '2016-01-03 23:49:53', '2016-01-03 23:49:53'),
	(7, 'qwe', 'asdf', 'asdfa', '', '', '', '', '', '', '', '', '', 'asdfa@gmail.com', 0, 0, 0, 0, 0, 0, 0, '2016-01-03 23:50:44', '2016-01-03 23:50:44'),
	(8, 'asfd', 'ads', '', '', '', '', '', '', '', '', '', '', 'adfa@dfs.dsf', 0, 0, 0, 0, 0, 0, 0, '2016-01-03 23:51:10', '2016-01-03 23:51:10'),
	(9, 'Aas', 'dfgs', '', '', '', '', '', '', '', '', '', '', 'seryrt@gfsdf.dsbg', 0, 0, 0, 0, 0, 0, 0, '2016-01-05 12:28:26', '2016-01-03 23:51:31'),
	(10, 'bsdfsd', 'sfvaz', '', '', '', '', '', '', '', '', '', '', 'asfda@sdfgds.sdf', 0, 0, 0, 0, 0, 0, 0, '2016-01-03 23:51:49', '2016-01-03 23:51:49'),
	(11, 'fasdf', 'asdfsfd', '', '', '', '', '', '', '', '', '', '', 'ghrtdr@sdfg.sdf', 0, 0, 0, 0, 0, 0, 0, '2016-01-03 23:52:14', '2016-01-03 23:52:14');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;


-- Dumping structure for table croogo.dependantroles
CREATE TABLE IF NOT EXISTS `dependantroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `datemodified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.dependantroles: ~0 rows (approximately)
/*!40000 ALTER TABLE `dependantroles` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependantroles` ENABLE KEYS */;


-- Dumping structure for table croogo.dependantroles_dependants
CREATE TABLE IF NOT EXISTS `dependantroles_dependants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dependant_id` int(11) NOT NULL,
  `dependantrole_id` int(11) NOT NULL,
  `granted_by` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dependantroles_dependants` (`dependant_id`,`dependantrole_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.dependantroles_dependants: ~0 rows (approximately)
/*!40000 ALTER TABLE `dependantroles_dependants` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependantroles_dependants` ENABLE KEYS */;


-- Dumping structure for table croogo.dependants
CREATE TABLE IF NOT EXISTS `dependants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `firstname` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idnumber` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `telnr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellnr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waitingperiod` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `relationship_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.dependants: ~4 rows (approximately)
/*!40000 ALTER TABLE `dependants` DISABLE KEYS */;
INSERT INTO `dependants` (`id`, `category_id`, `firstname`, `lastname`, `idnumber`, `dateofbirth`, `address`, `telnr`, `cellnr`, `waitingperiod`, `gender_id`, `member_id`, `relationship_id`, `status_id`, `updated`, `created`) VALUES
	(1, 1, 'Shiloh', 'Gail', '87253652', '1990-10-16', 'Swellendam', '02187636', '0786255411', '1', 1, 5, 1, NULL, '2016-01-08 09:40:06', '2016-01-07 13:08:25'),
	(2, 1, 'Tamara', 'Bestenbier', '87346352', '2016-01-07', 'Swellendam', '021432654', '0781765252', '1', NULL, 5, 1, NULL, '2016-01-07 15:06:15', '2016-01-07 15:06:16'),
	(3, 1, 'Wynne', 'Makriga', '83286216', '1999-02-15', 'Swellendam', '021675357', '0871876262', '1', NULL, 6, 2, NULL, '2016-01-07 15:07:45', '2016-01-07 15:07:45'),
	(4, NULL, 'Shane', 'Solly', '887566755', '1985-10-16', '', '', '', '1', 1, 6, 1, 1, '2016-01-08 19:52:26', NULL);
/*!40000 ALTER TABLE `dependants` ENABLE KEYS */;


-- Dumping structure for table croogo.genders
CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.genders: ~2 rows (approximately)
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` (`id`, `title`, `updated`, `created`) VALUES
	(1, 'M', '2016-01-05 19:39:17', '2016-01-05 19:39:16'),
	(2, 'F', '2016-01-05 19:39:29', '2016-01-05 19:39:28');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;


-- Dumping structure for table croogo.i18n
CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `locale` (`locale`),
  KEY `model` (`model`),
  KEY `row_id` (`foreign_key`),
  KEY `field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.i18n: ~0 rows (approximately)
/*!40000 ALTER TABLE `i18n` DISABLE KEYS */;
/*!40000 ALTER TABLE `i18n` ENABLE KEYS */;


-- Dumping structure for table croogo.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `native` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `weight` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.languages: ~1 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` (`id`, `title`, `native`, `alias`, `status`, `weight`, `updated`, `created`) VALUES
	(1, 'English', 'English', 'eng', 1, 1, '2009-11-02 21:37:38', '2009-11-02 20:52:00');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;


-- Dumping structure for table croogo.links
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `parent_id` int(20) DEFAULT NULL,
  `menu_id` int(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `visibility_roles` text COLLATE utf8_unicode_ci,
  `params` text COLLATE utf8_unicode_ci,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.links: ~12 rows (approximately)
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` (`id`, `parent_id`, `menu_id`, `title`, `class`, `description`, `link`, `target`, `rel`, `status`, `lft`, `rght`, `visibility_roles`, `params`, `updated`, `created`) VALUES
	(5, NULL, 4, 'About', 'about', '', 'plugin:nodes/controller:nodes/action:view/type:page/slug:about', '', '', 1, 3, 4, '', '', '2009-10-06 23:14:21', '2009-08-19 12:23:33'),
	(6, NULL, 4, 'Contact', 'contact', '', 'plugin:contacts/controller:contacts/action:view/contact', '', '', 1, 5, 6, '', '', '2009-10-06 23:14:45', '2009-08-19 12:34:56'),
	(7, NULL, 3, 'Home', 'home', '', '/', '', '', 1, 5, 6, '', '', '2016-01-04 23:33:10', '2009-09-06 21:32:54'),
	(8, NULL, 3, 'About', 'about', '', '/about', '', '', 1, 7, 10, '', '', '2009-09-12 03:45:53', '2009-09-06 21:34:57'),
	(9, 8, 3, 'Child link', 'child-link', '', '#', '', '', 0, 8, 9, '', '', '2009-10-06 23:13:06', '2009-09-12 03:52:23'),
	(10, NULL, 5, 'Site Admin', 'site-admin', '', '/admin', '', '', 1, 1, 2, '', '', '2009-09-12 06:34:09', '2009-09-12 06:34:09'),
	(11, NULL, 5, 'Log out', 'log-out', '', '/plugin:users/controller:users/action:logout', '', '', 1, 7, 8, '["1","2"]', '', '2009-09-12 06:35:22', '2009-09-12 06:34:41'),
	(12, NULL, 6, 'Swellendam Funeral Services', 'croogo', '', 'http://www.croogo.org', '', '', 1, 3, 4, '', '', '2009-09-12 23:31:59', '2009-09-12 23:31:59'),
	(14, NULL, 6, 'CakePHP', 'cakephp', '', 'http://www.cakephp.org', '', '', 0, 1, 2, '', '', '2016-01-05 08:51:52', '2009-09-12 23:38:43'),
	(15, NULL, 3, 'Contact', 'contact', '', '/plugin:contacts/controller:contacts/action:view/contact', '', '', 1, 11, 12, '', '', '2009-09-16 07:54:13', '2009-09-16 07:53:33'),
	(16, NULL, 5, 'Entries (RSS)', 'entries-rss', '', '/promoted.rss', '', '', 1, 3, 4, '', '', '2016-01-05 13:26:28', '2009-10-27 17:46:22'),
	(17, NULL, 5, 'Comments (RSS)', 'comments-rss', '', '/comments.rss', '', '', 0, 5, 6, '', '', '2016-01-05 09:51:12', '2009-10-27 17:46:54');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;


-- Dumping structure for table croogo.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idnumber` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `relationship_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `telnr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellnr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entrydate` date DEFAULT NULL,
  `waitingperiod` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linked_spouse` int(11) DEFAULT '0',
  `linked_dependants` int(11) DEFAULT '0',
  `coveramount` int(11) DEFAULT '0',
  `premium` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `status_id` int(11) DEFAULT '1',
  `WP` int(11) DEFAULT '0',
  `cover` double DEFAULT NULL,
  `monthlypremium` double DEFAULT NULL,
  `premiumbilled` double DEFAULT NULL,
  `account_status_id` int(11) DEFAULT NULL,
  `policyno` int(11) NOT NULL,
  `spouse_id` int(11) DEFAULT NULL,
  `dependant_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `updated` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.members: ~11 rows (approximately)
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` (`id`, `firstname`, `lastname`, `idnumber`, `member`, `dateofbirth`, `gender_id`, `category_id`, `relationship_id`, `address`, `telnr`, `cellnr`, `entrydate`, `waitingperiod`, `linked_spouse`, `linked_dependants`, `coveramount`, `premium`, `status`, `status_id`, `WP`, `cover`, `monthlypremium`, `premiumbilled`, `account_status_id`, `policyno`, `spouse_id`, `dependant_id`, `is_active`, `updated`, `created`) VALUES
	(1, 'Jades', 'Nash', '87153241627463', 'jade', '2016-01-05', 2, 1, NULL, NULL, '0287659901', '0786543245', '2016-01-05', '1', 0, 0, 5000, 2000, 1, 1, 0, 5000, 45, NULL, 1, 897, NULL, NULL, 1, '2016-01-05', NULL),
	(5, 'Ryan', 'Bestenbier', '82875663527563', 'ryan', '2016-01-05', 1, 2, NULL, 'Swellendam', '0213321451', '0767754311', '2016-02-05', '1', 0, 0, 5000, 2000, 1, 1, 1, 5000, 89, NULL, 1, 811, NULL, NULL, 1, '2016-01-07', NULL),
	(6, 'Carl', 'Brown', '8875676757654', NULL, '2016-01-08', 1, 2, NULL, '7 Hermes Avenue \r\nSaxon Sea\r\nAtlantis\r\n7349', '0211232156', '0867778902', '2016-07-08', NULL, 0, 0, 5000, 2000, 0, 2, 0, NULL, NULL, NULL, 1, 867, NULL, NULL, 1, '2016-01-08', '2016-01-08'),
	(8, 'Weaver', 'Makriga', '8164251154', NULL, NULL, 1, 2, NULL, '12 Swellendam', '0289887712', '0865254441', '2016-07-07', NULL, 0, 0, 5000, 1500, 0, 1, 0, NULL, NULL, NULL, 2, 833, NULL, NULL, 1, '2016-01-07', '2016-01-07'),
	(9, 'Eduan', 'Astle', '86176521525', NULL, NULL, 1, 2, NULL, '12 Brackenfell', '0782736365', '0786255541', '2016-07-08', NULL, 0, 0, 10000, 1000, 0, 1, 0, NULL, NULL, NULL, 2, 122, NULL, NULL, 1, '2016-01-08', '2016-01-08'),
	(10, 'Roger', 'Poole', '8817364632', NULL, NULL, 1, 1, NULL, '', '', '', '1970-07-01', NULL, 0, 0, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 1, 121, NULL, NULL, 1, '2016-01-07', '2016-01-07'),
	(11, 'Ryno', 'van Zyl', '82734726236', NULL, NULL, 1, 1, NULL, '', '', '', '2016-07-07', NULL, 0, 0, 12000, 200, 0, 1, 0, NULL, NULL, NULL, 1, 111, NULL, NULL, 1, '2016-01-07', '2016-01-07'),
	(12, 'Masi', 'Stoto', '827836712637', NULL, NULL, 1, 1, NULL, '', '', '', '1970-01-01', NULL, 0, 0, 20000, 300, 0, 1, 0, NULL, NULL, NULL, 2, 100, NULL, NULL, 1, '2016-01-07', '2016-01-07'),
	(13, 'Stratos', 'Skype', '82873623674', NULL, NULL, 1, 1, NULL, '', '', '', '2016-07-07', NULL, 0, 0, 1000, 500, 0, 1, 0, NULL, NULL, NULL, 1, 99, NULL, NULL, 1, '2016-01-07', '2016-01-07'),
	(15, 'Gerhardus', 'Fester', '8873672636', NULL, NULL, 1, 1, NULL, '', '', '', NULL, NULL, 0, 0, 9000, 2000, 0, 1, 0, NULL, NULL, NULL, 1, 762, NULL, NULL, 1, '2016-01-08', '2016-01-08'),
	(16, 'John', 'Doe', '82736764678', NULL, NULL, 1, 1, NULL, '', '', '', NULL, NULL, 0, 0, 7000, 1000, 0, 1, 0, NULL, NULL, NULL, 1, 982, NULL, NULL, 1, '2016-01-08', '2016-01-08');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;


-- Dumping structure for table croogo.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `weight` int(11) DEFAULT NULL,
  `link_count` int(11) NOT NULL,
  `params` text COLLATE utf8_unicode_ci,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.menus: ~4 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `title`, `alias`, `description`, `status`, `weight`, `link_count`, `params`, `updated`, `created`) VALUES
	(3, 'Main Menu', 'main', '', 1, NULL, 4, '', '2009-08-19 12:21:06', '2009-07-22 01:49:53'),
	(4, 'Footer', 'footer', '', 1, NULL, 2, '', '2009-08-19 12:22:42', '2009-08-19 12:22:42'),
	(5, 'Meta', 'meta', '', 1, NULL, 4, '', '2009-09-12 06:33:29', '2009-09-12 06:33:29'),
	(6, 'Blogroll', 'blogroll', '', 1, NULL, 2, '', '2009-09-12 23:30:24', '2009-09-12 23:30:24');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


-- Dumping structure for table croogo.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `message_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.messages: ~0 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


-- Dumping structure for table croogo.meta
CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Node',
  `foreign_key` int(20) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.meta: ~1 rows (approximately)
/*!40000 ALTER TABLE `meta` DISABLE KEYS */;
INSERT INTO `meta` (`id`, `model`, `foreign_key`, `key`, `value`, `weight`) VALUES
	(1, 'Node', 1, 'meta_keywords', 'key1, key2', NULL);
/*!40000 ALTER TABLE `meta` ENABLE KEYS */;


-- Dumping structure for table croogo.nodes
CREATE TABLE IF NOT EXISTS `nodes` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `parent_id` int(20) DEFAULT NULL,
  `user_id` int(20) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `mime_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_status` int(1) NOT NULL DEFAULT '1',
  `comment_count` int(11) DEFAULT '0',
  `promote` tinyint(1) NOT NULL DEFAULT '0',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms` text COLLATE utf8_unicode_ci,
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `visibility_roles` text COLLATE utf8_unicode_ci,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'node',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.nodes: ~3 rows (approximately)
/*!40000 ALTER TABLE `nodes` DISABLE KEYS */;
INSERT INTO `nodes` (`id`, `parent_id`, `user_id`, `title`, `slug`, `body`, `excerpt`, `status`, `mime_type`, `comment_status`, `comment_count`, `promote`, `path`, `terms`, `sticky`, `lft`, `rght`, `visibility_roles`, `type`, `updated`, `created`) VALUES
	(1, NULL, 1, 'Hello World', 'hello-world', '<p>Welcome to Croogo. This is your first post. You can edit or delete it from the admin panel.</p>\r\n', '', 0, '', 2, 2, 0, '/blog/hello-world', '{"1":"uncategorized"}', 0, 1, 2, '', 'blog', '2016-01-01 05:28:22', '2009-12-25 11:00:00'),
	(2, NULL, 1, 'About', 'about', '<p>Swellendam Funeral Services.</p>\r\n', '', 0, '', 0, 0, 0, '/about', '', 0, 1, 2, '', 'page', '2016-01-08 20:10:29', '2009-12-25 22:00:00'),
	(3, NULL, 0, 'Winter', 'Winter.jpg', '', NULL, 0, 'image/pjpeg', 1, 0, 0, '/uploads/Winter.jpg', NULL, 0, 1, 2, NULL, 'attachment', '2016-01-01 18:52:59', '2016-01-01 18:52:59');
/*!40000 ALTER TABLE `nodes` ENABLE KEYS */;


-- Dumping structure for table croogo.nodes_taxonomies
CREATE TABLE IF NOT EXISTS `nodes_taxonomies` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `node_id` int(20) NOT NULL DEFAULT '0',
  `taxonomy_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.nodes_taxonomies: ~1 rows (approximately)
/*!40000 ALTER TABLE `nodes_taxonomies` DISABLE KEYS */;
INSERT INTO `nodes_taxonomies` (`id`, `node_id`, `taxonomy_id`) VALUES
	(2, 1, 1);
/*!40000 ALTER TABLE `nodes_taxonomies` ENABLE KEYS */;


-- Dumping structure for table croogo.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount_received` double NOT NULL DEFAULT '0',
  `date_for` date DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`member_id`),
  CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.payments: ~5 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `amount_received`, `date_for`, `date_created`, `member_id`) VALUES
	(1, 15, '2016-01-05', '2016-01-05 20:25:34', 1),
	(2, 13, '2016-01-05', '2016-01-05 20:25:51', 1),
	(3, 15, '2016-01-05', '2016-01-05 20:26:31', 1),
	(4, 20, '2016-01-05', '2016-01-05 20:26:49', 1),
	(5, 20, '2016-01-05', '2016-01-05 20:27:09', 1);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;


-- Dumping structure for table croogo.regions
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `block_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.regions: ~14 rows (approximately)
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` (`id`, `title`, `alias`, `description`, `block_count`) VALUES
	(3, 'none', '', '', 0),
	(4, 'right', 'right', '', 2),
	(6, 'left', 'left', '', 0),
	(7, 'header', 'header', '', 0),
	(8, 'footer', 'footer', '', 0),
	(9, 'region1', 'region1', '', 0),
	(10, 'region2', 'region2', '', 0),
	(11, 'region3', 'region3', '', 0),
	(12, 'region4', 'region4', '', 0),
	(13, 'region5', 'region5', '', 0),
	(14, 'region6', 'region6', '', 0),
	(15, 'region7', 'region7', '', 0),
	(16, 'region8', 'region8', '', 0),
	(17, 'region9', 'region9', '', 0);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;


-- Dumping structure for table croogo.relationships
CREATE TABLE IF NOT EXISTS `relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.relationships: ~8 rows (approximately)
/*!40000 ALTER TABLE `relationships` DISABLE KEYS */;
INSERT INTO `relationships` (`id`, `title`, `updated`, `created`) VALUES
	(1, 'Child', '2016-01-05 00:54:58', '2016-01-05 00:55:00'),
	(2, 'Sister', '2016-01-05 00:55:19', '2016-01-05 00:55:17'),
	(3, 'Brother', '2016-01-05 00:55:35', '2016-01-05 00:55:33'),
	(4, 'Mother', '2016-01-05 00:55:55', '2016-01-05 00:55:53'),
	(5, 'Father', '2016-01-05 00:56:32', '2016-01-05 00:56:30'),
	(6, 'Other', '2016-01-05 00:56:35', '2016-01-05 00:56:33'),
	(7, 'Wife', '2016-01-07 15:13:01', '2016-01-07 15:12:59'),
	(8, 'Husband', '2016-01-07 15:13:25', '2016-01-07 15:13:23');
/*!40000 ALTER TABLE `relationships` ENABLE KEYS */;


-- Dumping structure for table croogo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `title`, `alias`, `created`, `updated`) VALUES
	(1, 'Admin', 'admin', '2009-04-05 00:10:34', '2009-04-05 00:10:34'),
	(2, 'Registered', 'registered', '2009-04-05 00:10:50', '2009-04-06 05:20:38'),
	(3, 'Public', 'public', '2009-04-05 00:12:38', '2009-04-07 01:41:45');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table croogo.roles_users
CREATE TABLE IF NOT EXISTS `roles_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `granted_by` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_roles_users` (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.roles_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_users` ENABLE KEYS */;


-- Dumping structure for table croogo.schema_migrations
CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.schema_migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `schema_migrations` DISABLE KEYS */;
INSERT INTO `schema_migrations` (`id`, `class`, `type`, `created`) VALUES
	(1, 'InitMigrations', 'Migrations', '2015-12-31 05:53:37'),
	(2, 'ConvertVersionToClassNames', 'Migrations', '2015-12-31 05:53:37'),
	(3, 'IncreaseClassNameLength', 'Migrations', '2015-12-31 05:53:37');
/*!40000 ALTER TABLE `schema_migrations` ENABLE KEYS */;


-- Dumping structure for table croogo.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'text',
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `weight` int(11) DEFAULT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.settings: ~30 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `key`, `value`, `title`, `description`, `input_type`, `editable`, `weight`, `params`) VALUES
	(6, 'Site.title', 'Swellendam Funeral Services', '', '', '', 1, 1, ''),
	(7, 'Site.tagline', 'SFS Customer Relationship Management System.', '', '', 'textarea', 1, 2, ''),
	(8, 'Site.email', 'you@your-site.com', '', '', '', 1, 3, ''),
	(9, 'Site.status', '1', '', '', 'checkbox', 1, 6, ''),
	(12, 'Meta.robots', 'index, follow', '', '', '', 1, 6, ''),
	(13, 'Meta.keywords', 'croogo, Croogo', '', '', 'textarea', 1, 7, ''),
	(14, 'Meta.description', 'Swellendam Funeral Services - Customer Relationship Management System', '', '', 'textarea', 1, 8, ''),
	(15, 'Meta.generator', 'Swellendam Funeral Services - CRM System', '', '', '', 0, 9, ''),
	(16, 'Service.akismet_key', 'your-key', '', '', '', 1, 11, ''),
	(17, 'Service.recaptcha_public_key', 'your-public-key', '', '', '', 1, 12, ''),
	(18, 'Service.recaptcha_private_key', 'your-private-key', '', '', '', 1, 13, ''),
	(19, 'Service.akismet_url', 'http://your-blog.com', '', '', '', 1, 10, ''),
	(20, 'Site.theme', '', '', '', '', 0, 14, ''),
	(21, 'Site.feed_url', '', '', '', '', 0, 15, ''),
	(22, 'Reading.nodes_per_page', '5', '', '', '', 1, 16, ''),
	(23, 'Writing.wysiwyg', '1', 'Enable WYSIWYG editor', '', 'checkbox', 1, 17, ''),
	(24, 'Comment.level', '1', '', 'levels deep (threaded comments)', '', 1, 18, ''),
	(25, 'Comment.feed_limit', '10', '', 'number of comments to show in feed', '', 1, 19, ''),
	(26, 'Site.locale', 'eng', '', '', 'text', 0, 20, ''),
	(27, 'Reading.date_time_format', 'D, M d Y H:i:s', '', '', '', 1, 21, ''),
	(28, 'Comment.date_time_format', 'M d, Y', '', '', '', 1, 22, ''),
	(29, 'Site.timezone', '0', '', 'zero (0) for GMT', '', 1, 4, ''),
	(32, 'Hook.bootstraps', 'Settings,Comments,Contacts,Nodes,Meta,Menus,Users,Blocks,Taxonomy,FileManager,Wysiwyg,Ckeditor', '', '', '', 0, 23, ''),
	(33, 'Comment.email_notification', '1', 'Enable email notification', '', '', 1, 24, ''),
	(34, 'Access Control.multiColumn', '0', 'Allow login by username or email', '', 'checkbox', 1, 25, ''),
	(35, 'Access Control.rowLevel', '0', 'Row Level Access Control', '', 'checkbox', 1, 26, ''),
	(36, 'Access Control.autoLoginDuration', '+1 week', '"Remember Me" Duration', 'Eg: +1 day, +1 week. Leave empty to disable.', 'text', 1, 27, ''),
	(37, 'Access Control.models', '', 'Models with Row Level Acl', 'Select models to activate Row Level Access Control on', 'multiple', 1, 28, 'multiple=checkbox\r\noptions={"Nodes.Node": "Node", "Blocks.Block": "Block", "Menus.Menu": "Menu", "Menus.Link": "Link"}'),
	(38, 'Croogo.version', '1.5.8', '', '', '', 0, 29, ''),
	(39, 'Croogo.installed', '1', '', '', '', 0, 30, '');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table croogo.spouses
CREATE TABLE IF NOT EXISTS `spouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idnumber` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `telnr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellnr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waitingperiod` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.spouses: ~2 rows (approximately)
/*!40000 ALTER TABLE `spouses` DISABLE KEYS */;
INSERT INTO `spouses` (`id`, `firstname`, `lastname`, `idnumber`, `dateofbirth`, `gender_id`, `address`, `telnr`, `cellnr`, `position`, `waitingperiod`, `member_id`, `relationship_id`, `status_id`, `updated`, `created`) VALUES
	(1, 'Dave', 'Cope', '98362485263', '2016-01-05', 2, '', '0287663152', '078673627132', NULL, '1', 9, 7, 1, '2016-01-08 19:53:09', '2016-01-07 12:21:27'),
	(2, 'Paul', 'Day', '8837461276', '2016-01-07', 1, NULL, '0219877271', '0876524412', NULL, '1', 5, 7, 0, '2016-01-07 12:21:30', '2016-01-07 12:21:25');
/*!40000 ALTER TABLE `spouses` ENABLE KEYS */;


-- Dumping structure for table croogo.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updates` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.statuses: ~2 rows (approximately)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `title`, `alias`, `updates`, `created`) VALUES
	(1, 'Active', 'active', '2016-01-07 03:52:38', '2016-01-07 03:52:36'),
	(2, 'Inactive', 'inactive', '2016-01-07 03:52:56', '2016-01-07 03:52:55');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;


-- Dumping structure for table croogo.taxonomies
CREATE TABLE IF NOT EXISTS `taxonomies` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `parent_id` int(20) DEFAULT NULL,
  `term_id` int(10) NOT NULL,
  `vocabulary_id` int(10) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.taxonomies: ~3 rows (approximately)
/*!40000 ALTER TABLE `taxonomies` DISABLE KEYS */;
INSERT INTO `taxonomies` (`id`, `parent_id`, `term_id`, `vocabulary_id`, `lft`, `rght`) VALUES
	(1, NULL, 1, 1, 1, 2),
	(2, NULL, 2, 1, 3, 4),
	(3, NULL, 3, 2, 1, 2);
/*!40000 ALTER TABLE `taxonomies` ENABLE KEYS */;


-- Dumping structure for table croogo.terms
CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.terms: ~3 rows (approximately)
/*!40000 ALTER TABLE `terms` DISABLE KEYS */;
INSERT INTO `terms` (`id`, `title`, `slug`, `description`, `updated`, `created`) VALUES
	(1, 'Uncategorized', 'uncategorized', '', '2009-07-22 03:38:43', '2009-07-22 03:34:56'),
	(2, 'Announcements', 'announcements', '', '2010-05-16 23:57:06', '2009-07-22 03:45:37'),
	(3, 'mytag', 'mytag', '', '2009-08-26 14:42:43', '2009-08-26 14:42:43');
/*!40000 ALTER TABLE `terms` ENABLE KEYS */;


-- Dumping structure for table croogo.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `format_show_author` tinyint(1) NOT NULL DEFAULT '1',
  `format_show_date` tinyint(1) NOT NULL DEFAULT '1',
  `comment_status` int(1) NOT NULL DEFAULT '1',
  `comment_approve` tinyint(1) NOT NULL DEFAULT '1',
  `comment_spam_protection` tinyint(1) NOT NULL DEFAULT '0',
  `comment_captcha` tinyint(1) NOT NULL DEFAULT '0',
  `params` text COLLATE utf8_unicode_ci,
  `plugin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.types: ~3 rows (approximately)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `title`, `alias`, `description`, `format_show_author`, `format_show_date`, `comment_status`, `comment_approve`, `comment_spam_protection`, `comment_captcha`, `params`, `plugin`, `updated`, `created`) VALUES
	(1, 'Page', 'page', 'A page is a simple method for creating and displaying information that rarely changes, such as an "About us" section of a website. By default, a page entry does not allow visitor comments.', 0, 0, 0, 1, 0, 0, '', '', '2009-09-09 00:23:24', '2009-09-02 18:06:27'),
	(2, 'Blog', 'blog', 'A blog entry is a single post to an online journal, or blog.', 1, 1, 2, 1, 0, 0, '', '', '2009-09-15 12:15:43', '2009-09-02 18:20:44'),
	(4, 'Node', 'node', 'Default content type.', 1, 1, 2, 1, 0, 0, '', '', '2009-10-06 21:53:15', '2009-09-05 23:51:56');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;


-- Dumping structure for table croogo.types_vocabularies
CREATE TABLE IF NOT EXISTS `types_vocabularies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `vocabulary_id` int(10) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.types_vocabularies: ~4 rows (approximately)
/*!40000 ALTER TABLE `types_vocabularies` DISABLE KEYS */;
INSERT INTO `types_vocabularies` (`id`, `type_id`, `vocabulary_id`, `weight`) VALUES
	(24, 4, 1, NULL),
	(25, 4, 2, NULL),
	(30, 2, 1, NULL),
	(31, 2, 2, NULL);
/*!40000 ALTER TABLE `types_vocabularies` ENABLE KEYS */;


-- Dumping structure for table croogo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation_key` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `name`, `email`, `website`, `activation_key`, `image`, `bio`, `timezone`, `status`, `updated`, `created`) VALUES
	(1, 1, 'admin', '', 'admin', 'admin@email.com', 'website.co.za', '67e86e33d4618e804a463e77652d291b', NULL, NULL, '0', 1, '2016-01-05 12:35:48', '0000-00-00 00:00:00'),
	(2, 1, 'admin1', 'd8ca2505e7f1590d0e86ee445b1e9a41b8f8ec03', 'admin1', '', NULL, '30e83dfe94e74829a43ae813ef2383a3', NULL, NULL, '0', 1, '2015-12-31 05:54:29', '2015-12-31 05:54:29'),
	(3, 2, 'linsay', '', 'Linsay', 'linsay@gmail.com', 'mywebsite.co.za', '95ddaa892ce79f79b9511025c6a17cfa', NULL, NULL, '0', 0, '2015-12-31 15:42:01', '2015-12-31 15:42:01'),
	(4, 2, 'eathan', '', 'Eathan', 'eathan@gmail.com', 'mywebsite.co.za', '5c8c01dcbbdd61a494a56dcbcff61491', NULL, NULL, '0', 0, '2015-12-31 15:45:56', '2015-12-31 15:45:56'),
	(5, 2, 'justin', '', 'Justin', 'justin@gmail.com', 'website.co.za', '96db45333de0516ef1afbddc36c1187f', NULL, NULL, '0', 0, '2015-12-31 15:47:13', '2015-12-31 15:47:13'),
	(6, 2, 'ricardo', '', 'Ricardo', 'ricardo@gmail.com', 'website.co.za', 'e78b414a46cf7c3508561cb35a85e3d5', NULL, NULL, '0', 0, '2015-12-31 15:47:54', '2015-12-31 15:47:54'),
	(7, 2, 'shirod', '', 'Shirod', 'shirod@gmail.com', 'website.co.za', '289cab7b994b402f5e41851511a850f4', NULL, NULL, '0', 0, '2015-12-31 16:08:33', '2015-12-31 16:08:33'),
	(8, 1, 'roystan', '036b8720b237f254e026aa03f978008fa32f0534', 'roystan', '', NULL, '138075d38ec22869e010a933fec6539c', NULL, NULL, '0', 1, '2015-12-31 17:27:08', '2015-12-31 17:27:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table croogo.vocabularies
CREATE TABLE IF NOT EXISTS `vocabularies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `multiple` tinyint(1) NOT NULL DEFAULT '0',
  `tags` tinyint(1) NOT NULL DEFAULT '0',
  `plugin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table croogo.vocabularies: ~2 rows (approximately)
/*!40000 ALTER TABLE `vocabularies` DISABLE KEYS */;
INSERT INTO `vocabularies` (`id`, `title`, `alias`, `description`, `required`, `multiple`, `tags`, `plugin`, `weight`, `updated`, `created`) VALUES
	(1, 'Categories', 'categories', '', 0, 1, 0, '', 1, '2010-05-17 20:03:11', '2009-07-22 02:16:21'),
	(2, 'Tags', 'tags', '', 0, 1, 0, '', 2, '2010-05-17 20:03:11', '2009-07-22 02:16:34');
/*!40000 ALTER TABLE `vocabularies` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
