-- Data Source
-- https://github.com/homaily/Saudi-Arabia-Regions-Cities-and-Districts







CREATE TABLE `cities_lite` (
  `city_id` int(11) unsigned NOT NULL,
  `region_id` int(11) NOT NULL,
  `name_ar` varchar(64) NOT NULL DEFAULT '',
  `name_en` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `districts_lite` (
  `district_id` varchar(12) NOT NULL,
  `city_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name_ar` varchar(64) NOT NULL DEFAULT '',
  `name_en` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
