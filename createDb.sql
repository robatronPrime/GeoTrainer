CREATE DATABASE `geoTrainerDB` ;

CREATE TABLE `geoTrainerDB`.`users` (
   `id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
   `username` VARCHAR( 255 ) NOT NULL ,
   `email` VARCHAR( 60 ) NOT NULL ,
   `password` VARCHAR( 255 ) NOT NULL ,
    UNIQUE (`username`),
    UNIQUE (`email`)
) ENGINE = MYISAM ;

CREATE TABLE `geoTrainerDB`.`exercise` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `exName` VARCHAR(30) NOT NULL ,
  `exType` VARCHAR(30) NOT NULL ,
  `exVlaOne` VARCHAR(30) NOT NULL ,
  `exValTwo` VARCHAR(30) NOT NULL ,
  `exValThree` VARCHAR(30) NOT NULL ,
  `inOne` INT(6) NOT NULL ,
  `inTwo` INT(6) NOT NULL ,
  `inThree` INT(6) NOT NULL ,
  `desc` VARCHAR(120) NOT NULL
) ENGINE = MYISAM ;
