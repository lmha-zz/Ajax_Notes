-- MySQL Script generated by MySQL Workbench
-- Tue Jul 22 10:24:04 2014
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ajax_notes_2
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ajax_notes_2` ;
CREATE SCHEMA IF NOT EXISTS `ajax_notes_2` DEFAULT CHARACTER SET utf8 ;
USE `ajax_notes_2` ;

-- -----------------------------------------------------
-- Table `ajax_notes_2`.`notes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ajax_notes_2`.`notes` ;

CREATE TABLE IF NOT EXISTS `ajax_notes_2`.`notes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `created_on` DATETIME NULL DEFAULT NULL,
  `updated_on` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 160
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
