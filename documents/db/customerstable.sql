CREATE TABLE IF NOT EXISTS `customers` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
    `firstname` varchar(50) NOT NULL,
    `lastname` varchar(50) NOT NULL,
    `address` varchar(50) NOT NULL,
    `city` varchar(50) NOT NULL,
    `state` varchar(2) NOT NULL,
    `zip` varchar(50) NOT NULL,
    `phone` int(10) NOT NULL,              
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;