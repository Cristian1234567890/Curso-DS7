
--
-- Tablas
--

CREATE TABLE `labsdb`.`parcial2` (`ID` INT NOT NULL AUTO_INCREMENT , `N` INT NOT NULL , `Factorial` INT NOT NULL , `Sumatoria` float NOT NULL , PRIMARY KEY (`ID`)) 


--
-- Procedimientos
--


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_entrada_sumatoria` (IN `N` INT, IN `Factorial` INT, IN `Sumatoria` float)   BEGIN
	SET @s= CONCAT("INSERT INTO parcial2(N,Factorial,Sumatoria) VALUES ('",N,"','",Factorial,"','",Sumatoria,"')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_sumatoria` ()   BEGIN
	SELECT * FROM parcial2;
END$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_sumatoria` (IN `ID` INT, IN `N` INT, IN `Factorial` INT, IN `Sumatoria` float) BEGIN SET @s= CONCAT("UPDATE parcial2 SET N='",N,"', Factorial='",Factorial,"', Sumatoria='",Sumatoria,"' WHERE ID=",ID); PREPARE stmt FROM @s; EXECUTE stmt; DEALLOCATE PREPARE stmt; END$$