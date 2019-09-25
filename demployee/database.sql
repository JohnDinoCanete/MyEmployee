create database dino;

use dino;

CREATE TABLE `tbl_employee` (
  `id` int(100) NOT NULL auto_increment,
  `eFirstName` varchar(100) NOT NULL,
  `eLastName` varchar(100) NOT NULL,
  `eGender` varchar(100) NOT NULL,
  `eDepartment` varchar(100) NOT NULL,
  `eDateEmployed` varchar(100) NOT NULL,
  `eSalary` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);