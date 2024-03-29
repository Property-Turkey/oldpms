-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 10:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `ptpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_name` varchar(255) NOT NULL,
  `category_params` varchar(255) NOT NULL DEFAULT '{"icon":"", "link":"", "isProtected":"0"}',
  `category_priority` tinyint(4) NOT NULL DEFAULT 99,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `language_id`, `parent_id`, `category_name`, `category_params`, `category_priority`, `rec_state`) VALUES
(1, 0, 0, 'projects features categories', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"1\"}', 99, 1),
(2, 0, 0, 'properties features categories', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"1\"}', 99, 1),
(3, 0, 0, 'projects specs categories', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"1\"}', 99, 1),
(4, 0, 0, 'properties specs categories', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"1\"}', 99, 1),
(5, 0, 0, 'projects types categories', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"1\"}', 99, 1),
(6, 0, 0, 'properties types categories', '{\"icon\":\"\", \"link\":\"\", \"isProtected\":\"1\"}', 99, 1),
(7, 0, 6, 'apartment', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(8, 0, 6, 'penthouse', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(9, 0, 6, 'villa', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(10, 0, 6, 'land', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(11, 0, 6, 'shop', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(12, 0, 6, 'office space', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(13, 0, 6, 'hotel', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(14, 0, 6, 'other commercial', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(15, 0, 3, 'param_rooms', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(16, 0, 3, 'param_buildage', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(17, 0, 3, 'param_floors', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(18, 0, 3, 'param_floor', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(19, 0, 3, 'param_heat', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(20, 0, 3, 'param_bathrooms', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(21, 0, 3, 'param_balconies', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(22, 0, 3, 'param_isfurnitured', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(23, 0, 3, 'param_usestatus', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(24, 0, 3, 'param_monthlytax', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(25, 0, 3, 'param_payment', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(26, 0, 3, 'param_ownership', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(27, 0, 3, 'param_ownertype', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(28, 0, 3, 'param_deposit', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(31, 0, 25, 'upfront', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(32, 0, 25, 'nimum_down_payment_prcntg', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(33, 0, 25, 'installment_months_commision', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(34, 0, 25, 'commission', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(35, 0, 25, 'net_plus_structure', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(36, 0, 25, 'net_by_seller', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(37, 0, 23, 'zero', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1),
(38, 0, 0, 'tanent-', '{\"icon\":\"\",\"link\":\"\",\"isProtected\":\"0\"}', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `config_value` text DEFAULT NULL,
  `stat_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `config_key`, `config_value`, `stat_updated`) VALUES
(1, 'TRY_USD', '0.054', '2022-12-14 07:49:09'),
(2, 'EUR_USD', '1.062', '2022-12-14 07:49:09'),
(3, 'GBP_USD', '1.235', '2022-12-14 07:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `crm_clients`
--

CREATE TABLE `crm_clients` (
  `id` int(11) NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `crm_leads`
--

CREATE TABLE `crm_leads` (
  `id` int(11) NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crm_leads`
--

INSERT INTO `crm_leads` (`id`, `rec_state`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crm_reports`
--

CREATE TABLE `crm_reports` (
  `id` int(11) NOT NULL,
  `rec_state` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `dev_name` varchar(255) NOT NULL,
  `dev_configs` varchar(255) DEFAULT '{"phone":"", "email":"", "mobile":"", "address":""}',
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL COMMENT 'proj|prop id',
  `tar_tbl` tinyint(4) NOT NULL COMMENT '1=prop, 2=proj',
  `doc_name` varchar(255) NOT NULL,
  `doc_desc` varchar(255) DEFAULT NULL,
  `doc_allowed_roles` varchar(255) DEFAULT 'admin.callcenter,admin.portfolio,admin.supervisor',
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `floorplans`
--

CREATE TABLE `floorplans` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `floorplan_name` varchar(255) NOT NULL,
  `floorplan_minsize` smallint(6) DEFAULT NULL,
  `floorplan_maxsize` smallint(6) DEFAULT NULL,
  `floorplan_minprice` int(11) DEFAULT NULL,
  `floorplan_maxprice` int(11) DEFAULT NULL,
  `floorplan_photo` varchar(255) DEFAULT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL,
  `tbl_tar` tinyint(4) NOT NULL COMMENT '1=properties, 2=proposals',
  `history_price` int(255) DEFAULT NULL,
  `history_country` varchar(255) DEFAULT NULL,
  `history_ip` varchar(255) DEFAULT NULL,
  `history_lang` varchar(255) DEFAULT NULL,
  `stat_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `log_url` varchar(255) NOT NULL,
  `log_changes` mediumtext DEFAULT NULL COMMENT 'contains dirty  columns, before and after',
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `rec_state` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=unread, 2=read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `message_to` varchar(255) DEFAULT NULL,
  `message_subject` varchar(255) DEFAULT NULL,
  `message_text` text NOT NULL,
  `message_priority` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=normal, 2=warning, 3=urgent',
  `stat_created` datetime DEFAULT current_timestamp(),
  `rec_state` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=new, 2=read 	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `office_desc` varchar(255) DEFAULT NULL,
  `office_configs` varchar(255) DEFAULT '{"phone":"", "email":"", "mobile":""}' COMMENT '{"phone":"", "email":"", "mobile":""} ',
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office_name`, `office_desc`, `office_configs`, `stat_created`, `rec_state`) VALUES
(1, 'Bodrum office', '', NULL, '2022-03-29 13:56:01', 0),
(3, 'Sisli office', 'Office No # 3', NULL, '2022-04-06 13:27:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `profile_fullname` varchar(255) NOT NULL,
  `profile_job` varchar(255) NOT NULL,
  `profile_logo` varchar(255) NOT NULL,
  `profile_photos` varchar(255) NOT NULL,
  `profile_desc` text NOT NULL,
  `profile_contacts` varchar(255) NOT NULL DEFAULT '{mob":"", "phone":"", "email":""}',
  `profile_address` varchar(255) NOT NULL DEFAULT '{"country":"", "city":"", "area":"", "dist":"","str":"", "bld":"", "no":""}',
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `developer_id` int(11) DEFAULT 0,
  `seller_id` int(11) DEFAULT 0,
  `features_ids` varchar(255) DEFAULT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_desc` text DEFAULT NULL,
  `project_photos` text DEFAULT NULL,
  `project_videos` text DEFAULT NULL,
  `project_loc` varchar(255) DEFAULT NULL,
  `project_ref` varchar(255) DEFAULT NULL,
  `project_currency` tinyint(4) DEFAULT 3 COMMENT '1=Sterling Pound, 2=Euro, 3=Dollar, 4=Turkish lira ',
  `adrs_country` varchar(255) DEFAULT NULL,
  `adrs_city` varchar(255) DEFAULT NULL,
  `adrs_region` varchar(255) DEFAULT NULL,
  `adrs_district` varchar(255) DEFAULT NULL,
  `adrs_street` varchar(255) DEFAULT NULL,
  `param_space` mediumint(9) DEFAULT NULL COMMENT 'input',
  `param_delivertype` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_deliverdate` date DEFAULT NULL COMMENT 'date',
  `param_totalunits` mediumint(9) DEFAULT NULL COMMENT 'input',
  `param_blocks` mediumint(9) DEFAULT NULL COMMENT 'input',
  `param_bldfloors` mediumint(9) DEFAULT NULL COMMENT 'input',
  `param_iscitizenship` tinyint(4) DEFAULT NULL COMMENT 'checkbox',
  `param_isresidence` tinyint(4) DEFAULT NULL COMMENT 'checkbox',
  `param_residential_units` mediumint(9) DEFAULT NULL COMMENT 'input',
  `param_commercial_units` mediumint(9) DEFAULT NULL COMMENT 'input',
  `param_unit_types` varchar(255) DEFAULT NULL COMMENT 'multiple ids EX: 588,888,etc',
  `param_units_size_range` varchar(255) DEFAULT NULL COMMENT 'range size EX: 120,220 m2',
  `param_downpayment` tinyint(4) DEFAULT NULL COMMENT 'select 5-100',
  `param_installment` tinyint(4) DEFAULT NULL COMMENT 'select 0-95',
  `param_installment_months` tinyint(4) DEFAULT NULL COMMENT 'select 1-75',
  `seo_title` varchar(255) NOT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `seo_desc` varchar(255) DEFAULT NULL,
  `stat_created` datetime NOT NULL,
  `stat_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `stat_views` int(11) NOT NULL DEFAULT 0,
  `stat_shares` int(11) NOT NULL DEFAULT 0,
  `rec_state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL DEFAULT 100,
  `user_id` int(11) DEFAULT 0,
  `developer_id` int(11) DEFAULT 0,
  `project_id` int(11) DEFAULT 0,
  `seller_id` int(11) DEFAULT 0,
  `features_ids` varchar(255) DEFAULT NULL,
  `property_title` varchar(255) NOT NULL,
  `property_desc` text DEFAULT NULL,
  `property_photos` text DEFAULT NULL,
  `property_videos` text DEFAULT NULL,
  `property_price` int(11) DEFAULT NULL,
  `property_oldprice` int(11) DEFAULT NULL,
  `property_currency` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1=Sterling Pound, 2=Euro, 3=Dollar, 4=Turkish lira',
  `property_loc` varchar(255) DEFAULT NULL,
  `property_ref` varchar(255) DEFAULT NULL,
  `property_usp` varchar(255) DEFAULT NULL COMMENT ' Unique Sell Points ',
  `property_isfeatured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=normal, 1=at top of the list, 2=in landingpages',
  `property_isindexed` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'this for google index, noindex - 0-noindex, 1=index',
  `adrs_country` varchar(255) DEFAULT NULL,
  `adrs_city` varchar(255) DEFAULT NULL,
  `adrs_region` varchar(255) DEFAULT NULL,
  `adrs_district` varchar(255) DEFAULT NULL,
  `adrs_street` varchar(255) DEFAULT NULL,
  `adrs_block` varchar(255) DEFAULT NULL,
  `adrs_no` varchar(255) DEFAULT NULL,
  `param_netspace` int(11) DEFAULT NULL COMMENT 'input',
  `param_grossspace` int(11) DEFAULT NULL COMMENT 'input',
  `param_rooms` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_bedrooms` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_buildage` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_floors` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_floor` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_heat` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_bathrooms` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_balconies` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_isfurnitured` tinyint(4) DEFAULT NULL COMMENT 'checkbox',
  `param_isresale` tinyint(4) DEFAULT NULL COMMENT 'checkbox',
  `param_iscitizenship` tinyint(4) DEFAULT NULL COMMENT 'checkbox',
  `param_isresidence` tinyint(4) DEFAULT NULL COMMENT 'checkbox',
  `param_iscommission_included` tinyint(4) DEFAULT NULL COMMENT 'checkbox',
  `param_ispublished` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not show in the website, 1=show in the website',
  `param_titledeed` int(11) DEFAULT NULL COMMENT 'input',
  `param_usestatus` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_monthlytax` int(11) DEFAULT NULL COMMENT 'input',
  `param_payment` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_ownership` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_ownertype` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_deposit` int(11) DEFAULT NULL COMMENT 'input',
  `param_delivertype` smallint(6) DEFAULT NULL COMMENT 'select',
  `param_deliverdate` date DEFAULT NULL COMMENT 'data yyyy/mm',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `seo_desc` varchar(255) DEFAULT NULL,
  `stat_created` datetime NOT NULL,
  `stat_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `stat_views` int(11) NOT NULL DEFAULT 0,
  `stat_shares` int(11) NOT NULL DEFAULT 0,
  `rec_state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL,
  `tar_tbl` tinyint(4) NOT NULL COMMENT '1=prop, 2=proposal',
  `proposal_title` varchar(255) NOT NULL,
  `proposal_desc` mediumtext DEFAULT NULL,
  `proposal_configs` varchar(255) DEFAULT '{"floorplan_id":""}' COMMENT '{"floorplan_id":""}',
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `searchlogs`
--

CREATE TABLE `searchlogs` (
  `id` int(11) NOT NULL,
  `search_val` varchar(255) DEFAULT NULL COMMENT 'may contains keyword , address, category id or number range',
  `search_group` varchar(255) NOT NULL COMMENT '1=language, 2=price, 3=keyword, 4=address, 5=specs, 6=features, 7=netspace, 8=grossspace, 9=monthlytax, 10=deposit',
  `search_ctrl` tinyint(4) DEFAULT 1 COMMENT '1=properties, 2=projects',
  `stat_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `seller_type` int(11) NOT NULL,
  `seller_nationality` int(11) DEFAULT NULL,
  `seller_photos` varchar(255) DEFAULT NULL,
  `seller_configs` varchar(510) DEFAULT '{"mngr":{"fullname":"", "phone":"", "email":"", "mobile":""} , "slr":{"fullname":"", "phone":"", "email":"", "mobile":""}}',
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `rec_state` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `office_id` int(11) DEFAULT 0,
  `user_fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) DEFAULT NULL COMMENT 'admin.admin, admin.portfolio, admin.supervisor, admin.callcenter, admin.content, user.portfolio, user.agency, user.client, user.developer',
  `user_token` varchar(255) DEFAULT NULL,
  `user_configs` varchar(255) DEFAULT '{"mobile":"", "address":""}' COMMENT '{"mobile":"", "address":""}',
  `stat_lastlogin` datetime DEFAULT NULL,
  `stat_created` datetime DEFAULT NULL,
  `stat_logins` int(11) NOT NULL DEFAULT 0,
  `stat_ip` varchar(255) DEFAULT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `office_id`, `user_fullname`, `email`, `password`, `user_role`, `user_token`, `user_configs`, `stat_lastlogin`, `stat_created`, `stat_logins`, `stat_ip`, `rec_state`) VALUES
(2, 3, 'Osama', 'root@gmail.com', '$2y$10$Sz9u1Zjr.Rnzir1bWb6cUOopPNY2Hy1bicTGWrzSMzgYRZNl9kKJu', 'admin.root', 'sN0UzrpzWwIZFQfofJqGiewh37WsYAIX', '{\"phone\":\"\",\"email\":\"\",\"mobile\":\"05346346346\",\"address\":\"Pamuk Cik Hurryit\"}', '2023-05-22 13:45:11', '2022-03-03 13:22:55', 644, '127.0.0.1', 1),
(8, 0, 'Sabina', 'sabina@propertyturkey.com', '$2y$10$UWFdik2tUdDcObJYV6ulU.n855hrEvHBsG9PtkJbB5gaty9kl9mO2', 'admin.supervisor', NULL, '{\"phone\":\"\", \"email\":\"\", \"mobile\":\"\"}', '2022-10-21 12:20:33', NULL, 29, NULL, 1),
(9, 0, 'Sales advisor', 'seller@gmail.com', '$2y$10$TX9/aYMqwuqFaXNTqyoBw.POCUKHGP4LMiY7EFNA/duAUUcbxY0Q2', 'admin.callcenter', NULL, '{\"phone\":\"\", \"email\":\"\", \"mobile\":\"\"}', '2022-12-19 13:15:50', NULL, 2, NULL, 1),
(11, 3, 'Cameron', 'cameron@gmail.com', '$2y$10$jVydDAroHOMkwoN3S2A1r.2LtkFsFXoCFQyltuWC3kqdx6AS5dikC', 'admin.admin', NULL, '{\"phone\":\"\",\"email\":\"\",\"mobile\":\"\"}', '2022-12-27 10:50:29', NULL, 7, NULL, 1),
(14, 3, 'Betol', 'betul.r@propertyturkey.com', '$2y$10$N8YcaDkwf2wjkcY8CEW8JeKdJYl2BrJBSo5ywz3Su/3a7loiP1xRq', 'admin.portfolio', NULL, '{\"phone\":\"\", \"email\":\"\", \"mobile\":\"\"}', '2022-09-30 09:59:08', NULL, 51, NULL, 0),
(15, 3, 'Lina Sakizci', 'lina@propertyturkey.com', '$2y$10$o3q9ief/5GVhRTyAJXD.C.jtBCL7UvNxcLA53MEp/fXH4Gy2/RqAW', 'admin.callcenter', NULL, '{\"phone\":\"\", \"email\":\"\", \"mobile\":\"\"}', '2022-12-08 10:55:28', '2022-10-10 09:04:12', 29, NULL, 1),
(16, 3, 'Suleyman Erol', 'suleyman@propertyturkey.com', '$2y$10$G0P7s5IhiBou2mzgpN4SV.syNN17uzJbPVHmvbpIpXAx2r3wEIHoO', 'admin.portfolio', NULL, '{\"phone\":\"\",\"email\":\"\",\"mobile\":\"98798789789\",\"address\":\"lkjg jhg jkhkjhg\"}', '2023-05-05 10:20:09', '2022-10-10 09:10:31', 33, NULL, 1),
(17, 3, 'Muhammad', 'muhammad@propertyturkey.com', '$2y$10$rYjrR0/e0Tf3ZBiLwyNj7OL9a2vTPrnCXjY5OCBgbj5u5Q1UM/Wwq', 'admin.root', NULL, '{\"address\":\"cvbzcxzcxvczxvzcx\",\"mobile\":\"423423423423\"}', '2022-10-24 14:30:49', '2022-10-20 14:11:35', 7, NULL, 1),
(39, 3, 'ricky', 'ricky@gmail.com', '$2y$10$WM7EdueWkAzuv1/Z8PMl.uK4vEFxVH1bQCrfgnpQlRixWjoCllGqq', 'admin.content', NULL, '{\"mobile\":\"123123123\",\"address\":\"123123123\"}', '2023-03-23 10:56:34', '2023-02-16 12:46:49', 7, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `stat_created` datetime NOT NULL DEFAULT current_timestamp(),
  `rec_state` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=new, 2=read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=assigned, 2=published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`id`, `user_id`, `project_id`, `stat_created`, `rec_state`) VALUES
(1, 39, 66, '2023-02-16 14:07:36', 1),
(2, 39, 67, '2023-02-16 14:07:36', 2),
(3, 39, 68, '2023-02-16 14:07:36', 2),
(9, 39, 64, '2023-02-16 14:42:53', 1),
(10, 39, 65, '2023-02-16 14:42:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_property`
--

CREATE TABLE `user_property` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `stat_created` datetime NOT NULL,
  `rec_state` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=assigned, 2=published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_property`
--

INSERT INTO `user_property` (`id`, `user_id`, `property_id`, `stat_created`, `rec_state`) VALUES
(1, 39, 144, '2023-02-17 09:42:07', 2),
(2, 39, 145, '2023-02-17 09:42:07', 2),
(4, 39, 143, '2023-02-17 09:50:31', 2),
(5, 39, 142, '2023-02-17 10:25:37', 1),
(6, 39, 127, '2023-02-17 10:25:59', 1),
(7, 39, 125, '2023-02-17 10:26:27', 2),
(8, 39, 121, '2023-02-17 13:22:56', 1),
(9, 39, 111, '2023-02-17 13:53:11', 1),
(10, 39, 112, '2023-02-17 13:53:11', 1),
(11, 39, 113, '2023-02-17 13:53:11', 1),
(12, 39, 114, '2023-02-17 13:53:11', 1),
(13, 39, 115, '2023-02-17 13:53:11', 1),
(14, 39, 117, '2023-02-17 13:53:11', 1),
(15, 39, 119, '2023-02-17 13:53:11', 1),
(16, 39, 120, '2023-02-17 13:53:11', 1),
(17, 39, 122, '2023-02-17 13:53:11', 2),
(18, 39, 124, '2023-02-17 13:53:11', 1),
(19, 39, 139, '2023-02-17 13:53:11', 1),
(20, 39, 140, '2023-02-17 13:53:11', 1),
(21, 39, 141, '2023-02-17 13:53:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_clients`
--
ALTER TABLE `crm_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_leads`
--
ALTER TABLE `crm_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_reports`
--
ALTER TABLE `crm_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floorplans`
--
ALTER TABLE `floorplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `language_id_2` (`language_id`,`rec_state`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchlogs`
--
ALTER TABLE `searchlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `property_id` (`project_id`),
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Indexes for table `user_property`
--
ALTER TABLE `user_property`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `property_id` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crm_clients`
--
ALTER TABLE `crm_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_leads`
--
ALTER TABLE `crm_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crm_reports`
--
ALTER TABLE `crm_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floorplans`
--
ALTER TABLE `floorplans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searchlogs`
--
ALTER TABLE `searchlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_property`
--
ALTER TABLE `user_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;
