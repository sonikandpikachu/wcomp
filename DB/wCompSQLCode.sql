SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `wComp` ;
USE `wComp` ;

-- -----------------------------------------------------
-- Table `wComp`.`wComp_CPU`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_CPU` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_CPU` (
  `id_CPU` INT NOT NULL AUTO_INCREMENT ,
  `CPU_Name` VARCHAR(45) NULL ,
  `CPU_MarkName` VARCHAR(45) NULL ,
  `CPU_Clock rate` FLOAT NULL ,
  `CPU_KernelCount` INT NULL ,
  `CPU_Info` TEXT NULL ,
  `CPU_DSSValue` FLOAT NULL ,
  `CPU_DSSCount` INT NULL ,
  PRIMARY KEY (`id_CPU`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Type` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Type` (
  `id_Type` INT NOT NULL AUTO_INCREMENT ,
  `Type_Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_Type`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Memory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Memory` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Memory` (
  `id_Memory` INT NOT NULL AUTO_INCREMENT ,
  `Memory_Name` VARCHAR(45) NULL ,
  `Memory_MarkName` VARCHAR(45) NULL ,
  `Memory_Count` INT NULL ,
  `Memory_SlCount` INT NULL ,
  `Memory_Info` TEXT NULL ,
  `Memory_DSSValue` FLOAT NULL ,
  `Memory_DSSCount` INT NULL ,
  PRIMARY KEY (`id_Memory`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_VGA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_VGA` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_VGA` (
  `id_VGA` INT NOT NULL AUTO_INCREMENT ,
  `VGA_Name` VARCHAR(45) NULL ,
  `VGA_MarkName` VARCHAR(45) NULL ,
  `VGA_Memory` INT NULL ,
  `VGA_Info` TEXT NULL ,
  `VGA_DSSValue` FLOAT NULL ,
  `VGA_DSSCount` INT NULL ,
  PRIMARY KEY (`id_VGA`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_HDD`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_HDD` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_HDD` (
  `id_HDD` INT NOT NULL AUTO_INCREMENT ,
  `HDD_Name` VARCHAR(45) NULL ,
  `HDD_MarkName` VARCHAR(45) NULL ,
  `HDD_Memory` INT NULL ,
  `HDD_Info` TEXT NULL ,
  `HDD_DSSValue` FLOAT NULL ,
  `HDD_DSSCount` INT NULL ,
  PRIMARY KEY (`id_HDD`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Audio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Audio` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Audio` (
  `id_Audio` INT NOT NULL AUTO_INCREMENT ,
  `Audio_Name` VARCHAR(45) NULL ,
  `Audio_MarkName` VARCHAR(45) NULL ,
  `Audio_CanalCount` INT NULL ,
  `Audio_Info` TEXT NULL ,
  `Audio_DSSValue` FLOAT NULL ,
  `Audio_DSSCount` INT NULL ,
  PRIMARY KEY (`id_Audio`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_ODD`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_ODD` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_ODD` (
  `id_ODD` INT NOT NULL AUTO_INCREMENT ,
  `ODD_Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_ODD`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_OS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_OS` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_OS` (
  `id_OS` INT NOT NULL AUTO_INCREMENT ,
  `OS_Name` VARCHAR(45) NULL ,
  `OS_DSSValue` FLOAT NULL ,
  PRIMARY KEY (`id_OS`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_WiFi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_WiFi` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_WiFi` (
  `id_WiFi` INT NOT NULL AUTO_INCREMENT ,
  `WiFi_Name` VARCHAR(45) NULL ,
  `WiFi_DSSValue` FLOAT NULL ,
  `WiFi_DSSCount` INT NULL ,
  PRIMARY KEY (`id_WiFi`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Device`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Device` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Device` (
  `id_Device` INT NOT NULL AUTO_INCREMENT ,
  `Device_Name` VARCHAR(45) NULL ,
  `Device_MarkName` VARCHAR(45) NULL ,
  `wComp_Type_id_Type` INT NOT NULL ,
  `Device_Color` VARCHAR(45) NULL ,
  `Device_H` FLOAT NULL ,
  `Device_W` FLOAT NULL ,
  `Device_L` FLOAT NULL ,
  `Device_Weight` FLOAT NULL ,
  `Device_Surface` INT NULL ,
  `wComp_CPU_id_CPU` INT NOT NULL ,
  `wComp_Memory_id_Memory` INT NOT NULL ,
  `wComp_VGA_id_VGA` INT NOT NULL ,
  `wComp_HDD_id_HDD` INT NOT NULL ,
  `wComp_Audio_id_Audio` INT NOT NULL ,
  `wComp_ODD_id_ODD` INT NOT NULL ,
  `wComp_OS_id_OS` INT NOT NULL ,
  `wComp_WiFi_id_WiFi` INT NOT NULL ,
  `Device_WorkTime` FLOAT NULL ,
  `Device_USBCount` INT NULL ,
  `Device_CartReader` INT NULL ,
  `Device_BlueTooth` INT NULL ,
  `Device_Camera` FLOAT NULL ,
  `Device_ComputerCase` VARCHAR(45) NULL ,
  `Device_Info` TEXT NULL ,
  `Device_SmallImage` VARCHAR(90) NULL ,
  `Device_BigImage` VARCHAR(90) NULL ,
  `Device_DesignDSSValue` FLOAT NULL ,
  `Device_DesignDSSCount` INT NULL ,
  `Device_Diagonal` FLOAT NULL ,
  PRIMARY KEY (`id_Device`) ,
  INDEX `fk_wComp_Device_wComp_Type` (`wComp_Type_id_Type` ASC) ,
  INDEX `fk_wComp_Device_wComp_CPU1` (`wComp_CPU_id_CPU` ASC) ,
  INDEX `fk_wComp_Device_wComp_Memory1` (`wComp_Memory_id_Memory` ASC) ,
  INDEX `fk_wComp_Device_wComp_VGA1` (`wComp_VGA_id_VGA` ASC) ,
  INDEX `fk_wComp_Device_wComp_HDD1` (`wComp_HDD_id_HDD` ASC) ,
  INDEX `fk_wComp_Device_wComp_Audio1` (`wComp_Audio_id_Audio` ASC) ,
  INDEX `fk_wComp_Device_wComp_ODD1` (`wComp_ODD_id_ODD` ASC) ,
  INDEX `fk_wComp_Device_wComp_OS1` (`wComp_OS_id_OS` ASC) ,
  INDEX `fk_wComp_Device_wComp_WiFi1` (`wComp_WiFi_id_WiFi` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Store`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Store` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Store` (
  `id_Store` INT NOT NULL AUTO_INCREMENT ,
  `Store_Name` VARCHAR(45) NULL ,
  `Store_Href` VARCHAR(150) NULL ,
  PRIMARY KEY (`id_Store`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_CDevice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_CDevice` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_CDevice` (
  `id_CDevice` INT NOT NULL AUTO_INCREMENT ,
  `CDevice_Name` VARCHAR(45) NULL ,
  `CDevice_Price` FLOAT NULL ,
  `wComp_Device_id_Device` INT NOT NULL ,
  `wComp_Store_id_Store` INT NOT NULL ,
  `CDevice_Sale` INT NULL ,
  PRIMARY KEY (`id_CDevice`) ,
  INDEX `fk_wComp_CDevice_wComp_Device1` (`wComp_Device_id_Device` ASC) ,
  INDEX `fk_wComp_CDevice_wComp_Store1` (`wComp_Store_id_Store` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Garbage`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Garbage` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Garbage` (
  `id_Device` INT NOT NULL AUTO_INCREMENT ,
  `Device_Name` VARCHAR(45) NULL ,
  `Device_MarkName` VARCHAR(45) NULL ,
  `Device_Color` VARCHAR(45) NULL ,
  `Device_H` FLOAT NULL ,
  `Device_W` FLOAT NULL ,
  `Device_L` FLOAT NULL ,
  `Device_Weight` FLOAT NULL ,
  `Device_Surface` INT NULL ,
  `Device_WorkTime` FLOAT NULL ,
  `Device_USBCount` INT NULL ,
  `Device_CartReader` INT NULL ,
  `Device_BlueTooth` INT NULL ,
  `Device_Camera` FLOAT NULL ,
  `Device_ComputerCase` VARCHAR(45) NULL ,
  `Device_Price` FLOAT NULL ,
  `Device_StoreName` VARCHAR(45) NULL ,
  `Device_StoreHref` VARCHAR(45) NULL ,
  `Device_CPUName` VARCHAR(45) NULL ,
  `Device_CPUInfo` VARCHAR(45) NULL ,
  `Device_CPUClockRate` INT NULL ,
  `Device_CPUKernelCount` INT NULL ,
  `Device_MemoryName` VARCHAR(45) NULL ,
  `Device_MemoryInfo` VARCHAR(45) NULL ,
  `Device_MemoryCount` INT NULL ,
  `Device_MemorySlCount` INT NULL ,
  `Device_VGAName` VARCHAR(45) NULL ,
  `Device_VGAInfo` VARCHAR(45) NULL ,
  `Device_VGAMemory` INT NULL ,
  `Device_HDDName` VARCHAR(45) NULL ,
  `Device_HDDInfo` VARCHAR(45) NULL ,
  `Device_HDDMemory` INT NULL ,
  `Device_AudioName` VARCHAR(45) NULL ,
  `Device_AudioInfo` VARCHAR(45) NULL ,
  `Device_AudioCanalCount` INT NULL ,
  `Device_WIFIName` VARCHAR(45) NULL ,
  `Device_OSName` VARCHAR(45) NULL ,
  `Device_ODDName` VARCHAR(45) NULL ,
  `Device_Info` TEXT NULL ,
  `Device_BigImage` VARCHAR(80) NULL ,
  `Device_SmallImage` VARCHAR(80) NULL ,
  `Device_Action` INT NULL ,
  PRIMARY KEY (`id_Device`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Question`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Question` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Question` (
  `id_Question` INT NOT NULL AUTO_INCREMENT ,
  `Question_Text` VARCHAR(250) NULL ,
  PRIMARY KEY (`id_Question`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Answer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Answer` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Answer` (
  `id_Answer` INT NOT NULL AUTO_INCREMENT ,
  `Answer_Type` VARCHAR(45) NULL ,
  `Answer_Text` VARCHAR(250) NULL ,
  `wComp_id_ThisQuestion` INT NOT NULL ,
  `wComp_id_NextQuestion` INT NULL ,
  PRIMARY KEY (`id_Answer`) ,
  INDEX `fk_wComp_Answer_wComp_Question1` (`wComp_id_ThisQuestion` ASC) ,
  INDEX `fk_wComp_Answer_wComp_Question2` (`wComp_id_NextQuestion` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Parametr`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Parametr` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Parametr` (
  `id_Parametr` INT NOT NULL AUTO_INCREMENT ,
  `Parametr_Href` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_Parametr`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Condition`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Condition` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Condition` (
  `id_Condition` INT NOT NULL AUTO_INCREMENT ,
  `wComp_AnswerChange_idSomeChange` INT NOT NULL ,
  `Parametr_Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_Condition`, `wComp_AnswerChange_idSomeChange`) ,
  INDEX `fk_wComp_Parameter_wComp_AnswerChange1` (`wComp_AnswerChange_idSomeChange` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_Criteria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_Criteria` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_Criteria` (
  `id_Criteria` INT NOT NULL AUTO_INCREMENT ,
  `Criteria_DefaultValue` FLOAT NULL ,
  `wComp_Parametr_id_Parametr` INT NOT NULL ,
  `Parametr_Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_Criteria`, `wComp_Parametr_id_Parametr`) ,
  INDEX `fk_wComp_Criteria_wComp_Parametr1` (`wComp_Parametr_id_Parametr` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;


-- -----------------------------------------------------
-- Table `wComp`.`wComp_AnswerChange`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `wComp`.`wComp_AnswerChange` ;

CREATE  TABLE IF NOT EXISTS `wComp`.`wComp_AnswerChange` (
  `id_AnswerChange` INT NOT NULL AUTO_INCREMENT ,
  `wComp_Parametr_id_Parametr` INT NOT NULL ,
  `AnswerChange_TextChange` VARCHAR(45) NULL ,
  `wComp_Answer_id_Answer` INT NOT NULL ,
  PRIMARY KEY (`id_AnswerChange`) ,
  INDEX `fk_wComp_AnswerChange_wComp_Parametr1` (`wComp_Parametr_id_Parametr` ASC) ,
  INDEX `fk_wComp_AnswerChange_wComp_Answer1` (`wComp_Answer_id_Answer` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = cp1251
COLLATE = cp1251_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
