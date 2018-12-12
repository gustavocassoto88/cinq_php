SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `cinq_php` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci ;
USE `cinq_php` ;

-- -----------------------------------------------------
-- Table `cinq_php`.`retailers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cinq_php`.`retailers` (
  `idretailer` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(145) NULL DEFAULT NULL ,
  `image_path` VARCHAR(45) NULL DEFAULT NULL ,
  `description` TEXT NULL DEFAULT NULL ,
  `website` VARCHAR(255) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `updated_at` DATETIME NULL DEFAULT NULL ,
  `status` TINYINT(4) NULL DEFAULT '1' ,
  `slug` VARCHAR(250) NULL DEFAULT NULL ,
  PRIMARY KEY (`idretailer`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cinq_php`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cinq_php`.`products` (
  `idproduct` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(150) NULL DEFAULT NULL ,
  `price` DOUBLE NULL DEFAULT NULL ,
  `image_path` VARCHAR(45) NULL DEFAULT NULL ,
  `description` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `updated_at` DATETIME NULL DEFAULT NULL ,
  `slug` VARCHAR(250) NULL DEFAULT NULL ,
  `status` TINYINT(4) NULL DEFAULT '1' ,
  `idretailer` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`idproduct`) ,
  INDEX `idretailer_idx` (`idretailer` ASC) ,
  CONSTRAINT `idretailer`
    FOREIGN KEY (`idretailer` )
    REFERENCES `cinq_php`.`retailers` (`idretailer` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

USE `cinq_php` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
