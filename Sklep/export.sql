-- MySQL Script generated by MySQL Workbench
-- Wed Nov 16 14:10:59 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Sklep
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Sklep
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Sklep` DEFAULT CHARACTER SET utf8 ;
USE `Sklep` ;

-- -----------------------------------------------------
-- Table `Sklep`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sklep`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `isadmin` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sklep`.`Offers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sklep`.`Offers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `Users_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Users_id`),
  CONSTRAINT `fk_Offers_Users`
    FOREIGN KEY (`Users_id`)
    REFERENCES `Sklep`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sklep`.`Orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sklep`.`Orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `Users_id` INT NOT NULL,
  `Offers_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Users_id`, `Offers_id`),
  CONSTRAINT `fk_Orders_Users1`
    FOREIGN KEY (`Users_id`)
    REFERENCES `Sklep`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orders_Offers1`
    FOREIGN KEY (`Offers_id`)
    REFERENCES `Sklep`.`Offers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
