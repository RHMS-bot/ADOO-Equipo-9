
drop database Itzamara;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


CREATE DATABASE IF NOT EXISTS Itzamara default character set = utf8mb4;
USE `Itzamara` ;


-- -----------------------------------------------------
-- Table `Itzamara`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Itzamara`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `contrasenia` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Itzamara`.`Cuquita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Itzamara`.`Cuquita` (
  `idCuquita` VARCHAR(45) NOT NULL,
  `nombre` INT NOT NULL,
  `contrasenia` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCuquita`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Itzamara`.`Proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Itzamara`.`Proveedor` (
  `idProveedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `contacto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Itzamara`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Itzamara`.`Producto` (
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `precio` FLOAT NOT NULL,
  `cantidad` INT NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `imagen` VARCHAR(100),
  `Proveedor_idProveedor` INT NOT NULL,
  PRIMARY KEY (`codigo`, `Proveedor_idProveedor`),
  INDEX `fk_Producto_Proveedor1_idx` (`Proveedor_idProveedor` ASC),
  CONSTRAINT `fk_Producto_Proveedor1`
    FOREIGN KEY (`Proveedor_idProveedor`)
    REFERENCES `Itzamara`.`Proveedor` (`idProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into producto values(1000,'Suero Corrector',511,1,'Cuidado de la piel','SueroCorrector.png',1);
insert into producto values(2000,'Gel Facial',386,5,'Cuidado de la piel','GelFacial.png',1);
insert into producto values(3000,'Lapiz Delineador',400,3,'Maquillaje','LapizDelineador.jpg',1);
insert into producto values(4000,'Labial',325,7,'Maquillaje','Labial.jpg',1);
insert into producto values(5000,'Domain Eau Cologne',600,2,'Fragancias','DomainEauCologne.png',1);
insert into producto values(6000,'Illuminea Extrait',800,3,'Fragancias','IllumineaExtrait.png',1);
insert into producto values(7000,'Protector Solar',399,8,'Cuerpo y Sol','ProtectorSolar.png',1);
select * from Producto;
-- -----------------------------------------------------
-- Table `Itzamara`.`Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Itzamara`.`Venta` (
  `idVenta` INT NOT NULL AUTO_INCREMENT,
  `tipopago` VARCHAR(45) NOT NULL,
  `total` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `restante` FLOAT NOT NULL,
  `Producto_codigo` INT NOT NULL,
  `Cliente_idCliente` INT NOT NULL,
  PRIMARY KEY (`idVenta`, `Producto_codigo`, `Cliente_idCliente`),
  INDEX `fk_Venta_Producto_idx` (`Producto_codigo` ASC),
  INDEX `fk_Venta_Cliente1_idx` (`Cliente_idCliente` ASC),
  CONSTRAINT `fk_Venta_Producto`
    FOREIGN KEY (`Producto_codigo`)
    REFERENCES `Itzamara`.`Producto` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Cliente1`
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `Itzamara`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Itzamara`.`Pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Itzamara`.`Pago` (
  `idPago` INT NOT NULL AUTO_INCREMENT,
  `monto` FLOAT NOT NULL,
  `Venta_idVenta` INT NOT NULL,
  `Venta_Producto_codigo` INT NOT NULL,
  `Venta_Cliente_idCliente` INT NOT NULL,
  PRIMARY KEY (`idPago`, `Venta_idVenta`, `Venta_Producto_codigo`, `Venta_Cliente_idCliente`),
  INDEX `fk_Pago_Venta1_idx` (`Venta_idVenta` ASC, `Venta_Producto_codigo` ASC, `Venta_Cliente_idCliente` ASC),
  CONSTRAINT `fk_Pago_Venta1`
    FOREIGN KEY (`Venta_idVenta` , `Venta_Producto_codigo` , `Venta_Cliente_idCliente`)
    REFERENCES `Itzamara`.`Venta` (`idVenta` , `Producto_codigo` , `Cliente_idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Itzamara`.`Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Itzamara`.`Compra` (
  `idCompra` INT NOT NULL AUTO_INCREMENT,
  `total` FLOAT NOT NULL,
  `fecha` DATE NOT NULL,
  `cantidad` INT NOT NULL,
  `Producto_codigo` INT NOT NULL,
  `Producto_Proveedor_idProveedor` INT NOT NULL,
  `Cuquita_idCuquita` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCompra`, `Producto_codigo`, `Producto_Proveedor_idProveedor`, `Cuquita_idCuquita`),
  INDEX `fk_Compra_Producto1_idx` (`Producto_codigo` ASC, `Producto_Proveedor_idProveedor` ASC),
  INDEX `fk_Compra_Cuquita1_idx` (`Cuquita_idCuquita` ASC),
  CONSTRAINT `fk_Compra_Producto1`
    FOREIGN KEY (`Producto_codigo` , `Producto_Proveedor_idProveedor`)
    REFERENCES `Itzamara`.`Producto` (`codigo` , `Proveedor_idProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_Cuquita1`
    FOREIGN KEY (`Cuquita_idCuquita`)
    REFERENCES `Itzamara`.`Cuquita` (`idCuquita`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
