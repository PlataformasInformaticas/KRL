SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `KrLearnig` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `Persona` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(90) NOT NULL,
  `Apellido` VARCHAR(90) NOT NULL,
  `Edad` TINYINT(4) NOT NULL,
  `FechaNac` DATE NOT NULL,
  `NoDocIdent` VARCHAR(45) NULL DEFAULT NULL,
  `Telefono` VARCHAR(45) NULL DEFAULT NULL,
  `Direccion` VARCHAR(45) NULL DEFAULT NULL,
  `Pass` VARCHAR(400) NULL DEFAULT NULL,
  `Usuario` VARCHAR(45) NULL DEFAULT NULL,
  `TipoUsuario_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Persona_TipoUsuario1_idx` (`TipoUsuario_id` ASC),
  CONSTRAINT `fk_Persona_TipoUsuario1`
    FOREIGN KEY (`TipoUsuario_id`)
    REFERENCES `TipoUsuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `Grupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Horario` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(400) NULL DEFAULT NULL,
  `Anio_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Grupo_Anio1_idx` (`Anio_id` ASC),
  CONSTRAINT `fk_Grupo_Anio1`
    FOREIGN KEY (`Anio_id`)
    REFERENCES `CicloEscolar` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `CicloEscolar` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Anio` YEAR NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `TipoUsuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `Alumno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Persona_id` INT(11) NOT NULL,
  `Grupo_id` INT(11) NOT NULL,
  INDEX `fk_Alumno_Persona1_idx` (`Persona_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_Alumno_Grupo1_idx` (`Grupo_id` ASC),
  CONSTRAINT `fk_Alumno_Persona1`
    FOREIGN KEY (`Persona_id`)
    REFERENCES `Persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Alumno_Grupo1`
    FOREIGN KEY (`Grupo_id`)
    REFERENCES `Grupo` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `Asistencia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Presente` TINYINT(1) NOT NULL DEFAULT 0,
  `Alumno_id` INT(11) NOT NULL,
  `Fecha` DATE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Asistencia_Alumno1_idx` (`Alumno_id` ASC),
  CONSTRAINT `fk_Asistencia_Alumno1`
    FOREIGN KEY (`Alumno_id`)
    REFERENCES `Alumno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `Videos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `DescEsp` VARCHAR(400) NOT NULL,
  `DescIngl` VARCHAR(400) NOT NULL,
  `Titulo` VARCHAR(90) NOT NULL,
  `Categorias_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Videos_Categorias1_idx` (`Categorias_id` ASC),
  CONSTRAINT `fk_Videos_Categorias1`
    FOREIGN KEY (`Categorias_id`)
    REFERENCES `Categorias` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `Images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `TagEsp` VARCHAR(300) NOT NULL,
  `TagIngl` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `PalabraClave` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Videos_id` INT(11) NOT NULL,
  `Images_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_PalabraClave_Videos1_idx` (`Videos_id` ASC),
  INDEX `fk_PalabraClave_Images1_idx` (`Images_id` ASC),
  CONSTRAINT `fk_PalabraClave_Videos1`
    FOREIGN KEY (`Videos_id`)
    REFERENCES `Videos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_PalabraClave_Images1`
    FOREIGN KEY (`Images_id`)
    REFERENCES `Images` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `Examen` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nota` DOUBLE NOT NULL DEFAULT 0,
  `Alumno_id` INT(11) NOT NULL,
  `Fecha` DATE NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Examen_Alumno1_idx` (`Alumno_id` ASC),
  CONSTRAINT `fk_Examen_Alumno1`
    FOREIGN KEY (`Alumno_id`)
    REFERENCES `Alumno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `Categorias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO `TipoUsuario` (`id`, `Descripcion`) VALUES (1, 'Administrador');
INSERT INTO `TipoUsuario` (`id`, `Descripcion`) VALUES (2, 'Profesor');
INSERT INTO `TipoUsuario` (`id`, `Descripcion`) VALUES (3, 'Alumno');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
