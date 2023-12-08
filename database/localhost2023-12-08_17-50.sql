SET foreign_key_checks = 0;
#
# TABLE STRUCTURE FOR: ci_sessions
#

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('752idatm3bu1aa09mnt67ul2sm5sg49s', '::1', 1733639179, '__ci_last_regenerate|i:1733639179;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('s8eclvq32t7okv7399826165t1n37bir', '::1', 1733639210, '__ci_last_regenerate|i:1733639179;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('v1f5akbv6v6nufgg5kc3f08kufqrhn6u', '::1', 1733639694, '__ci_last_regenerate|i:1733639694;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('46h7rtseval2h48ghecptt72ifhcgmt8', '::1', 1733640094, '__ci_last_regenerate|i:1733640094;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5bhfmr13e4l6ec3apgojarp2ipn58t2v', '::1', 1733641160, '__ci_last_regenerate|i:1733641160;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ngu983m97umq3kvmadub8q7g52kpmpjm', '::1', 1733641555, '__ci_last_regenerate|i:1733641555;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('q4iq5l9cl3tii7jbffabro5qbgcsndu9', '::1', 1702025573, '__ci_last_regenerate|i:1702025573;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('l69d56ssg2f7at3kfdf0tmpq3s5jecmu', '::1', 1702026667, '__ci_last_regenerate|i:1702026667;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('r05bv5hkms13p6803hku72917aaljghn', '::1', 1702026969, '__ci_last_regenerate|i:1702026969;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('flav7mbf1kmp7jngvem74570casi6gs1', '::1', 1702027303, '__ci_last_regenerate|i:1702027303;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('48r0k54fst0ribok0ovd6v65ohc63ujs', '::1', 1702027992, '__ci_last_regenerate|i:1702027992;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pb3isug7ppego917l0omd6iv4ltcj0cu', '::1', 1702027646, '__ci_last_regenerate|i:1702027646;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('q8gk1p2rla3h8euq46uo551a6hhvam1p', '::1', 1702028335, '__ci_last_regenerate|i:1702028335;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pukrpih193gsb58ua061nfh0q979bcdg', '::1', 1702028735, '__ci_last_regenerate|i:1702028735;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('j8rtbt1od9alf51jnporv8fopugr0u0o', '::1', 1702029107, '__ci_last_regenerate|i:1702029107;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:15:\"Welcome Admin !\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('lnn8pkaq914v0uikvs6bvn206jr1prgs', '::1', 1702029443, '__ci_last_regenerate|i:1702029443;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:15:\"Welcome Admin !\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('smgbnd33g4n0k5e0nd75akgg5mtlu2g3', '::1', 1702030141, '__ci_last_regenerate|i:1702030141;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('h3lb6uc6g0h4oljcitl7iu2rqbvheu8s', '::1', 1702030793, '__ci_last_regenerate|i:1702030793;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:15:\"Welcome Admin !\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('k8fdajgoodurtbeulmrho2seajmg3o13', '::1', 1702032015, '__ci_last_regenerate|i:1702032015;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:15:\"Welcome Admin !\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3sh046591i70q5h4rnmp660340eb88aj', '::1', 1702031316, '__ci_last_regenerate|i:1702031316;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! units Updated Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ko4h7d2g86puphvsqmr86qi1s8mr4p93', '::1', 1702031651, '__ci_last_regenerate|i:1702031651;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:38:\"Success!! New Item Added Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"new\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('g32d4nge1ppqsd58pe9a0flhpah8tc6e', '::1', 1702031860, '__ci_last_regenerate|i:1702031651;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0vj3s1amiglrk4n4qgp3dg97f898gdn2', '::1', 1702032459, '__ci_last_regenerate|i:1702032459;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:38:\"Success!! New Item Added Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('h6qudqcv7b62a5novsgbk2ugimvu894n', '::1', 1702032640, '__ci_last_regenerate|i:1702032464;currency|s:3:\"₫\";currency_placement|s:5:\"Right\";currency_code|s:3:\"VND\";view_date|s:10:\"dd-mm-yyyy\";view_time|s:2:\"12\";inv_username|s:5:\"admin\";inv_userid|s:1:\"3\";logged_in|b:1;role_id|s:1:\"3\";role_name|s:10:\"Quản lý\";success|s:37:\"Success!! Sales Created Successfully!\";__ci_vars|a:1:{s:7:\"success\";s:3:\"old\";}language|s:7:\"Vietnam\";language_id|s:1:\"2\";');


#
# TABLE STRUCTURE FOR: db_brands
#

DROP TABLE IF EXISTS `db_brands`;

CREATE TABLE `db_brands` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `brand_code` varchar(50) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_category
#

DROP TABLE IF EXISTS `db_category`;

CREATE TABLE `db_category` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(50) DEFAULT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_category` (`id`, `category_code`, `category_name`, `description`, `company_id`, `status`) VALUES (7, 'CT0007', 'Giầy', '', NULL, 1);
INSERT INTO `db_category` (`id`, `category_code`, `category_name`, `description`, `company_id`, `status`) VALUES (8, 'CT0008', 'Quán Karaoke', '', NULL, 1);


#
# TABLE STRUCTURE FOR: db_category_item
#

DROP TABLE IF EXISTS `db_category_item`;

CREATE TABLE `db_category_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_item_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (2, 'sua gia tri', 1, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (24, 'abc', 1, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (27, 'them danh muc con moi', 1, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (28, 'danh muc con moi 2', 1, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (29, 'them danh muc con', 3, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (30, 'danh muc con 2', 3, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (31, 'Giầy Nam', 7, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (32, 'Giầy Nữ', 7, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (33, 'Món ăn', 8, '', 1);
INSERT INTO `db_category_item` (`id`, `category_item_name`, `category_id`, `description`, `status`) VALUES (34, 'Phòng hát', 8, '', 1);


#
# TABLE STRUCTURE FOR: db_cobpayments
#

DROP TABLE IF EXISTS `db_cobpayments`;

CREATE TABLE `db_cobpayments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `customer_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_company
#

DROP TABLE IF EXISTS `db_company`;

CREATE TABLE `db_company` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `company_code` varchar(150) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `company_website` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(250) DEFAULT NULL,
  `company_logo` text DEFAULT NULL,
  `logo` mediumtext DEFAULT NULL,
  `upi_id` varchar(50) DEFAULT NULL,
  `upi_code` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `show_signature` int(1) DEFAULT 0,
  `country` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `gst_no` varchar(50) DEFAULT NULL,
  `vat_no` varchar(50) DEFAULT NULL,
  `pan_no` varchar(50) DEFAULT NULL,
  `bank_details` mediumtext DEFAULT NULL,
  `cid` int(10) DEFAULT NULL,
  `category_init` varchar(5) DEFAULT NULL,
  `item_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `supplier_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `purchase_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `purchase_return_init` varchar(5) DEFAULT NULL,
  `customer_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `sales_init` varchar(5) DEFAULT NULL COMMENT 'INITAL CODE',
  `sales_return_init` varchar(5) DEFAULT NULL,
  `expense_init` varchar(5) DEFAULT NULL,
  `invoice_view` int(5) DEFAULT NULL COMMENT '1=Standard,2=Indian GST',
  `status` int(1) DEFAULT NULL,
  `sms_status` int(1) DEFAULT NULL COMMENT '1=Enable 0=Disable',
  `sales_terms_and_conditions` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_company` (`id`, `company_code`, `company_name`, `company_website`, `mobile`, `phone`, `email`, `website`, `company_logo`, `logo`, `upi_id`, `upi_code`, `signature`, `show_signature`, `country`, `state`, `city`, `address`, `postcode`, `gst_no`, `vat_no`, `pan_no`, `bank_details`, `cid`, `category_init`, `item_init`, `supplier_init`, `purchase_init`, `purchase_return_init`, `customer_init`, `sales_init`, `sales_return_init`, `expense_init`, `invoice_view`, `status`, `sms_status`, `sales_terms_and_conditions`) VALUES (1, '', 'RabitPos', NULL, '0987987991', '0999999999', 'cafe@gmail.com', '', 'localhost/company/1559022944_thumb.jpg', 'logo-0.png', '', '1566111586_thumb1.jpg', 'uploads/localhost/company/1559022862_thumb.jpg', 0, 'Việt Nam', 'Hà Nội', '', 'Số 1, Cầu Giấy, HN', '', '', '', '', 'ko co', 1, 'CT', 'IT', 'SP', 'PU', 'PR', 'CU', 'SL', 'PR', 'EX', 1, 1, 1, '');


#
# TABLE STRUCTURE FOR: db_country
#

DROP TABLE IF EXISTS `db_country`;

CREATE TABLE `db_country` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(10) DEFAULT NULL,
  `country` varchar(4050) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_country` (`id`, `country_code`, `country`, `added_on`, `company_id`, `status`) VALUES (3, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_country` (`id`, `country_code`, `country`, `added_on`, `company_id`, `status`) VALUES (4, NULL, 'Nước ngoài', NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: db_currency
#

DROP TABLE IF EXISTS `db_currency`;

CREATE TABLE `db_currency` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) DEFAULT NULL,
  `currency_code` varchar(20) DEFAULT NULL,
  `currency` blob DEFAULT NULL,
  `symbol` mediumtext DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_currency` (`id`, `currency_name`, `currency_code`, `currency`, `symbol`, `status`) VALUES (32, 'China - Chinese yuan (CNY)', NULL, '元 ', NULL, 1);
INSERT INTO `db_currency` (`id`, `currency_name`, `currency_code`, `currency`, `symbol`, `status`) VALUES (36, 'Japan - Japanese yen (JPY)', NULL, '¥', NULL, 1);
INSERT INTO `db_currency` (`id`, `currency_name`, `currency_code`, `currency`, `symbol`, `status`) VALUES (45, 'Vietnam - Vietnamese dong', 'VND', '₫', NULL, 1);
INSERT INTO `db_currency` (`id`, `currency_name`, `currency_code`, `currency`, `symbol`, `status`) VALUES (46, 'Bitcoin - BTC or XBT', 'BTC ', '₿', NULL, 1);
INSERT INTO `db_currency` (`id`, `currency_name`, `currency_code`, `currency`, `symbol`, `status`) VALUES (51, 'Euro', 'EUR', '€', NULL, 1);
INSERT INTO `db_currency` (`id`, `currency_name`, `currency_code`, `currency`, `symbol`, `status`) VALUES (53, 'US dollar', 'USD', '$', NULL, 1);


#
# TABLE STRUCTURE FOR: db_customer_payments
#

DROP TABLE IF EXISTS `db_customer_payments`;

CREATE TABLE `db_customer_payments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `salespayment_id` int(5) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` text DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `salespayment_id` (`salespayment_id`),
  CONSTRAINT `db_customer_payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `db_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_customer_payments_ibfk_2` FOREIGN KEY (`salespayment_id`) REFERENCES `db_salespayments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4955 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# TABLE STRUCTURE FOR: db_customers
#

DROP TABLE IF EXISTS `db_customers`;

CREATE TABLE `db_customers` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(20) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `tax_number` varchar(50) DEFAULT NULL,
  `vatin` varchar(100) DEFAULT NULL,
  `opening_balance` double(20,2) DEFAULT NULL,
  `sales_due` double(20,2) DEFAULT NULL,
  `sales_return_due` double(20,2) DEFAULT NULL,
  `country_id` varchar(50) DEFAULT NULL,
  `state_id` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(30) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_customers` (`id`, `customer_code`, `customer_name`, `mobile`, `phone`, `email`, `gstin`, `tax_number`, `vatin`, `opening_balance`, `sales_due`, `sales_return_due`, `country_id`, `state_id`, `city`, `postcode`, `address`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`) VALUES (1, 'CU0001', 'Khách hàng vãng lai', '', '', '', '', '', NULL, NULL, '0.00', NULL, '', '', NULL, '', '', NULL, NULL, '2019-01-01', '10:55:54 pm', 'admin', NULL, 1);
INSERT INTO `db_customers` (`id`, `customer_code`, `customer_name`, `mobile`, `phone`, `email`, `gstin`, `tax_number`, `vatin`, `opening_balance`, `sales_due`, `sales_return_due`, `country_id`, `state_id`, `city`, `postcode`, `address`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`) VALUES (2, 'CU0002', 'Nguyễn Văn A', '0911686792', '911686792', 'phamduybk@gmail.com', '', '', NULL, '0.00', NULL, NULL, '3', '1', '', '', '', '::1', 'PQDUY', '2023-10-03', '02:52:47 pm', 'banhang', NULL, 1);


#
# TABLE STRUCTURE FOR: db_expense
#

DROP TABLE IF EXISTS `db_expense`;

CREATE TABLE `db_expense` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `expense_code` varchar(50) DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `expense_for` varchar(100) DEFAULT NULL,
  `expense_amt` double(20,2) DEFAULT NULL,
  `note` mediumtext DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_expense_category
#

DROP TABLE IF EXISTS `db_expense_category`;

CREATE TABLE `db_expense_category` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(50) DEFAULT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_hold
#

DROP TABLE IF EXISTS `db_hold`;

CREATE TABLE `db_hold` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `reference_id` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `sales_note` text DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `db_hold_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `db_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# TABLE STRUCTURE FOR: db_holditems
#

DROP TABLE IF EXISTS `db_holditems`;

CREATE TABLE `db_holditems` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `hold_id` int(5) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_id` (`hold_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `db_holditems_ibfk_2` FOREIGN KEY (`hold_id`) REFERENCES `db_hold` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_holditems_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_items
#

DROP TABLE IF EXISTS `db_items`;

CREATE TABLE `db_items` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) DEFAULT NULL,
  `custom_barcode` varchar(100) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `hsn` varbinary(50) DEFAULT NULL,
  `unit_id` int(10) DEFAULT NULL,
  `alert_qty` int(10) DEFAULT NULL,
  `brand_id` int(5) DEFAULT NULL,
  `lot_number` varchar(50) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `purchase_price` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `profit_margin` double(20,2) DEFAULT NULL,
  `sales_price` double(20,2) DEFAULT NULL,
  `final_price` double(20,2) DEFAULT NULL,
  `stock` double(20,2) DEFAULT NULL,
  `item_image` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `discount` double(20,2) DEFAULT NULL,
  `category_item_id` int(11) DEFAULT NULL,
  `kind_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`, `category_item_id`, `kind_id`) VALUES (1, 'IT0002', '', 'Giầy bata  Size 38', '', 7, '', '', 17, 0, 0, '', NULL, '30000.00', 2, '33000.00', 'Exclusive', NULL, '30000.00', '33000.00', '999.00', NULL, '::1', 'PQDUY', '2023-12-08', '05:33:25 pm', 'admin', NULL, 1, 'Percentage', '0.00', 31, 5);
INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`, `category_item_id`, `kind_id`) VALUES (2, 'IT0003', '', 'Giầy bata  Size 42', '', 7, '', '', 17, 0, 0, '', NULL, '30000.00', 2, '33000.00', 'Exclusive', NULL, '30000.00', '33000.00', '999.00', NULL, '::1', 'PQDUY', '2023-12-08', '05:33:25 pm', 'admin', NULL, 1, 'Percentage', '0.00', 31, 6);
INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`, `category_item_id`, `kind_id`) VALUES (3, 'IT0001', '', 'Giầy bata  Size 40', '', 7, '', '', 17, 0, 0, '', NULL, '30000.00', 2, '33000.00', 'Exclusive', NULL, '30000.00', '33000.00', '999.00', NULL, '::1', 'PQDUY', '2023-12-08', '05:33:25 pm', 'admin', NULL, 1, 'Percentage', '0.00', 31, 4);
INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`, `category_item_id`, `kind_id`) VALUES (4, 'IT0004', '', 'Phòng hát thường', '', 8, '', '', 15, 0, 0, '', NULL, '0.00', 1, '0.00', 'Exclusive', '200000.00', '200000.00', '200000.00', '999.00', NULL, '::1', 'PQDUY', '2023-12-08', '05:34:11 pm', 'admin', NULL, 1, 'Percentage', '0.00', 34, 0);
INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`, `category_item_id`, `kind_id`) VALUES (5, 'IT0005', '', 'Phòng hát VIP', '', 8, '', '', 15, 0, 0, '', NULL, '0.00', 1, '0.00', 'Exclusive', '500000.00', '500000.00', '500000.00', '999.00', NULL, '::1', 'PQDUY', '2023-12-08', '05:34:40 pm', 'admin', NULL, 1, 'Percentage', '0.00', 34, 0);
INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`, `category_item_id`, `kind_id`) VALUES (6, 'IT0006', '', 'Hoa quả dầm', '', 8, '', '', 9, 0, 0, '', NULL, '150000.00', 1, '150000.00', 'Exclusive', '233.00', '500000.00', '500000.00', '999.00', NULL, '::1', 'PQDUY', '2023-12-08', '05:36:07 pm', 'admin', NULL, 1, 'Percentage', '0.00', 33, 0);
INSERT INTO `db_items` (`id`, `item_code`, `custom_barcode`, `item_name`, `description`, `category_id`, `sku`, `hsn`, `unit_id`, `alert_qty`, `brand_id`, `lot_number`, `expire_date`, `price`, `tax_id`, `purchase_price`, `tax_type`, `profit_margin`, `sales_price`, `final_price`, `stock`, `item_image`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`, `discount_type`, `discount`, `category_item_id`, `kind_id`) VALUES (7, 'IT0007', '', 'Trà sữa dâu', '', 8, '', '', 7, 0, 0, '', NULL, '25000.00', 1, '25000.00', 'Exclusive', '100.00', '50000.00', '50000.00', '999.00', NULL, '::1', 'PQDUY', '2023-12-08', '05:41:28 pm', 'admin', NULL, 1, 'Percentage', '0.00', 33, 0);


#
# TABLE STRUCTURE FOR: db_kinds
#

DROP TABLE IF EXISTS `db_kinds`;

CREATE TABLE `db_kinds` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `kind_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_kinds` (`id`, `kind_name`, `description`, `company_id`, `status`) VALUES (4, 'Size 40', '', NULL, 1);
INSERT INTO `db_kinds` (`id`, `kind_name`, `description`, `company_id`, `status`) VALUES (5, 'Size 38', '', NULL, 1);
INSERT INTO `db_kinds` (`id`, `kind_name`, `description`, `company_id`, `status`) VALUES (6, 'Size 42', '', NULL, 1);
INSERT INTO `db_kinds` (`id`, `kind_name`, `description`, `company_id`, `status`) VALUES (7, 'Màu xanh', '', NULL, 1);
INSERT INTO `db_kinds` (`id`, `kind_name`, `description`, `company_id`, `status`) VALUES (8, 'Màu trắng', '', NULL, 1);


#
# TABLE STRUCTURE FOR: db_languages
#

DROP TABLE IF EXISTS `db_languages`;

CREATE TABLE `db_languages` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_languages` (`id`, `language`, `status`) VALUES (1, 'English', 1);
INSERT INTO `db_languages` (`id`, `language`, `status`) VALUES (2, 'Vietnam', 1);


#
# TABLE STRUCTURE FOR: db_paymenttypes
#

DROP TABLE IF EXISTS `db_paymenttypes`;

CREATE TABLE `db_paymenttypes` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_paymenttypes` (`id`, `payment_type`, `status`) VALUES (1, 'Tiền mặt', 1);
INSERT INTO `db_paymenttypes` (`id`, `payment_type`, `status`) VALUES (3, 'Trả thẻ ATM', 1);
INSERT INTO `db_paymenttypes` (`id`, `payment_type`, `status`) VALUES (4, 'Trả tiền đủ', 1);


#
# TABLE STRUCTURE FOR: db_permissions
#

DROP TABLE IF EXISTS `db_permissions`;

CREATE TABLE `db_permissions` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `role_id` int(5) DEFAULT NULL,
  `permissions` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=255 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (1, 2, 'items_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (2, 2, 'items_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (3, 2, 'items_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (4, 2, 'items_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (5, 2, 'sales_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (6, 2, 'sales_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (7, 2, 'sales_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (8, 2, 'sales_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (9, 2, 'sales_payment_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (10, 2, 'sales_payment_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (11, 2, 'sales_payment_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (12, 2, 'items_category_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (13, 2, 'items_category_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (14, 2, 'items_category_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (15, 2, 'items_category_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (16, 2, 'print_labels');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (17, 2, 'import_items');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (18, 2, 'sales_return_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (19, 2, 'sales_return_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (20, 2, 'sales_return_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (21, 2, 'sales_return_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (22, 2, 'sales_return_payment_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (23, 2, 'sales_return_payment_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (24, 2, 'sales_return_payment_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (25, 2, 'pos');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (26, 2, 'view_all_users_sales_invoices');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (27, 2, 'view_all_users_sales_return_invoices');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (141, 3, 'users_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (142, 3, 'users_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (143, 3, 'users_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (144, 3, 'users_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (145, 3, 'tax_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (146, 3, 'tax_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (147, 3, 'tax_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (148, 3, 'tax_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (149, 3, 'currency_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (150, 3, 'currency_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (151, 3, 'currency_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (152, 3, 'currency_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (153, 3, 'company_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (154, 3, 'site_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (155, 3, 'units_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (156, 3, 'units_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (157, 3, 'units_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (158, 3, 'units_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (159, 3, 'roles_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (160, 3, 'roles_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (161, 3, 'roles_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (162, 3, 'roles_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (163, 3, 'places_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (164, 3, 'places_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (165, 3, 'places_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (166, 3, 'places_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (167, 3, 'expense_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (168, 3, 'expense_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (169, 3, 'expense_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (170, 3, 'expense_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (171, 3, 'items_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (172, 3, 'items_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (173, 3, 'items_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (174, 3, 'items_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (175, 3, 'brand_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (176, 3, 'brand_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (177, 3, 'brand_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (178, 3, 'brand_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (179, 3, 'suppliers_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (180, 3, 'suppliers_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (181, 3, 'suppliers_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (182, 3, 'suppliers_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (183, 3, 'customers_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (184, 3, 'customers_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (185, 3, 'customers_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (186, 3, 'customers_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (187, 3, 'purchase_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (188, 3, 'purchase_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (189, 3, 'purchase_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (190, 3, 'purchase_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (191, 3, 'sales_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (192, 3, 'sales_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (193, 3, 'sales_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (194, 3, 'sales_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (195, 3, 'sales_payment_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (196, 3, 'sales_payment_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (197, 3, 'sales_payment_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (198, 3, 'sales_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (199, 3, 'purchase_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (200, 3, 'expense_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (201, 3, 'profit_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (202, 3, 'stock_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (203, 3, 'item_sales_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (204, 3, 'purchase_payments_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (205, 3, 'sales_payments_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (206, 3, 'expired_items_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (207, 3, 'items_category_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (208, 3, 'items_category_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (209, 3, 'items_category_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (210, 3, 'items_category_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (211, 3, 'print_labels');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (212, 3, 'import_items');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (213, 3, 'expense_category_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (214, 3, 'expense_category_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (215, 3, 'expense_category_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (216, 3, 'expense_category_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (217, 3, 'dashboard_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (218, 3, 'send_sms');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (219, 3, 'sms_template_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (220, 3, 'sms_template_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (221, 3, 'sms_api_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (222, 3, 'sms_api_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (223, 3, 'purchase_return_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (224, 3, 'purchase_return_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (225, 3, 'purchase_return_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (226, 3, 'purchase_return_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (227, 3, 'purchase_return_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (228, 3, 'sales_return_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (229, 3, 'sales_return_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (230, 3, 'sales_return_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (231, 3, 'sales_return_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (232, 3, 'sales_return_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (233, 3, 'sales_return_payment_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (234, 3, 'sales_return_payment_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (235, 3, 'sales_return_payment_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (236, 3, 'purchase_return_payment_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (237, 3, 'purchase_return_payment_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (238, 3, 'purchase_return_payment_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (239, 3, 'purchase_payment_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (240, 3, 'purchase_payment_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (241, 3, 'purchase_payment_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (242, 3, 'payment_types_add');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (243, 3, 'payment_types_edit');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (244, 3, 'payment_types_delete');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (245, 3, 'payment_types_view');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (246, 3, 'import_customers');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (247, 3, 'import_suppliers');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (248, 3, 'item_purchase_report');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (249, 3, 'pos');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (250, 3, 'help');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (251, 3, 'view_all_users_sales_invoices');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (252, 3, 'view_all_users_sales_return_invoices');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (253, 3, 'view_all_users_purchase_invoices');
INSERT INTO `db_permissions` (`id`, `role_id`, `permissions`) VALUES (254, 3, 'view_all_users_purchase_return_invoices');


#
# TABLE STRUCTURE FOR: db_purchase
#

DROP TABLE IF EXISTS `db_purchase`;

CREATE TABLE `db_purchase` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `purchase_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL COMMENT 'Purchased qty',
  `round_off` double(20,2) DEFAULT NULL COMMENT 'Pending Qty',
  `grand_total` double(20,2) DEFAULT NULL,
  `purchase_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'Purchase return raised',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_purchaseitems
#

DROP TABLE IF EXISTS `db_purchaseitems`;

CREATE TABLE `db_purchaseitems` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(5) DEFAULT NULL,
  `purchase_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `purchase_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `unit_discount_per` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `profit_margin_per` double(20,2) DEFAULT NULL,
  `unit_sales_price` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `db_purchaseitems_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `db_purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_purchaseitems_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_purchaseitemsreturn
#

DROP TABLE IF EXISTS `db_purchaseitemsreturn`;

CREATE TABLE `db_purchaseitemsreturn` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(5) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `return_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `unit_discount_per` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `profit_margin_per` double(20,2) DEFAULT NULL,
  `unit_sales_price` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discount_type` varchar(100) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `return_id` (`return_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `db_purchaseitemsreturn_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `db_purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_purchaseitemsreturn_ibfk_2` FOREIGN KEY (`return_id`) REFERENCES `db_purchasereturn` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_purchaseitemsreturn_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_purchasepayments
#

DROP TABLE IF EXISTS `db_purchasepayments`;

CREATE TABLE `db_purchasepayments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_purchasepaymentsreturn
#

DROP TABLE IF EXISTS `db_purchasepaymentsreturn`;

CREATE TABLE `db_purchasepaymentsreturn` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_purchasereturn
#

DROP TABLE IF EXISTS `db_purchasereturn`;

CREATE TABLE `db_purchasereturn` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) DEFAULT NULL,
  `return_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL COMMENT 'Purchased qty',
  `round_off` double(20,2) DEFAULT NULL COMMENT 'Pending Qty',
  `grand_total` double(20,2) DEFAULT NULL,
  `return_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_roles
#

DROP TABLE IF EXISTS `db_roles`;

CREATE TABLE `db_roles` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_roles` (`id`, `role_name`, `description`, `status`) VALUES (1, 'Admin', 'All Rights Permitted.', 1);
INSERT INTO `db_roles` (`id`, `role_name`, `description`, `status`) VALUES (2, 'Bán hàng', '', 1);
INSERT INTO `db_roles` (`id`, `role_name`, `description`, `status`) VALUES (3, 'Quản lý', '', 1);


#
# TABLE STRUCTURE FOR: db_sales
#

DROP TABLE IF EXISTS `db_sales`;

CREATE TABLE `db_sales` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sales_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `sales_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'sales return raised',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_salesitems
#

DROP TABLE IF EXISTS `db_salesitems`;

CREATE TABLE `db_salesitems` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sales_id` int(5) DEFAULT NULL,
  `sales_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sales_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `purchase_price` double(20,2) DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `sales_id` (`sales_id`),
  CONSTRAINT `db_salesitems_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_salesitems_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `db_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=328 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_salesitemsreturn
#

DROP TABLE IF EXISTS `db_salesitemsreturn`;

CREATE TABLE `db_salesitemsreturn` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sales_id` int(5) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `return_qty` double(20,2) DEFAULT NULL,
  `price_per_unit` double(20,2) DEFAULT NULL,
  `tax_id` int(5) DEFAULT NULL,
  `tax_amt` double(20,2) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `discount_input` double(20,2) DEFAULT NULL,
  `discount_amt` double(20,2) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `unit_total_cost` double(20,2) DEFAULT NULL,
  `total_cost` double(20,2) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `purchase_price` double(20,2) DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `return_id` (`return_id`),
  KEY `sales_id` (`sales_id`),
  CONSTRAINT `db_salesitemsreturn_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `db_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_salesitemsreturn_ibfk_2` FOREIGN KEY (`return_id`) REFERENCES `db_salesreturn` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_salesitemsreturn_ibfk_3` FOREIGN KEY (`sales_id`) REFERENCES `db_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_salespayments
#

DROP TABLE IF EXISTS `db_salespayments`;

CREATE TABLE `db_salespayments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sales_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `change_return` double(20,2) DEFAULT NULL COMMENT 'Refunding the greater amount',
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_salespayments` (`id`, `sales_id`, `payment_date`, `payment_type`, `payment`, `payment_note`, `change_return`, `system_ip`, `system_name`, `created_time`, `created_date`, `created_by`, `status`) VALUES (96, 95, '2023-11-06', 'Cash', '120000.00', 'Paid By Cash', '0.00', '::1', 'PQDUY', '09:40:37', '2023-11-06', 'admin', 1);


#
# TABLE STRUCTURE FOR: db_salespaymentsreturn
#

DROP TABLE IF EXISTS `db_salespaymentsreturn`;

CREATE TABLE `db_salespaymentsreturn` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sales_id` int(5) DEFAULT NULL,
  `return_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `change_return` double(20,2) DEFAULT NULL COMMENT 'Refunding the greater amount',
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_salesreturn
#

DROP TABLE IF EXISTS `db_salesreturn`;

CREATE TABLE `db_salesreturn` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sales_id` int(5) DEFAULT NULL,
  `return_code` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_status` varchar(50) DEFAULT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `warehouse_id` int(5) DEFAULT NULL,
  `other_charges_input` double(20,2) DEFAULT NULL,
  `other_charges_tax_id` int(5) DEFAULT NULL,
  `other_charges_amt` double(20,2) DEFAULT NULL,
  `discount_to_all_input` double(20,2) DEFAULT NULL,
  `discount_to_all_type` varchar(50) DEFAULT NULL,
  `tot_discount_to_all_amt` double(20,2) DEFAULT NULL,
  `subtotal` double(20,2) DEFAULT NULL,
  `round_off` double(20,2) DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `return_note` mediumtext DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL COMMENT '1=yes 0=no',
  `status` int(1) DEFAULT NULL,
  `return_bit` int(1) DEFAULT NULL COMMENT 'Return raised or not 1 or null',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_sitesettings
#

DROP TABLE IF EXISTS `db_sitesettings`;

CREATE TABLE `db_sitesettings` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `version` varchar(10) DEFAULT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `logo` mediumtext DEFAULT NULL COMMENT 'path',
  `language_id` int(5) DEFAULT NULL,
  `currency_id` int(5) DEFAULT NULL,
  `currency_placement` varchar(50) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `date_format` varchar(30) DEFAULT NULL,
  `time_format` int(5) DEFAULT NULL,
  `sales_discount` double(20,2) DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `site_title` varchar(50) DEFAULT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_desc` mediumtext DEFAULT NULL,
  `meta_keywords` mediumtext DEFAULT NULL,
  `currencysymbol_id` int(5) DEFAULT NULL,
  `regno_key` varchar(6) DEFAULT NULL,
  `copyright` mediumtext DEFAULT NULL,
  `facebook_url` mediumtext DEFAULT NULL,
  `twitter_url` mediumtext DEFAULT NULL,
  `youtube_url` mediumtext DEFAULT NULL,
  `analytic_code` mediumtext DEFAULT NULL,
  `fav_icon` mediumtext DEFAULT NULL COMMENT 'path',
  `footer_logo` mediumtext DEFAULT NULL COMMENT 'path',
  `company_id` int(1) DEFAULT NULL,
  `purchase_code` mediumtext DEFAULT NULL,
  `change_return` int(1) DEFAULT NULL COMMENT 'show in pos',
  `sales_invoice_format_id` int(5) DEFAULT NULL,
  `sales_invoice_footer_text` text DEFAULT NULL,
  `round_off` int(1) DEFAULT NULL COMMENT '1=Enble, 0=Disable',
  `machine_id` text DEFAULT NULL,
  `domain` text DEFAULT NULL,
  `show_upi_code` int(1) DEFAULT 0,
  `unique_code` text DEFAULT NULL,
  `disable_tax` int(1) DEFAULT 0 COMMENT 'If set Disable the tax from app',
  `number_to_words` varchar(100) DEFAULT 'Default',
  `backup_count` int(11) NOT NULL,
  `backup_count_max` int(11) NOT NULL,
  `backup_lastdate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currencysymbol_id` (`currencysymbol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_sitesettings` (`id`, `version`, `site_name`, `logo`, `language_id`, `currency_id`, `currency_placement`, `timezone`, `date_format`, `time_format`, `sales_discount`, `site_url`, `site_title`, `meta_title`, `meta_desc`, `meta_keywords`, `currencysymbol_id`, `regno_key`, `copyright`, `facebook_url`, `twitter_url`, `youtube_url`, `analytic_code`, `fav_icon`, `footer_logo`, `company_id`, `purchase_code`, `change_return`, `sales_invoice_format_id`, `sales_invoice_footer_text`, `round_off`, `machine_id`, `domain`, `show_upi_code`, `unique_code`, `disable_tax`, `number_to_words`, `backup_count`, `backup_count_max`, `backup_lastdate`) VALUES (1, '3.1', 'Rabit POS', 'localhost/1559021603.jpg', 2, 45, 'Right', 'Asia/Ho_Chi_Minh\r\n', 'dd-mm-yyyy', 12, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 'Cám ơn và hẹn gặp lại quý khách', 0, 'Demo', 'demosforyou.tech', 0, 'x5no9gzba6rydkclmtjfvh0s3we418', 0, 'Indian', 3, 200, '2023-10-13');


#
# TABLE STRUCTURE FOR: db_smsapi
#

DROP TABLE IF EXISTS `db_smsapi`;

CREATE TABLE `db_smsapi` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `info` varchar(150) DEFAULT NULL,
  `key` varchar(600) DEFAULT NULL,
  `key_value` varchar(600) DEFAULT NULL,
  `delete_bit` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_smsapi` (`id`, `info`, `key`, `key_value`, `delete_bit`) VALUES (150, 'mobile', '', '', NULL);
INSERT INTO `db_smsapi` (`id`, `info`, `key`, `key_value`, `delete_bit`) VALUES (151, 'message', '', '', NULL);


#
# TABLE STRUCTURE FOR: db_smstemplates
#

DROP TABLE IF EXISTS `db_smstemplates`;

CREATE TABLE `db_smstemplates` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `variables` text DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `undelete_bit` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_smstemplates` (`id`, `template_name`, `content`, `variables`, `company_id`, `status`, `undelete_bit`) VALUES (1, 'GREETING TO CUSTOMER ON SALES', 'Hi {{customer_name}},\r\nYour sales Id is {{sales_id}},\r\nSales Date {{sales_date}},\r\nTotal amount {{sales_amount}},\r\nYou have paid {{paid_amt}},\r\nand customer total due amount is {{cust_tot_due_amt}}\r\nThank you Visit Again', '{{customer_name}}\n\r\n{{sales_id}}\n\r\n{{sales_date}}\n\r\n{{sales_amount}}\n\r\n{{paid_amt}}\n\r\n{{cust_tot_due_amt}}\n\r\n{{invoice_due_amt}}\n\r\n{{company_name}}\n\r\n{{company_mobile}}\n\r\n{{company_address}}\n\r\n{{company_website}}\n\r\n{{company_email}}\n', NULL, 1, 1);
INSERT INTO `db_smstemplates` (`id`, `template_name`, `content`, `variables`, `company_id`, `status`, `undelete_bit`) VALUES (2, 'GREETING TO CUSTOMER ON SALES RETURN', 'Hi {{customer_name}},\r\nYour sales return Id is {{return_id}},\r\nReturn Date {{return_date}},\r\nTotal amount {{return_amount}},\r\nWe paid {{paid_amt}},\r\nand customer total due amount is {{cust_tot_due_amt}}\r\nThank you Visit Again', '{{customer_name}}\n\r\n{{return_id}}\n\r\n{{return_date}}\n\r\n{{return_amount}}\n\r\n{{paid_amt}}\n\r\n{{cust_tot_due_amt}}\n\r\n{{invoice_due_amt}}\n\r\n{{company_name}}\n\r\n{{company_mobile}}\n\r\n{{company_address}}\n\r\n{{company_website}}\n\r\n{{company_email}}\n', NULL, 1, 1);


#
# TABLE STRUCTURE FOR: db_sobpayments
#

DROP TABLE IF EXISTS `db_sobpayments`;

CREATE TABLE `db_sobpayments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` mediumtext DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: db_states
#

DROP TABLE IF EXISTS `db_states`;

CREATE TABLE `db_states` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `state_code` varchar(10) DEFAULT NULL,
  `state` varchar(4050) DEFAULT NULL,
  `country_code` varchar(15) DEFAULT NULL,
  `country_id` int(5) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `added_on` date DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (1, NULL, 'An Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (2, NULL, 'Bà Rịa - Vũng Tàu', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (3, NULL, 'Bắc Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (4, NULL, 'Bắc Kạn', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (5, NULL, 'Bạc Liêu', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (6, NULL, 'Bắc Ninh', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (7, NULL, 'Bến Tre', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (8, NULL, 'Bình Định', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (9, NULL, 'Bình Dương', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (10, NULL, 'Bình Phước', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (11, NULL, 'Bình Thuận', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (12, NULL, 'Cà Mau', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (13, NULL, 'Cần Thơ', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (14, NULL, 'Cao Bằng', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (15, NULL, 'Đà Nẵng', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (16, NULL, 'Đắk Lắk', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (17, NULL, 'Đắk Nông', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (18, NULL, 'Điện Biên', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (19, NULL, 'Đồng Nai', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (20, NULL, 'Đồng Tháp', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (21, NULL, 'Gia Lai', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (22, NULL, 'Hà Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (23, NULL, 'Hà Nam', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (24, NULL, 'Hà Nội', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (25, NULL, 'Hà Tĩnh', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (26, NULL, 'Hải Dương', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (27, NULL, 'Hải Phòng', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (28, NULL, 'Hậu Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (29, NULL, 'Hòa Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (30, NULL, 'Hưng Yên', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (31, NULL, 'Khánh Hòa', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (32, NULL, 'Kiên Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (33, NULL, 'Kon Tum', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (34, NULL, 'Lai Châu', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (35, NULL, 'Lâm Đồng', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (36, NULL, 'Lạng Sơn', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (37, NULL, 'Lào Cai', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (38, NULL, 'Long An', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (39, NULL, 'Nam Định', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (40, NULL, 'Nghệ An', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (41, NULL, 'Ninh Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (42, NULL, 'Ninh Thuận', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (43, NULL, 'Phú Thọ', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (44, NULL, 'Phú Yên', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (45, NULL, 'Quảng Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (46, NULL, 'Quảng Nam', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (47, NULL, 'Quảng Ngãi', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (48, NULL, 'Quảng Ninh', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (49, NULL, 'Quảng Trị', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (50, NULL, 'Sóc Trăng', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (51, NULL, 'Sơn La', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (52, NULL, 'Tây Ninh', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (53, NULL, 'Thái Bình', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (54, NULL, 'Thái Nguyên', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (55, NULL, 'Thanh Hóa', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (56, NULL, 'Thừa Thiên-Huế', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (57, NULL, 'Tiền Giang', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (58, NULL, 'Trà Vinh', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (59, NULL, 'Tuyên Quang', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (60, NULL, 'Vĩnh Long', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (61, NULL, 'Vĩnh Phúc', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (62, NULL, 'Yên Bái', NULL, NULL, 'Việt Nam', NULL, NULL, 1);
INSERT INTO `db_states` (`id`, `state_code`, `state`, `country_code`, `country_id`, `country`, `added_on`, `company_id`, `status`) VALUES (63, NULL, 'Đắk Nông', NULL, NULL, 'Việt Nam', NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: db_stockentry
#

DROP TABLE IF EXISTS `db_stockentry`;

CREATE TABLE `db_stockentry` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `entry_date` date DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES (31, '2023-12-08', 1, 999, '', 1);
INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES (32, '2023-12-08', 2, 999, '', 1);
INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES (33, '2023-12-08', 3, 999, '', 1);
INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES (34, '2023-12-08', 4, 999, '', 1);
INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES (35, '2023-12-08', 5, 999, '', 1);
INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES (36, '2023-12-08', 6, 999, '', 1);
INSERT INTO `db_stockentry` (`id`, `entry_date`, `item_id`, `qty`, `note`, `status`) VALUES (37, '2023-12-08', 7, 999, '', 1);


#
# TABLE STRUCTURE FOR: db_supplier_payments
#

DROP TABLE IF EXISTS `db_supplier_payments`;

CREATE TABLE `db_supplier_payments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `purchasepayment_id` int(5) DEFAULT NULL,
  `supplier_id` int(5) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `payment` double(20,2) DEFAULT NULL,
  `payment_note` text DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_date` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `purchasepayment_id` (`purchasepayment_id`),
  CONSTRAINT `db_supplier_payments_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `db_suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `db_supplier_payments_ibfk_2` FOREIGN KEY (`purchasepayment_id`) REFERENCES `db_purchasepayments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# TABLE STRUCTURE FOR: db_suppliers
#

DROP TABLE IF EXISTS `db_suppliers`;

CREATE TABLE `db_suppliers` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(20) DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gstin` varchar(100) DEFAULT NULL,
  `tax_number` varchar(50) DEFAULT NULL,
  `vatin` varchar(100) DEFAULT NULL,
  `opening_balance` double(20,2) DEFAULT NULL,
  `purchase_due` double(20,2) DEFAULT NULL,
  `purchase_return_due` double(20,2) DEFAULT NULL,
  `country_id` int(5) DEFAULT NULL,
  `state_id` int(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(30) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_suppliers` (`id`, `supplier_code`, `supplier_name`, `mobile`, `phone`, `email`, `gstin`, `tax_number`, `vatin`, `opening_balance`, `purchase_due`, `purchase_return_due`, `country_id`, `state_id`, `city`, `postcode`, `address`, `system_ip`, `system_name`, `created_date`, `created_time`, `created_by`, `company_id`, `status`) VALUES (1, 'SP0001', 'samsung', '0911686792', '911686792', 'fkgkf@gmail.com', '352523523', '353465476584', NULL, '5000000000000.00', NULL, NULL, 3, 1, '', '', '', '::1', 'PQDUY', '2023-10-12', '09:19:58 am', 'admin', NULL, 1);


#
# TABLE STRUCTURE FOR: db_tax
#

DROP TABLE IF EXISTS `db_tax`;

CREATE TABLE `db_tax` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(50) DEFAULT NULL,
  `tax` double(20,2) DEFAULT NULL,
  `group_bit` int(1) DEFAULT NULL COMMENT '1=Yes, 0=No',
  `subtax_ids` varchar(10) DEFAULT NULL COMMENT 'Tax groups IDs',
  `status` int(1) DEFAULT NULL,
  `undelete_bit` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_tax` (`id`, `tax_name`, `tax`, `group_bit`, `subtax_ids`, `status`, `undelete_bit`) VALUES (1, 'None', '0.00', NULL, NULL, 1, 1);
INSERT INTO `db_tax` (`id`, `tax_name`, `tax`, `group_bit`, `subtax_ids`, `status`, `undelete_bit`) VALUES (2, 'VAT', '10.00', NULL, NULL, 1, 0);


#
# TABLE STRUCTURE FOR: db_timezone
#

DROP TABLE IF EXISTS `db_timezone`;

CREATE TABLE `db_timezone` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `timezone` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=549 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (1, 'Africa/Abidjan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (2, 'Africa/Accra\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (3, 'Africa/Addis_Ababa\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (4, 'Africa/Algiers\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (5, 'Africa/Asmara\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (6, 'Africa/Asmera\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (7, 'Africa/Bamako\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (8, 'Africa/Bangui\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (9, 'Africa/Banjul\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (10, 'Africa/Bissau\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (11, 'Africa/Blantyre\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (12, 'Africa/Brazzaville\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (13, 'Africa/Bujumbura\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (14, 'Africa/Cairo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (15, 'Africa/Casablanca\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (16, 'Africa/Ceuta\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (17, 'Africa/Conakry\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (18, 'Africa/Dakar\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (19, 'Africa/Dar_es_Salaam\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (20, 'Africa/Djibouti\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (21, 'Africa/Douala\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (22, 'Africa/El_Aaiun\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (23, 'Africa/Freetown\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (24, 'Africa/Gaborone\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (25, 'Africa/Harare\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (26, 'Africa/Johannesburg\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (27, 'Africa/Juba\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (28, 'Africa/Kampala\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (29, 'Africa/Khartoum\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (30, 'Africa/Kigali\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (31, 'Africa/Kinshasa\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (32, 'Africa/Lagos\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (33, 'Africa/Libreville\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (34, 'Africa/Lome\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (35, 'Africa/Luanda\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (36, 'Africa/Lubumbashi\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (37, 'Africa/Lusaka\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (38, 'Africa/Malabo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (39, 'Africa/Maputo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (40, 'Africa/Maseru\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (41, 'Africa/Mbabane\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (42, 'Africa/Mogadishu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (43, 'Africa/Monrovia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (44, 'Africa/Nairobi\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (45, 'Africa/Ndjamena\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (46, 'Africa/Niamey\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (47, 'Africa/Nouakchott\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (48, 'Africa/Ouagadougou\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (49, 'Africa/Porto-Novo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (50, 'Africa/Sao_Tome\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (51, 'Africa/Timbuktu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (52, 'Africa/Tripoli\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (53, 'Africa/Tunis\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (54, 'Africa/Windhoek\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (55, 'AKST9AKDT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (56, 'America/Adak\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (57, 'America/Anchorage\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (58, 'America/Anguilla\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (59, 'America/Antigua\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (60, 'America/Araguaina\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (61, 'America/Argentina/Buenos_Aires\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (62, 'America/Argentina/Catamarca\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (63, 'America/Argentina/ComodRivadavia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (64, 'America/Argentina/Cordoba\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (65, 'America/Argentina/Jujuy\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (66, 'America/Argentina/La_Rioja\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (67, 'America/Argentina/Mendoza\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (68, 'America/Argentina/Rio_Gallegos\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (69, 'America/Argentina/Salta\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (70, 'America/Argentina/San_Juan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (71, 'America/Argentina/San_Luis\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (72, 'America/Argentina/Tucuman\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (73, 'America/Argentina/Ushuaia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (74, 'America/Aruba\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (75, 'America/Asuncion\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (76, 'America/Atikokan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (77, 'America/Atka\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (78, 'America/Bahia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (79, 'America/Bahia_Banderas\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (80, 'America/Barbados\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (81, 'America/Belem\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (82, 'America/Belize\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (83, 'America/Blanc-Sablon\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (84, 'America/Boa_Vista\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (85, 'America/Bogota\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (86, 'America/Boise\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (87, 'America/Buenos_Aires\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (88, 'America/Cambridge_Bay\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (89, 'America/Campo_Grande\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (90, 'America/Cancun\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (91, 'America/Caracas\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (92, 'America/Catamarca\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (93, 'America/Cayenne\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (94, 'America/Cayman\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (95, 'America/Chicago\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (96, 'America/Chihuahua\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (97, 'America/Coral_Harbour\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (98, 'America/Cordoba\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (99, 'America/Costa_Rica\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (100, 'America/Creston\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (101, 'America/Cuiaba\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (102, 'America/Curacao\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (103, 'America/Danmarkshavn\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (104, 'America/Dawson\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (105, 'America/Dawson_Creek\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (106, 'America/Denver\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (107, 'America/Detroit\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (108, 'America/Dominica\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (109, 'America/Edmonton\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (110, 'America/Eirunepe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (111, 'America/El_Salvador\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (112, 'America/Ensenada\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (113, 'America/Fort_Wayne\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (114, 'America/Fortaleza\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (115, 'America/Glace_Bay\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (116, 'America/Godthab\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (117, 'America/Goose_Bay\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (118, 'America/Grand_Turk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (119, 'America/Grenada\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (120, 'America/Guadeloupe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (121, 'America/Guatemala\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (122, 'America/Guayaquil\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (123, 'America/Guyana\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (124, 'America/Halifax\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (125, 'America/Havana\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (126, 'America/Hermosillo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (127, 'America/Indiana/Indianapolis\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (128, 'America/Indiana/Knox\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (129, 'America/Indiana/Marengo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (130, 'America/Indiana/Petersburg\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (131, 'America/Indiana/Tell_City\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (132, 'America/Indiana/Vevay\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (133, 'America/Indiana/Vincennes\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (134, 'America/Indiana/Winamac\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (135, 'America/Indianapolis\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (136, 'America/Inuvik\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (137, 'America/Iqaluit\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (138, 'America/Jamaica\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (139, 'America/Jujuy\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (140, 'America/Juneau\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (141, 'America/Kentucky/Louisville\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (142, 'America/Kentucky/Monticello\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (143, 'America/Knox_IN\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (144, 'America/Kralendijk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (145, 'America/La_Paz\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (146, 'America/Lima\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (147, 'America/Los_Angeles\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (148, 'America/Louisville\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (149, 'America/Lower_Princes\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (150, 'America/Maceio\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (151, 'America/Managua\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (152, 'America/Manaus\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (153, 'America/Marigot\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (154, 'America/Martinique\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (155, 'America/Matamoros\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (156, 'America/Mazatlan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (157, 'America/Mendoza\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (158, 'America/Menominee\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (159, 'America/Merida\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (160, 'America/Metlakatla\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (161, 'America/Mexico_City\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (162, 'America/Miquelon\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (163, 'America/Moncton\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (164, 'America/Monterrey\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (165, 'America/Montevideo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (166, 'America/Montreal\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (167, 'America/Montserrat\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (168, 'America/Nassau\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (169, 'America/New_York\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (170, 'America/Nipigon\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (171, 'America/Nome\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (172, 'America/Noronha\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (173, 'America/North_Dakota/Beulah\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (174, 'America/North_Dakota/Center\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (175, 'America/North_Dakota/New_Salem\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (176, 'America/Ojinaga\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (177, 'America/Panama\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (178, 'America/Pangnirtung\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (179, 'America/Paramaribo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (180, 'America/Phoenix\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (181, 'America/Port_of_Spain\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (182, 'America/Port-au-Prince\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (183, 'America/Porto_Acre\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (184, 'America/Porto_Velho\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (185, 'America/Puerto_Rico\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (186, 'America/Rainy_River\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (187, 'America/Rankin_Inlet\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (188, 'America/Recife\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (189, 'America/Regina\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (190, 'America/Resolute\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (191, 'America/Rio_Branco\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (192, 'America/Rosario\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (193, 'America/Santa_Isabel\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (194, 'America/Santarem\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (195, 'America/Santiago\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (196, 'America/Santo_Domingo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (197, 'America/Sao_Paulo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (198, 'America/Scoresbysund\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (199, 'America/Shiprock\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (200, 'America/Sitka\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (201, 'America/St_Barthelemy\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (202, 'America/St_Johns\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (203, 'America/St_Kitts\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (204, 'America/St_Lucia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (205, 'America/St_Thomas\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (206, 'America/St_Vincent\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (207, 'America/Swift_Current\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (208, 'America/Tegucigalpa\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (209, 'America/Thule\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (210, 'America/Thunder_Bay\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (211, 'America/Tijuana\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (212, 'America/Toronto\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (213, 'America/Tortola\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (214, 'America/Vancouver\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (215, 'America/Virgin\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (216, 'America/Whitehorse\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (217, 'America/Winnipeg\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (218, 'America/Yakutat\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (219, 'America/Yellowknife\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (220, 'Antarctica/Casey\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (221, 'Antarctica/Davis\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (222, 'Antarctica/DumontDUrville\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (223, 'Antarctica/Macquarie\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (224, 'Antarctica/Mawson\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (225, 'Antarctica/McMurdo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (226, 'Antarctica/Palmer\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (227, 'Antarctica/Rothera\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (228, 'Antarctica/South_Pole\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (229, 'Antarctica/Syowa\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (230, 'Antarctica/Vostok\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (231, 'Arctic/Longyearbyen\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (232, 'Asia/Aden\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (233, 'Asia/Almaty\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (234, 'Asia/Amman\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (235, 'Asia/Anadyr\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (236, 'Asia/Aqtau\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (237, 'Asia/Aqtobe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (238, 'Asia/Ashgabat\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (239, 'Asia/Ashkhabad\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (240, 'Asia/Baghdad\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (241, 'Asia/Bahrain\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (242, 'Asia/Baku\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (243, 'Asia/Bangkok\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (244, 'Asia/Beirut\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (245, 'Asia/Bishkek\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (246, 'Asia/Brunei\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (247, 'Asia/Calcutta\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (248, 'Asia/Choibalsan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (249, 'Asia/Chongqing\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (250, 'Asia/Chungking\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (251, 'Asia/Colombo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (252, 'Asia/Dacca\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (253, 'Asia/Damascus\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (254, 'Asia/Dhaka\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (255, 'Asia/Dili\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (256, 'Asia/Dubai\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (257, 'Asia/Dushanbe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (258, 'Asia/Gaza\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (259, 'Asia/Harbin\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (260, 'Asia/Hebron\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (261, 'Asia/Ho_Chi_Minh\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (262, 'Asia/Hong_Kong\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (263, 'Asia/Hovd\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (264, 'Asia/Irkutsk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (265, 'Asia/Istanbul\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (266, 'Asia/Jakarta\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (267, 'Asia/Jayapura\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (268, 'Asia/Jerusalem\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (269, 'Asia/Kabul\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (270, 'Asia/Kamchatka\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (271, 'Asia/Karachi\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (272, 'Asia/Kashgar\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (273, 'Asia/Kathmandu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (274, 'Asia/Katmandu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (275, 'Asia/Kolkata\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (276, 'Asia/Krasnoyarsk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (277, 'Asia/Kuala_Lumpur\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (278, 'Asia/Kuching\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (279, 'Asia/Kuwait\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (280, 'Asia/Macao\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (281, 'Asia/Macau\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (282, 'Asia/Magadan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (283, 'Asia/Makassar\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (284, 'Asia/Manila\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (285, 'Asia/Muscat\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (286, 'Asia/Nicosia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (287, 'Asia/Novokuznetsk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (288, 'Asia/Novosibirsk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (289, 'Asia/Omsk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (290, 'Asia/Oral\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (291, 'Asia/Phnom_Penh\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (292, 'Asia/Pontianak\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (293, 'Asia/Pyongyang\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (294, 'Asia/Qatar\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (295, 'Asia/Qyzylorda\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (296, 'Asia/Rangoon\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (297, 'Asia/Riyadh\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (298, 'Asia/Saigon\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (299, 'Asia/Sakhalin\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (300, 'Asia/Samarkand\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (301, 'Asia/Seoul\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (302, 'Asia/Shanghai\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (303, 'Asia/Singapore\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (304, 'Asia/Taipei\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (305, 'Asia/Tashkent\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (306, 'Asia/Tbilisi\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (307, 'Asia/Tehran\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (308, 'Asia/Tel_Aviv\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (309, 'Asia/Thimbu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (310, 'Asia/Thimphu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (311, 'Asia/Tokyo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (312, 'Asia/Ujung_Pandang\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (313, 'Asia/Ulaanbaatar\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (314, 'Asia/Ulan_Bator\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (315, 'Asia/Urumqi\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (316, 'Asia/Vientiane\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (317, 'Asia/Vladivostok\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (318, 'Asia/Yakutsk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (319, 'Asia/Yekaterinburg\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (320, 'Asia/Yerevan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (321, 'Atlantic/Azores\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (322, 'Atlantic/Bermuda\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (323, 'Atlantic/Canary\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (324, 'Atlantic/Cape_Verde\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (325, 'Atlantic/Faeroe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (326, 'Atlantic/Faroe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (327, 'Atlantic/Jan_Mayen\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (328, 'Atlantic/Madeira\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (329, 'Atlantic/Reykjavik\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (330, 'Atlantic/South_Georgia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (331, 'Atlantic/St_Helena\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (332, 'Atlantic/Stanley\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (333, 'Australia/ACT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (334, 'Australia/Adelaide\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (335, 'Australia/Brisbane\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (336, 'Australia/Broken_Hill\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (337, 'Australia/Canberra\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (338, 'Australia/Currie\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (339, 'Australia/Darwin\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (340, 'Australia/Eucla\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (341, 'Australia/Hobart\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (342, 'Australia/LHI\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (343, 'Australia/Lindeman\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (344, 'Australia/Lord_Howe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (345, 'Australia/Melbourne\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (346, 'Australia/North\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (347, 'Australia/NSW\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (348, 'Australia/Perth\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (349, 'Australia/Queensland\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (350, 'Australia/South\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (351, 'Australia/Sydney\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (352, 'Australia/Tasmania\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (353, 'Australia/Victoria\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (354, 'Australia/West\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (355, 'Australia/Yancowinna\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (356, 'Brazil/Acre\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (357, 'Brazil/DeNoronha\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (358, 'Brazil/East\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (359, 'Brazil/West\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (360, 'Canada/Atlantic\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (361, 'Canada/Central\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (362, 'Canada/Eastern\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (363, 'Canada/East-Saskatchewan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (364, 'Canada/Mountain\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (365, 'Canada/Newfoundland\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (366, 'Canada/Pacific\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (367, 'Canada/Saskatchewan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (368, 'Canada/Yukon\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (369, 'CET\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (370, 'Chile/Continental\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (371, 'Chile/EasterIsland\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (372, 'CST6CDT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (373, 'Cuba\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (374, 'EET\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (375, 'Egypt\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (376, 'Eire\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (377, 'EST\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (378, 'EST5EDT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (379, 'Etc./GMT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (380, 'Etc./GMT+0\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (381, 'Etc./UCT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (382, 'Etc./Universal\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (383, 'Etc./UTC\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (384, 'Etc./Zulu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (385, 'Europe/Amsterdam\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (386, 'Europe/Andorra\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (387, 'Europe/Athens\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (388, 'Europe/Belfast\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (389, 'Europe/Belgrade\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (390, 'Europe/Berlin\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (391, 'Europe/Bratislava\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (392, 'Europe/Brussels\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (393, 'Europe/Bucharest\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (394, 'Europe/Budapest\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (395, 'Europe/Chisinau\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (396, 'Europe/Copenhagen\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (397, 'Europe/Dublin\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (398, 'Europe/Gibraltar\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (399, 'Europe/Guernsey\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (400, 'Europe/Helsinki\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (401, 'Europe/Isle_of_Man\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (402, 'Europe/Istanbul\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (403, 'Europe/Jersey\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (404, 'Europe/Kaliningrad\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (405, 'Europe/Kiev\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (406, 'Europe/Lisbon\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (407, 'Europe/Ljubljana\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (408, 'Europe/London\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (409, 'Europe/Luxembourg\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (410, 'Europe/Madrid\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (411, 'Europe/Malta\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (412, 'Europe/Mariehamn\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (413, 'Europe/Minsk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (414, 'Europe/Monaco\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (415, 'Europe/Moscow\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (416, 'Europe/Nicosia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (417, 'Europe/Oslo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (418, 'Europe/Paris\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (419, 'Europe/Podgorica\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (420, 'Europe/Prague\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (421, 'Europe/Riga\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (422, 'Europe/Rome\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (423, 'Europe/Samara\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (424, 'Europe/San_Marino\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (425, 'Europe/Sarajevo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (426, 'Europe/Simferopol\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (427, 'Europe/Skopje\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (428, 'Europe/Sofia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (429, 'Europe/Stockholm\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (430, 'Europe/Tallinn\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (431, 'Europe/Tirane\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (432, 'Europe/Tiraspol\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (433, 'Europe/Uzhgorod\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (434, 'Europe/Vaduz\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (435, 'Europe/Vatican\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (436, 'Europe/Vienna\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (437, 'Europe/Vilnius\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (438, 'Europe/Volgograd\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (439, 'Europe/Warsaw\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (440, 'Europe/Zagreb\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (441, 'Europe/Zaporozhye\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (442, 'Europe/Zurich\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (443, 'GB\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (444, 'GB-Eire\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (445, 'GMT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (446, 'GMT+0\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (447, 'GMT0\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (448, 'GMT-0\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (449, 'Greenwich\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (450, 'Hong Kong\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (451, 'HST\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (452, 'Iceland\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (453, 'Indian/Antananarivo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (454, 'Indian/Chagos\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (455, 'Indian/Christmas\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (456, 'Indian/Cocos\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (457, 'Indian/Comoro\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (458, 'Indian/Kerguelen\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (459, 'Indian/Mahe\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (460, 'Indian/Maldives\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (461, 'Indian/Mauritius\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (462, 'Indian/Mayotte\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (463, 'Indian/Reunion\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (464, 'Iran\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (465, 'Israel\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (466, 'Jamaica\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (467, 'Japan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (468, 'JST-9\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (469, 'Kwajalein\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (470, 'Libya\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (471, 'MET\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (472, 'Mexico/BajaNorte\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (473, 'Mexico/BajaSur\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (474, 'Mexico/General\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (475, 'MST\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (476, 'MST7MDT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (477, 'Navajo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (478, 'NZ\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (479, 'NZ-CHAT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (480, 'Pacific/Apia\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (481, 'Pacific/Auckland\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (482, 'Pacific/Chatham\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (483, 'Pacific/Chuuk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (484, 'Pacific/Easter\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (485, 'Pacific/Efate\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (486, 'Pacific/Enderbury\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (487, 'Pacific/Fakaofo\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (488, 'Pacific/Fiji\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (489, 'Pacific/Funafuti\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (490, 'Pacific/Galapagos\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (491, 'Pacific/Gambier\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (492, 'Pacific/Guadalcanal\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (493, 'Pacific/Guam\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (494, 'Pacific/Honolulu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (495, 'Pacific/Johnston\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (496, 'Pacific/Kiritimati\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (497, 'Pacific/Kosrae\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (498, 'Pacific/Kwajalein\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (499, 'Pacific/Majuro\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (500, 'Pacific/Marquesas\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (501, 'Pacific/Midway\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (502, 'Pacific/Nauru\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (503, 'Pacific/Niue\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (504, 'Pacific/Norfolk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (505, 'Pacific/Noumea\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (506, 'Pacific/Pago_Pago\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (507, 'Pacific/Palau\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (508, 'Pacific/Pitcairn\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (509, 'Pacific/Pohnpei\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (510, 'Pacific/Ponape\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (511, 'Pacific/Port_Moresby\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (512, 'Pacific/Rarotonga\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (513, 'Pacific/Saipan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (514, 'Pacific/Samoa\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (515, 'Pacific/Tahiti\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (516, 'Pacific/Tarawa\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (517, 'Pacific/Tongatapu\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (518, 'Pacific/Truk\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (519, 'Pacific/Wake\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (520, 'Pacific/Wallis\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (521, 'Pacific/Yap\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (522, 'Poland\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (523, 'Portugal\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (524, 'PRC\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (525, 'PST8PDT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (526, 'ROC\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (527, 'ROK\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (528, 'Singapore\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (529, 'Turkey\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (530, 'UCT\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (531, 'Universal\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (532, 'US/Alaska\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (533, 'US/Aleutian\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (534, 'US/Arizona\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (535, 'US/Central\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (536, 'US/Eastern\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (537, 'US/East-Indiana\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (538, 'US/Hawaii\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (539, 'US/Indiana-Starke\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (540, 'US/Michigan\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (541, 'US/Mountain\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (542, 'US/Pacific\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (543, 'US/Pacific-New\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (544, 'US/Samoa\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (545, 'UTC\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (546, 'WET\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (547, 'W-SU\r', 1);
INSERT INTO `db_timezone` (`id`, `timezone`, `status`) VALUES (548, 'Zulu\r', 1);


#
# TABLE STRUCTURE FOR: db_units
#

DROP TABLE IF EXISTS `db_units`;

CREATE TABLE `db_units` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (7, 'Chai', '1 Chai', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (8, 'Bát', '1 Bát', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (9, 'Đĩa', '1 Đĩa', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (10, 'kg', '1 kg', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (11, 'Gói', '1 Gói', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (12, 'Đơn vị', '1 Đơn vị', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (13, 'Thùng', '1 Thùng', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (14, 'Hộp', '1 Hộp', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (15, 'giờ', '', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (16, 'phút', '', NULL, 1);
INSERT INTO `db_units` (`id`, `unit_name`, `description`, `company_id`, `status`) VALUES (17, 'Đôi', '', NULL, 1);


#
# TABLE STRUCTURE FOR: db_users
#

DROP TABLE IF EXISTS `db_users`;

CREATE TABLE `db_users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(1350) DEFAULT NULL,
  `password` blob DEFAULT NULL,
  `member_of` varchar(50) DEFAULT NULL,
  `firstname` varchar(1350) DEFAULT NULL,
  `lastname` varchar(1350) DEFAULT NULL,
  `mobile` varchar(405) DEFAULT NULL,
  `email` varchar(1350) DEFAULT NULL,
  `photo` blob DEFAULT NULL,
  `gender` varchar(1350) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(1620) DEFAULT NULL,
  `state` varchar(1350) DEFAULT NULL,
  `city` varchar(1620) DEFAULT NULL,
  `address` blob DEFAULT NULL,
  `postcode` varchar(270) DEFAULT NULL,
  `role_name` varchar(1350) DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `profile_picture` text DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(100) DEFAULT NULL,
  `system_name` varchar(100) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `status` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_users` (`id`, `username`, `password`, `member_of`, `firstname`, `lastname`, `mobile`, `email`, `photo`, `gender`, `dob`, `country`, `state`, `city`, `address`, `postcode`, `role_name`, `role_id`, `profile_picture`, `created_date`, `created_time`, `created_by`, `system_ip`, `system_name`, `company_id`, `status`) VALUES (1, 'root', '1fb307f34d43047ff07293adafaa05a4', '', NULL, NULL, '9845454454', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2018-11-27', '::1', NULL, NULL, 'superadmin', 1, '1');
INSERT INTO `db_users` (`id`, `username`, `password`, `member_of`, `firstname`, `lastname`, `mobile`, `email`, `photo`, `gender`, `dob`, `country`, `state`, `city`, `address`, `postcode`, `role_name`, `role_id`, `profile_picture`, `created_date`, `created_time`, `created_by`, `system_ip`, `system_name`, `company_id`, `status`) VALUES (2, 'saler', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '0911686792', 'banhang@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '', '2023-10-03', '02:51:11 pm', 'admin', '::1', 'PQDUY', NULL, '1');
INSERT INTO `db_users` (`id`, `username`, `password`, `member_of`, `firstname`, `lastname`, `mobile`, `email`, `photo`, `gender`, `dob`, `country`, `state`, `city`, `address`, `postcode`, `role_name`, `role_id`, `profile_picture`, `created_date`, `created_time`, `created_by`, `system_ip`, `system_name`, `company_id`, `status`) VALUES (3, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '0366793686', 'super@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'uploads/localhost/users/1559022862_thumb.jpg', '2023-10-03', '02:51:34 pm', 'admin', '::1', 'PQDUY', NULL, '1');


#
# TABLE STRUCTURE FOR: db_warehouse
#

DROP TABLE IF EXISTS `db_warehouse`;

CREATE TABLE `db_warehouse` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: temp_holdinvoice
#

DROP TABLE IF EXISTS `temp_holdinvoice`;

CREATE TABLE `temp_holdinvoice` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(5) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `reference_id` varchar(50) DEFAULT NULL,
  `item_id` int(5) DEFAULT NULL,
  `item_qty` int(5) DEFAULT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `tax` double(10,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `system_ip` varchar(50) DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `pos` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET foreign_key_checks = 1;
