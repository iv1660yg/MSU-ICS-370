CREATE TABLE IF NOT EXISTS `customers` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
    `fullName` varchar(100) NOT NULL,
    `address` varchar(200) NOT NULL,
    `phone` int(10) NOT NULL,              
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS `cars` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`priceperday` varchar(50) NOT NULL,
    `make` varchar(100) NOT NULL,
    `model` varchar(100) NOT NULL,
    `year` int(11) NOT NULL, 
    `color` varchar(50) NOT NULL,              
  	`miles` int(12) NOT NULL,
    `statusID` varchar(50) NOT NULL,
    `createDate` Date() NOT NULL,
    `endDate` Date() NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;