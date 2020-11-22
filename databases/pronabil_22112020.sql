-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pronabil
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pronabil
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pronabil` DEFAULT CHARACTER SET utf8 ;
USE `pronabil` ;

-- -----------------------------------------------------
-- Table `pronabil`.`vendors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pronabil`.`vendors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `rating` INT NOT NULL,
  `address` TEXT NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `deleted_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronabil`.`vendor_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pronabil`.`vendor_products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `vendor_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `type` VARCHAR(100) NOT NULL,
  `price` BIGINT(20) NOT NULL,
  `description` TEXT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `deleted_at` DATETIME NULL,
  PRIMARY KEY (`id`, `vendor_id`),
  INDEX `fk_vendor_products_vendors_idx` (`vendor_id` ASC),
  CONSTRAINT `fk_vendor_products_vendors`
    FOREIGN KEY (`vendor_id`)
    REFERENCES `pronabil`.`vendors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronabil`.`transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pronabil`.`transactions` (
  `id` INT NOT NULL,
  `vendor_id` INT NOT NULL,
  `code` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `amount` BIGINT(20) NOT NULL,
  `status` VARCHAR(100) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `created_by` VARCHAR(100) NULL,
  `updated_by` VARCHAR(100) NULL,
  PRIMARY KEY (`id`, `vendor_id`),
  UNIQUE INDEX `code_UNIQUE` (`code` ASC),
  INDEX `fk_transactions_vendors1_idx` (`vendor_id` ASC),
  CONSTRAINT `fk_transactions_vendors1`
    FOREIGN KEY (`vendor_id`)
    REFERENCES `pronabil`.`vendors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronabil`.`transactions_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pronabil`.`transactions_detail` (
  `id` INT NOT NULL,
  `transaction_id` INT NOT NULL,
  `vendor_product_id` INT NOT NULL,
  `destination` VARCHAR(100) NULL,
  `status` VARCHAR(100) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`, `transaction_id`, `vendor_product_id`),
  INDEX `fk_transactions_detail_vendor_products1_idx` (`vendor_product_id` ASC),
  INDEX `fk_transactions_detail_transactions1_idx` (`transaction_id` ASC),
  CONSTRAINT `fk_transactions_detail_vendor_products1`
    FOREIGN KEY (`vendor_product_id`)
    REFERENCES `pronabil`.`vendor_products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transactions_detail_transactions1`
    FOREIGN KEY (`transaction_id`)
    REFERENCES `pronabil`.`transactions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
