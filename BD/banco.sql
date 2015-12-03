-- MySQL Script generated by MySQL Workbench
-- 12/03/15 10:37:38
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bdwork
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bdwork
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdwork` DEFAULT CHARACTER SET utf8 ;
USE `bdwork` ;

-- -----------------------------------------------------
-- Table `bdwork`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`perfil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `perfil_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_perfil1_idx` (`perfil_id` ASC),
  CONSTRAINT `fk_usuario_perfil1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `bdwork`.`perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`continente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`continente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `continente_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pais_continente1_idx` (`continente_id` ASC),
  CONSTRAINT `fk_pais_continente1`
    FOREIGN KEY (`continente_id`)
    REFERENCES `bdwork`.`continente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`estado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `pais_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_estado_pais1_idx` (`pais_id` ASC),
  CONSTRAINT `fk_estado_pais1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `bdwork`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`cidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `estado_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidade_estado1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_cidade_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `bdwork`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`bairro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`bairro` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `cidade_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bairro_cidade1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_bairro_cidade1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `bdwork`.`cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`rua`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`rua` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `bairro_id` INT NOT NULL,
  `velocidade` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rua_bairro1_idx` (`bairro_id` ASC),
  CONSTRAINT `fk_rua_bairro1`
    FOREIGN KEY (`bairro_id`)
    REFERENCES `bdwork`.`bairro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`localizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`localizacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `latitude` VARCHAR(45) NOT NULL,
  `longitude` VARCHAR(45) NOT NULL,
  `rua_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_localizacao_rua1_idx` (`rua_id` ASC),
  CONSTRAINT `fk_localizacao_rua1`
    FOREIGN KEY (`rua_id`)
    REFERENCES `bdwork`.`rua` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`buraco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`buraco` (
  `localizacao_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `confirmado` TINYINT(1) NOT NULL,
  `foto` BLOB NULL,
  `data` DATE NOT NULL,
  `data_fechado` DATE NULL,
  PRIMARY KEY (`localizacao_id`, `usuario_id`, `data`),
  INDEX `fk_buraco_localizacao1_idx` (`localizacao_id` ASC),
  INDEX `fk_buraco_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_buraco_localizacao1`
    FOREIGN KEY (`localizacao_id`)
    REFERENCES `bdwork`.`localizacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_buraco_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `bdwork`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`tipo_de_acidente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`tipo_de_acidente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`acidente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`acidente` (
  `idacidente` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `localizacao_id` INT NOT NULL,
  `tipo_de_acidente_id` INT NOT NULL,
  PRIMARY KEY (`idacidente`),
  INDEX `fk_acidente_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_acidente_localizacao1_idx` (`localizacao_id` ASC),
  INDEX `fk_acidente_tipo_de_acidente1_idx` (`tipo_de_acidente_id` ASC),
  CONSTRAINT `fk_acidente_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `bdwork`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acidente_localizacao1`
    FOREIGN KEY (`localizacao_id`)
    REFERENCES `bdwork`.`localizacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acidente_tipo_de_acidente1`
    FOREIGN KEY (`tipo_de_acidente_id`)
    REFERENCES `bdwork`.`tipo_de_acidente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`tipo_fiscalizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`tipo_fiscalizacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `periodo_de_visualizacao` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`fiscalização`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`fiscalização` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `localizacao_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `confirmado` TINYINT(1) NOT NULL DEFAULT 0,
  `tipo_de_fiscalizacao_id` INT NOT NULL,
  `data` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fiscal_eletronica_localizacao1_idx` (`localizacao_id` ASC),
  INDEX `fk_fiscal_eletronica_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_fiscal_eletronica_tipo_de_fiscalizacao1_idx` (`tipo_de_fiscalizacao_id` ASC),
  CONSTRAINT `fk_fiscal_eletronica_localizacao1`
    FOREIGN KEY (`localizacao_id`)
    REFERENCES `bdwork`.`localizacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fiscal_eletronica_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `bdwork`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fiscal_eletronica_tipo_de_fiscalizacao1`
    FOREIGN KEY (`tipo_de_fiscalizacao_id`)
    REFERENCES `bdwork`.`tipo_fiscalizacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`tela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`tela` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwork`.`tela_has_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdwork`.`tela_has_perfil` (
  `tela_id` INT NOT NULL,
  `perfil_id` INT NOT NULL,
  PRIMARY KEY (`tela_id`, `perfil_id`),
  INDEX `fk_tela_has_perfil_perfil1_idx` (`perfil_id` ASC),
  INDEX `fk_tela_has_perfil_tela1_idx` (`tela_id` ASC),
  CONSTRAINT `fk_tela_has_perfil_tela1`
    FOREIGN KEY (`tela_id`)
    REFERENCES `bdwork`.`tela` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tela_has_perfil_perfil1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `bdwork`.`perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
