-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dbGran
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbGran
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbGran` DEFAULT CHARACTER SET utf8 ;
USE `dbGran` ;

-- -----------------------------------------------------
-- Table `dbGran`.`tbAssunto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbGran`.`tbAssunto` (
  `idAssunto` INT NOT NULL AUTO_INCREMENT,
  `assunto` VARCHAR(45) NOT NULL,
  `idAssuntoPai` INT NULL,
  PRIMARY KEY (`idAssunto`),
  UNIQUE INDEX `id_UNIQUE` (`idAssunto` ASC) VISIBLE,
  INDEX `fk_tb_assunto_tb_assunto_idx` (`idAssuntoPai` ASC) VISIBLE,
  CONSTRAINT `fk_tb_assunto_tb_assunto`
    FOREIGN KEY (`idAssuntoPai`)
    REFERENCES `dbGran`.`tbAssunto` (`idAssunto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbGran`.`tbBanca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbGran`.`tbBanca` (
  `idBanca` INT NOT NULL AUTO_INCREMENT,
  `nomeBanca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idBanca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbGran`.`tbOrgao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbGran`.`tbOrgao` (
  `idOrgao` INT NOT NULL AUTO_INCREMENT,
  `nomeOrgao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idOrgao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbGran`.`tbQuestao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbGran`.`tbQuestao` (
  `idQuestao` INT NOT NULL AUTO_INCREMENT,
  `questao` VARCHAR(255) NOT NULL,
  `tbAssuntoId` INT NOT NULL,
  `tbOrgaoId` INT NOT NULL,
  `tbBancaId` INT NOT NULL,
  PRIMARY KEY (`idQuestao`),
  INDEX `fk_tb_questao_tb_assunto1_idx` (`tbAssuntoId` ASC) VISIBLE,
  INDEX `fk_tb_questao_tb_orgao1_idx` (`tbOrgaoId` ASC) VISIBLE,
  INDEX `fk_tb_questao_tb_banca1_idx` (`tbBancaId` ASC) VISIBLE,
  CONSTRAINT `fk_tb_questao_tb_assunto1`
    FOREIGN KEY (`tbAssuntoId`)
    REFERENCES `dbGran`.`tbAssunto` (`idAssunto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_questao_tb_orgao1`
    FOREIGN KEY (`tbOrgaoId`)
    REFERENCES `dbGran`.`tbOrgao` (`idOrgao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_questao_tb_banca1`
    FOREIGN KEY (`tbBancaId`)
    REFERENCES `dbGran`.`tbBanca` (`idBanca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
